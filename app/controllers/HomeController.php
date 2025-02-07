<?php 

class HomeController extends BaseController {

   public function index() {
      // Vérifier si l'utilisateur est connecté
      if(isset($_SESSION['user_loged_in_id'])){
         // Rediriger vers le tableau de bord selon le rôle
         if($_SESSION['user_role'] == 'Enseignant') {
            header("Location: /admin");
            exit;
         } elseif($_SESSION['user_role'] == 'etudiant') {
            header("Location: /dashboard");
            exit;
         }
      }

      // Si l'utilisateur n'est pas connecté, afficher la page d'accueil publique
      $this->render('Home');
   }
}
