<?php 
require_once (__DIR__.'/../models/User.php');
require_once (__DIR__.'/../models/sujet.php');
require_once (__DIR__.'/../models/Enseignant.php');

class EnseignantController extends BaseController {
    private $UserModel ;
    private $SujetModel;
    private $EnseignantModel;
    public function __construct(){
        
        $this->UserModel = new User();
        $this->SujetModel = new Sujet();
        $this->EnseignantModel=new Enseignant();
        
     }

   public function index() {
    
    // var_dump($_SESSION);
    // die();
    if (!isset($_SESSION['user_loged_in_id']) || $_SESSION['user_loged_in_role'] !== 'enseignant') {
        header("Location: /login");
        exit;
    }
    $users=$this->UserModel->getAllEtudiant();
    $suggestions=$this->SujetModel->getALLSuggestion();
    $data=['users'=>$users,'suggestions'=>$suggestions];

    // var_dump($data);
    // die();
      
      $this->render('dashbordEnseignant/pageEnseignant',$data);
      
   }

   public function handelapprouverSujet($id_sujet){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $id_sujetHandle=$this->SujetModel->approuverSujet($id_sujet);
            header("Location: /enseignant");
            exit;
        }
   }

   public function handelrejeterSujet($id_sujet){
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $id_sujetHandle=$this->SujetModel->rejeterSujet($id_sujet);
        header("Location: /enseignant");
        exit;
    }
   }

   public function handelactiverUser($id_user){
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $id_userActiver=$this->EnseignantModel->activerUser($id_user);
        header("Location: /enseignant");
        exit;
    }
   }

   public function handelsupprimerUser($id_user){
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $id_userActiver=$this->EnseignantModel->supprimerUser($id_user);
        header("Location: /enseignant");
        exit;
    }
   }
   
   // public function categories() {

   //  $this->renderDashboard('admin/categories');
   // }
   // public function testimonials() {
 
   //  $this->renderDashboard('admin/testimonials');
   // }
   // public function projects() {
  
   //  $this->renderDashboard('admin/projects');
   // }

   // public function handleUsers(){
  


    
   //  // Get filter and search values from GET
   //  $filter = isset($_GET['filter']) ? $_GET['filter'] : 'all'; // Default to 'all' if no filter is selected
   //  $userToSearch = isset($_GET['userToSearch']) ? $_GET['userToSearch'] : ''; // Default to empty if no search term is provided
   //  // var_dump($userToSearch);die();

   //  // Call showUsers with both filter and search term
   //  $users = $this->UserModel->getAllUsers($filter, $userToSearch);
   //  $this->renderDashboard('admin/users',["users"=> $users]);
   // }

    // function to remove user
    // function removeUser($idUser){
    //     include '../connection.php';
    //     $removeUser = $conn->prepare("DELETE FROM utilisateurs WHERE id_utilisateur=?");
    //     $removeUser->execute([$idUser]);
    // }
    
    // // check the post request to remove the user
    // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_user'])) {
    //     $idUser = $_POST['remove_user'];
    //     removeUser($idUser);
    //     // Redirect to avoid form resubmission after page reload
    //     header("Location: users.php");
    //     exit();
    // }

    // // function to block user
    // function changeStatus($idUser){
    //     include '../connection.php';

    //     // get the old status
    //     $stmt = $conn->prepare("SELECT is_active FROM utilisateurs WHERE id_utilisateur = ?");
    //     $stmt->execute([$idUser]);
    //     $currentStatus = $stmt->fetchColumn();

    //     $changeStatus = $conn->prepare("UPDATE utilisateurs SET is_active=? WHERE id_utilisateur=?");
    //     $changeStatus->execute([$currentStatus==0?1:0,$idUser]);
    // }
    // // check the post request to block the user
    // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['block_user_id'])) {
    //     $idUser = $_POST['block_user_id'];
    //     changeStatus($idUser);
    //     // Redirect to avoid form resubmission after page reload
    //     header("Location: users.php");
    //     exit();
    // }





 

}