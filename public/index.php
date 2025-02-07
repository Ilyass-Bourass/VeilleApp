<?php
session_start();

if ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/index.php') {
    header("Location: /home");
    exit();
}



require_once ('../core/BaseController.php');
require_once '../core/Router.php';
require_once '../core/Route.php';
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/EnseignantController.php';
require_once '../app/config/db.php';
require_once '../app/controllers/EtudiantController.php';


$router = new Router();
Route::setRouter($router);



// Define routes
// auth routes 
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'handleRegister']);
Route::get('/login', [AuthController::class, 'showleLogin']);
Route::post('/login', [AuthController::class, 'handleLogin']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/test', [AuthController::class, 'showPageTest']);
Route::get('/home', [HomeController::class, 'index']);

// Enseignant routers

Route::get('/enseignant', [EnseignantController::class, 'index']);
Route::get('/enseignant/approuver/{id}', [EnseignantController::class, 'handelapprouverSujet']);
Route::get('/enseignant/rejeter/{id}', [EnseignantController::class, 'handelrejeterSujet']);
Route::get('/enseignant/activer/{id}', [EnseignantController::class, 'handelactiverUser']);
Route::get('/enseignant/supprimer/{id}', [EnseignantController::class, 'handelsupprimerUser']);
// Route::get('/admin/users', [EnseignantController::class, 'handleUsers']);
// Route::get('/admin/categories', [EnseignantController::class, 'categories']);
// Route::get('/admin/testimonials', [EnseignantController::class, 'testimonials']);
// Route::get('/admin/projects', [EnseignantController::class, 'projects']);
// end admin routes

// etudiant routes
Route::get('/etudiant', [EtudiantController::class, 'index']);
Route::post('/suggestion', [EtudiantController::class, 'handelSuggereSujet']);




 

// client Routes 
// Route::get('/client/dashboard', [ClientController::class, 'index']);



// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);



