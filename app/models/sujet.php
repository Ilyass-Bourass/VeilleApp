<?php 
require_once(__DIR__.'/../config/db.php');
class Sujet extends Db {

public function __construct()
{
    parent::__construct();
}

public function sugererSujet($titre,$id_etudiant) {
   
    try {
        
        $result = $this->conn->prepare("INSERT INTO sujet (titre, id_etudiant) VALUES (:titre,:id_etudiant)");
        $result->execute([
            ":titre"=>$titre,
            ":id_etudiant"=>$id_etudiant
        ]);
        return $this->conn->lastInsertId();
        
       
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

public function ajouterSujet($titre,$id_etudiant) {
   
    try {
        
        $result = $this->conn->prepare("INSERT INTO sujet (titre, id_etudiant,statut) VALUES (:titre,:id_etudiant,'approuvé')");
        $result->execute([
            ":titre"=>$titre,
            ":id_etudiant"=>$id_etudiant
        ]);
        $id_sujet=$this->conn->lastInsertId();
        $result = $this->conn->prepare("INSERT INTO presentations (id_sujet) VALUES (:id_sujet)");
        $result->execute([
            ":id_sujet"=>$id_sujet  
        ]);
        return $this->conn->lastInsertId();
        
       
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


public function getALLSuggestion(){
    $result = $this->conn->prepare("SELECT u.name,s.* FROM  sujet s
                                    join users u on  s.id_etudiant=u.id");
        $result->execute();
        $suggetions = $result->fetchALL(PDO::FETCH_ASSOC);
        return $suggetions;
}

public function approuverSujet($id_sujet){
    $result = $this->conn->prepare("UPDATE sujet set statut='approuvé' where id_sujet=:id_sujet");
        $result->execute([
            ":id_sujet"=>$id_sujet,
        ]);
        $result = $this->conn->prepare("INSERT INTO presentations (id_sujet) VALUES (:id_sujet)");
        $result->execute([
            ":id_sujet"=>$id_sujet  
        ]);
        return $this->conn->lastInsertId();
}

public function rejeterSujet($id_sujet){
    $result = $this->conn->prepare("DELETE from sujet  where id_sujet=:id_sujet");
        $result->execute([
            ":id_sujet"=>$id_sujet,
        ]);
    return $this->conn->lastInsertId();
}

public function assignerSujet(){

}

}