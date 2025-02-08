<?php 
require_once(__DIR__.'/User.php');
class Enseignant extends USER {

public function __construct()
{
    parent::__construct();
}

public function activerUser($id_user){
    $result = $this->conn->prepare("UPDATE users set etat='activer' where id=:id");
        $result->execute([
            ":id"=>$id_user,
        ]);
        return $this->conn->lastInsertId();
}

public function supprimerUser($id_user){
    $result = $this->conn->prepare("DELETE from users  where id=:id");
    $result->execute([
        ":id"=>$id_user,
    ]);
return $this->conn->lastInsertId();
}

public function countAllUsers() {
    try {
        $result = $this->conn->prepare("SELECT COUNT(*) as total FROM users WHERE role = 'etudiant' AND etat = 'activer'");
        $result->execute();
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
        
        
    } catch(PDOException $e) {
        return 0;
    }
}

public function countAllPresentations() {
    try {
        $result = $this->conn->prepare("SELECT COUNT(*) as total FROM presentations");
        $result->execute();
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch(PDOException $e) {
        return 0;
    }                           
}

public function countAllSuggestions() {
    try {
        $result = $this->conn->prepare("SELECT COUNT(*) as total FROM sujet WHERE statut='en_attente'");
        $result->execute();
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch(PDOException $e) {
        return 0;
    }
}

public function countAllSujetsApprouves() {
    try {
        $result = $this->conn->prepare("SELECT COUNT(*) as total FROM sujet WHERE statut='approuve'");
        $result->execute();
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch(PDOException $e) {  
        return 0;
    }
}






}