<?php

define("URL" , str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" :" http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));


require_once "controllers/LivresController.php";
$livreController = new LivresController;
require_once "controllers/UsersController.php";
$userController = new UserController;
try{
if (empty($_GET['page'])) {
  $livreController->affiche();
}else{
  $url = explode("/",filter_var($_GET['page']),FILTER_SANITIZE_URL); //separer l'url en plusieur segments et mieux le securisé 
  switch($url[0]){
      case "accueil" :
        $livreController->affiche();
      break;
      case "livres" :
         if(empty($url[1])){
           $livreController->afficherLivres();
         }else if($url[1] ==="c") {
           $livreController->ajoutLivre();
         }else if($url[1] ==="r") {
          $livreController->afficherLivre($url[2]);
        }else if($url[1] ==="u") {
          $livreController->modificationLivre($url[2]);
        }else if($url[1] ==="d") {
         $livreController->suppressionLivre($url[2]);
        }else if($url[1] ==="av") {
         $livreController->ajoutLivreValidation();
        }else{
          throw new Exception("la page n'existe pas ");
        }
        break;
        case "admin":$userController->getPageLogin();
      break;
      default :  throw new Exception("la page n'existe pas ");
  }
}
}catch(Exception $e){
  echo $e->getMessage();
}