<?php
require_once "models/UserManager.class.php";



class UserController{
    
    private $UserManager;
   
    
    
    public function hel(){
        $this->UserManager = new UserManager;
        return $this->UserManager;
    }
   
  public function getPageLogin(){ 
   
      $alert = "";
      if(isset($_SESSION['acces']) && !empty($_SESSION['acces']) && $_SESSION['acces'] === "admin"){
       header('location'.URL.'acceuil');
    } 
     if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($this->hel()->connexionValid($email,$password))){
            $_SESSION['acces'] = "admin";
        }else{
            $alert = "mot de passe invalide";
     
         
            print_r($this->hel()->connexionValid($email,$password));
        }
     }


      require_once "views/login.php";
  }
}