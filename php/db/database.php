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
        $stmt = $this->db->prepare("SELECT Nome, Tipo, Marca, Foto, Descrizione, Prezzo, Quantità FROM PRODOTTI WHERE id = ?");
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

    public function addToCart($userEmail, $articleId, $Quantità){
        $stmtInsert = $this->db->prepare("INSERT INTO CARRELLO (Utente, Prodotto, Quantità) VALUES (?,?,?)");
        $stmtInsert->bind_param('iii', $userId, $productId, $Quantità);
        $stmtInsert->execute();
        $stmtUpdate = $this->db->prepare("UPDATE PRODOTTI SET Quantità=Quantità-? WHERE id=?");
        $stmtUpdate->bind_param('ii', $Quantità, $productId);
        $stmtUpdate->execute();

    }

    public function getArticlesFromCart($userId){
        $stmt = $this->db->prepare("SELECT * FROM CARRELLO WHERE Utente = ?");
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>
