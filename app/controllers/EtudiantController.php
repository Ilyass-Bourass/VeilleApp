<?php 
require_once (__DIR__.'/../models/User.php');
require_once (__DIR__.'/../models/sujet.php');


class EtudiantController extends BaseController {
 
    private $UserModel ;
    private $SujetModel;
   public function __construct(){

      $this->UserModel = new User();
      $this->SujetModel = new Sujet();

      
   }

   public function index(){
    if (!isset($_SESSION['user_loged_in_id']) || $_SESSION['user_loged_in_role'] !== 'etudiant') {
        header("Location: /login");
        exit;
    }
    $this->render('dashboardEtudiant/pageEtudiant');
   }

   public function handelSuggereSujet(){
      if($_SERVER['REQUEST_METHOD']=="POST"){

         if(isset($_POST['suggestionSujet'])){
            $titre=$_POST['titre'];
            $id_etudiant=$_SESSION['user_loged_in_id'];
            //var_dump($titre,$id_etudiant);

            $id_sujet=$this->SujetModel->sugererSujet($titre,$id_etudiant);
            if($id_sujet){
               //echo "l ajout a été fait avec succés";
               $this->render('dashboardEtudiant/pageEtudiant');
            }
            
         }
      }
   }

}