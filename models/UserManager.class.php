<?php
require_once "Model.class.php";

class UserManager extends Model{
    function getPasswordUser($login){
        $bdd = $this->getBdd();
        $req = '
        SELECT * 
        FROM admin
        where email= :email';
        $stmt = $bdd->prepare($req);
        $stmt->bindValue(":email",$login,PDO::PARAM_STR);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $admin;
    }
    
    function isConnexionValid($login,$password){
        $admin = $this->getPasswordUser($login);
        return password_verify($password,$admin['pass']);
    }
}