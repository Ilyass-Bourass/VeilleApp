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

}