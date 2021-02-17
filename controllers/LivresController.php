<?php
require_once "models/LivreManager.class.php";


class LivresController{
    private $livreManager;
   

    public function __construct()
    {
        
    $this->livreManager = new LivreManager;
    $this->livreManager->chargementLivres();
  
    }

    public function suppressionLivre($id){
     $nomImage = $this->livreManager->getLivreById($id)->getImage();
     unlink(("public/images/".$nomImage));
     $this->livreManager->suppressionLivreBD($id);
     header('location:'. URL ."livres");
    }

    public function modificationLivre($id){
       $this->livreManager->getLivreById($id);
       require "views/modifierlivres.php";
    }
    public function affiche(){ 
      $livres = $this->livreManager->getLivre();
        require "views/accueil.php";
    }
    public function afficherLivres(){
      $livres = $this->livreManager->getLivre();
        require "views/livres.php";
      
    }

    public function afficherLivre($id){
      $livre = $this->livreManager->getLivreById($id);
      require "views/afficherLivre.php";
    }
    public function ajoutLivre(){
      require "views/ajoutLivre.php";
    }
    public function ajoutLivreValidation()
    {
      $file = $_FILES['image'];
      $repertoire = "public/images/";
      $nomImageAjoute = $this->ajoutImage($file,$repertoire);
      $this->livreManager->ajoutLivreBd($_POST['titre'],$_POST['prix'],$nomImageAjoute);
      header('location:'. URL ."livres");
    }


//function reutilisable pour la congif d'une image a ajouter


    private function ajoutImage($file , $dir)
    {
      if(!isset($file['name']) || empty($file['name']))
      throw new Exception("vous devez choisir une image");
      if(!file_exists($dir)) mkdir($dir,0777);

      $extention = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
      $random = rand(0,99999);
      $target_file = $dir.$random."_".$file['name'];

      if(!getimagesize($file["tmp_name"]))
      throw new Exception("le fichier n'est pas une image ");
      if($extention !== "jpg" && $extention !== "jpeg" && $extention !== "png"&& $extention !== "gif")
      throw new Exception("l'extention du fichier n'est pa reconnu ");
      $s =1000000;
      if($file['size']>$s)
      throw new Exception("la taille maximale du fichier est :".$s);
      if(!move_uploaded_file($file['tmp_name'],$target_file))
      throw new Exception("l'ajout de l'image n'a pas fonctionné ");
      else return($random."_".$file['name']);
      
      
    }
    
 
}