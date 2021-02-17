<?php
require_once "Model.class.php";
require_once "Livre.class.php";
class LivreManager extends Model
{
    private $livres; //tableau de livres 

    public  function ajoutLivre($livre)
    {
        $this->livres[] = $livre;
    }

    public function getLivre()
    {
        return $this->livres;
    }
    public function chargementLivres()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM livres");
        $req->execute();
        $meslivres = $req->fetchALL(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ($meslivres as $livre) {
            $l = new Livre($livre['id'], $livre['titre'], $livre['prix'], $livre['image']);
            $this->ajoutLivre($l);
        }
    }

    public function getLivreById($id)
    {
        for ($i = 0; $i < count($this->livres); $i++) {
            if ($this->livres[$i]->getId() === $id) {
                return $this->livres[$i];
            }
        }
    }

    public function AjoutLivreBd($titre, $prix, $image)
    {
        $req = "
  INSERT INTO livres (titre,prix,image)
  values(:titre, :prix ,:image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":prix", $prix, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->closeCursor();

        if ($resultat > 0) {
            $livre = new Livre($this->getBdd()->lastInsertId(), $titre, $prix, $image);
            $this->ajoutLivre($livre);
        }
    }
    public function suppressionLivreBd($id)
    {
        $req = "
    Delete from livres where id= :idLivre
    ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idLivre", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $livre = $this->getLivreById($id);
            unset($livre);
        }
    }
}
