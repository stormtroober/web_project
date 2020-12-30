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
        $stmt = $this->db->prepare("SELECT idautore, username, nome FROM autore WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>
