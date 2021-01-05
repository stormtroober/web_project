<?php

class DatabaseHelper{
    
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if($this->db->connect_error){
            die("Connesione fallita al db");
        }
    }

    public function getDb() {
        if ($this->db instanceof mysqli) {
             return $this->db;
        }
    }

    public function getArticleById($id){
        $stmt = $this->db->prepare("SELECT * FROM PRODOTTI WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getPostByCategory($idcategory){
        $query = "SELECT ID, Nome, Marca, Foto, Caratteristiche, Prezzo, Quantità FROM PRODOTTI WHERE Tipo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idcategory);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByCategoryASC($idcategory){
        $query = "SELECT ID, Nome, Marca, Foto, Caratteristiche, Prezzo, Quantità FROM PRODOTTI WHERE Tipo = ? ORDER BY Nome ASC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idcategory);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByCategoryDESC($idcategory){
        $query = "SELECT ID, Nome, Marca, Foto, Caratteristiche, Prezzo, Quantità FROM PRODOTTI WHERE Tipo = ? ORDER BY Nome DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idcategory);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByCategorySearch($idcategory, $user_search) {
        $query = "SELECT ID, Nome, Marca, Foto, Caratteristiche, Prezzo, Quantità FROM PRODOTTI WHERE Tipo = ? AND Nome LIKE ?";
        $stmt = $this->db->prepare($query);
        $user_search = '%'.$user_search.'%';
        $stmt->bind_param('ss', $idcategory, $user_search);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($username, $password){
        $stmt = $this->db->prepare("SELECT ID FROM UTENTI WHERE Email = ? AND Password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM UTENTI WHERE Email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addCartToUser($userEmail){
        $stmt = $this->db->prepare("INSERT INTO CARRELLO (Utente) VALUE (?)");
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
    }

    private function getCartFromUser($userEmail){
        $stmt = $this->db->prepare("SELECT IdCarrello FROM CARRELLO WHERE Utente = ?");
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    private function itemInCartExist($articleId, $cartId){
        $stmt = $this->db->prepare("SELECT * FROM PRODOTTI_CARRELLO WHERE (Prodotto = ? && IdCarrello = ?)");
        $stmt->bind_param('ii', $articleId, $cartId[0]["IdCarrello"]);
        $stmt->execute();
        $result = $stmt->get_result();
        return !(empty($result->fetch_all(MYSQLI_ASSOC)));
    }

    private function getAmountFromProduct($articleId){
        $stmt = $this->db->prepare("SELECT Quantità FROM PRODOTTI WHERE ID = ?");
        $stmt->bind_param('i', $articleId);
        $stmt->execute();
        $result = $stmt->get_result();
        $amount = $result->fetch_all(MYSQLI_ASSOC)[0]["Quantità"];
        return $amount;
    }

    public function addToCart($userEmail, $articleId, $Quantità){
        if($this->getAmountFromProduct($articleId) - $Quantità >= 0){

            $cartId = $this->getCartFromUser($userEmail);
            if(!$this->itemInCartExist($articleId, $cartId)){

                $stmtInsert = $this->db->prepare("INSERT INTO PRODOTTI_CARRELLO (IdCarrello, Prodotto, Quantità) VALUES (?,?,?)");
                var_dump($cartId[0]["IdCarrello"], $articleId, $Quantità);
                $stmtInsert->bind_param('iii', $cartId[0]["IdCarrello"], $articleId, $Quantità);
                $stmtInsert->execute();
                /* Da spostare nell'ordine */
                $stmtUpdate = $this->db->prepare("UPDATE PRODOTTI SET Quantità=Quantità-? WHERE id=?");
                $stmtUpdate->bind_param('ii', $Quantità, $articleId);
                $stmtUpdate->execute();
            }
            else{

                $stmtUpdate = $this->db->prepare("UPDATE PRODOTTI_CARRELLO SET Quantità=Quantità+1 WHERE (IdCarrello = ? && Prodotto = ?)");
                $stmtUpdate->bind_param('ii', $cartId[0]["IdCarrello"], $articleId);
                $stmtUpdate->execute();
                /* Da spostare nell'ordine */
                $stmtUpdate = $this->db->prepare("UPDATE PRODOTTI SET Quantità=Quantità-? WHERE id=?");
                $stmtUpdate->bind_param('ii', $Quantità, $articleId);
                $stmtUpdate->execute();
            }
        }
    }

    public function addToWishList($userEmail, $articleId){
        $stmtInsert = $this->db->prepare("INSERT INTO PRODOTTI_LISTA_DESIDERI (Prodotto, Utente) VALUES (?,?)");
        $stmtInsert->bind_param('is', $articleId, $userEmail);
        $stmtInsert->execute();
    }

    public function getArticlesFromCart($userEmail){
        $cartId = $this->getCartFromUser($userEmail);
        $stmt = $this->db->prepare("SELECT Prodotto,Quantità FROM PRODOTTI_CARRELLO WHERE IdCarrello = ?");
        $stmt->bind_param('i', $cartId[0]["IdCarrello"]);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getItemsFromWish($userEmail){
        $stmt = $this->db->prepare("SELECT Prodotto FROM PRODOTTI_LISTA_DESIDERI WHERE Utente = ?");
        $stmt->bind_param('i', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
        
    public function removeItemFromCart($userEmail, $articleId){
        $cartId = $this->getCartFromUser($userEmail);
        $stmt = $this->db->prepare("DELETE FROM PRODOTTI_CARRELLO WHERE IdCarrello = ? AND Prodotto = ?");
        $stmt->bind_param('ii', $cartId[0]["IdCarrello"], $articleId);
        $stmt->execute();
    }

    public function removeItemFromWish($userEmail, $articleId){
        $stmt = $this->db->prepare("DELETE FROM PRODOTTI_LISTA_DESIDERI WHERE Utente = ? AND Prodotto = ?");
        $stmt->bind_param('si', $userEmail, $articleId);
        $stmt->execute();
    }
}

?>
