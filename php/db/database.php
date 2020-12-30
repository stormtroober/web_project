<?php

class DatabaseHelper{
    
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if($this->db->connect_error){
            die("Connesione fallita al db");
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
        $query = "SELECT ID, Nome, Marca, Foto, Prezzo, Quantità FROM PRODOTTI WHERE Tipo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($username, $password){
        $stmt = $this->db->prepare("SELECT ID FROM utenti WHERE Email = ? AND Password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserID($email) {
        $stmt = $this->db->prepare("SELECT ID FROM utenti WHERE Email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserType($id){
        $stmt = $this->db->prepare("SELECT Tipo FROM utenti WHERE ID = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUser($id) {
        $stmt = $this->db->prepare("SELECT * FROM utenti WHERE ID = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getQuantity($id) {
        $stmt = $this->db->prepare("SELECT quantità FROM PRODOTTI WHERE ID = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>
