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
        $stmt = $this->db->prepare("SELECT nome, tipo, marca, foto, descrizione, prezzo, quantità FROM prodotti WHERE id = ?");
        $stmt->bind_param("id", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getPostByCategory($idcategory){
        /*$query = "SELECT idarticolo, titoloarticolo, imgarticolo, anteprimaarticolo, dataarticolo, nome FROM articolo, autore, articolo_ha_categoria WHERE categoria=? AND autore=idautore AND idarticolo=articolo";*/
        $query = "SELECT ID, Nome, Marca, Foto, Prezzo, Quantità FROM prodotti WHERE Tipo = ?";
        $stmt = $this->db->prepare($query);
        print_r($this->db->error_list);
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>
