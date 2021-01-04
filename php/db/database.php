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
        $stmt->bind_param('s',$idcategory);
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

        return $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function addToCart($userEmail, $articleId, $Quantità){
        $cartId = $this->getCartFromUser($userEmail);
        $stmtInsert = $this->db->prepare("INSERT INTO PRODOTTI_CARRELLO (IdCarrello, Prodotto, Quantità) VALUES (?,?,?)");
        $stmtInsert->bind_param('iii', $cartId[0]["IdCarrello"], $articleId, $Quantità);
        $stmtInsert->execute();
        $stmtUpdate = $this->db->prepare("UPDATE PRODOTTI SET Quantità=Quantità-? WHERE id=?");
        $stmtUpdate->bind_param('ii', $Quantità, $articleId);
        $stmtUpdate->execute();
    }

    public function addToWishList($userEmail, $articleId){
        $stmtInsert = $this->db->prepare("INSERT INTO PRODOTTI_LISTA_DESIDERI (Prodotto, Utente) VALUES (?,?)");
        $stmtInsert->bind_param('si', $userEmail, $articleId);
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
}

?>
