<?php
class livre{
private $id;
private $titre;
private $prix;
private $image;


public function __construct($id,$titre,$prix,$image)
{
    $this->id = $id;
    $this->titre = $titre;
    $this->prix = $prix;
    $this->image = $image;
   
}

public function getId(){return $this->id;}
public function setId($id){$this->id = $id;}

public function getTitre(){return $this->titre;}
public function setTitre($titre){$this->titre = $titre;}

public function getPrix(){return $this->prix;}
public function setPrix($prix){$this->prix = $prix;}

public function getImage(){return $this->image;}
public function setImage($image){$this->image = $image;}
}