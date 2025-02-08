<?php 
require_once (__DIR__.'/../models/User.php');
require_once(__DIR__ . '/../models/Presentation.php');

class AuthController extends BaseController {
 
    private $UserModel ;
   public function __construct(){

      $this->UserModel = new User();

      
   }

   public function showRegister() {
      
    $this->render('auth/register');
   }

//    public function showPageTest(){
//     $data=$this->UserModel->getAllUsers('freelancers');
//     $this->render('auth/test',$data);
    
//    }
   public function showleLogin() {
      
    $this->render('auth/login');
   }

   public function showClander() {
    // Récupérer les présentations depuis la base de données
    $presentationModel = new Presentation();
    $presentations = $presentationModel->getAllPresentations();
    
    // Passer les données à la vue
    $data = [
        'presentations' => $presentations
    ];
    
    $this->render('presentations/calendar', $data);
}
   

   public function handleRegister(){

      
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
         if (isset($_POST['signup'])) {
            echo "<pre>";
         //   var_dump($_POST);die();

             $full_name = $_POST['name'];
             $email = $_POST['email'];
             $role = $_POST['role'];
             $password = $_POST['password'];
             $hashed_password = password_hash($password, PASSWORD_DEFAULT);

             $user = [$full_name,$hashed_password,$email,$role];

             

             $lastInsertId = $this->UserModel->register($user);

             if($lastInsertId){
               header('Location:login');
               exit;
             }  
         }
     }
   }


   public function handleLogin(){
      
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
         if (isset($_POST['login'])) {
             $email = $_POST['email'];
             $password = $_POST['password'];
             $userData = [$email,$password];

             $user = $this->UserModel->login($userData);
            
             $role = $user['role']; 
             $etat=$user['etat'];
             $_SESSION['user_loged_in_id'] = $user["id"];
             $_SESSION['user_loged_in_role'] = $role;
             $_SESSION['user_loged_in_nome'] = $user['name'];
             if ($role == "enseignant") {
                 header('Location:enseignant');
             } else if ($role == "etudiant" && $etat=="activer") {
                // var_dump($etat,"espaceactiver");
                // die();
                 header('Location: etudiant');
                 exit();
             } else if ($role == "etudiant" && $etat=="en_attente") {
                // var_dump($etat,"espaceEnattent");
                // die();
                echo "enAttend l'acceptation de l'admin";
            } 
             
             else {
               echo "erreur de login";
             } 
            
         }
     }

   }

   public function logout() {

      
      // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
      //  var_dump($_SESSION);die();
         if (isset($_SESSION['user_loged_in_id']) && isset($_SESSION['user_loged_in_role'])) {
             unset($_SESSION['user_loged_in_id']);
             unset($_SESSION['user_loged_in_role']);
             session_destroy();
            // echo "logout";
            // die();
             header("Location:/home");
             exit;
         }
   //   }
   }



}