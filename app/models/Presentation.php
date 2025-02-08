<?php 
require_once(__DIR__.'/../config/db.php');
class Presentation extends Db {

public function __construct()
{
    parent::__construct();
}

public function ajouterPresentation($id_sujet,$users_id,$date_presentation){
    $result = $this->conn->prepare("INSERT INTO presentations (id_sujet,date_presentation) VALUES (:id_sujet,:date_presentation)");
        $result->execute([
            ":id_sujet"=>$id_sujet,
            ":date_presentation"=>$date_presentation
        ]);
        $id_presentation=$this->conn->lastInsertId();
    
    $result = $this->conn->prepare("INSERT INTO presentation_participants (id_presentation,user_id) VALUES (:id_presentation,:user_id)");
    foreach($users_id as $user_id){
        $result->execute([
            ":id_presentation"=>$id_presentation,
            ":user_id"=>$user_id
        ]);
    }
}

public function getAllPresentations() {
   
    
    $result = $this->conn->prepare("SELECT 
                        p.id_presentation,
                        p.date_presentation,
                        p.statut as presentation_statut,
                        s.titre as sujet_titre,
                        GROUP_CONCAT(u.name) as participants
                    FROM 
                        presentations p
                        INNER JOIN sujet s ON p.id_sujet = s.id_sujet
                        INNER JOIN presentation_participants pp ON p.id_presentation = pp.id_presentation
                        INNER JOIN users u ON pp.user_id = u.id
                    GROUP BY 
                        p.id_presentation, p.date_presentation, s.titre, p.statut
                    ORDER BY 
                        p.date_presentation DESC;");
        $result->execute();
        $presntatios = $result->fetchALL(PDO::FETCH_ASSOC);
        return $presntatios;
}

}



