<?php
abstract class Model
{
    private static $pdo;

    private static function setBdd()
    {
        $user = 'root';
        $pass = '';
        $db_name = 'biblio';
        try {
            self::$pdo = new PDO('mysql:host=localhost;dbname=' . $db_name, $user, $pass);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            print "Erreurbnn !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}
