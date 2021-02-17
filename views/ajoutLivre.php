<?php

ob_start() 
?>

<form method="POST" action="<?=URL?>livres/av" enctype="multipart/form-data">
  <div class="form-group">
    <label for="Titre" class="form-label">titre</label>
    <input type="text" class="form-control" id="Titre" name="titre" >
  </div>
  <div class="form-group">
    <label for="prix" class="form-label">Prix</label>
    <input type="number" class="form-control" id="prix" name="prix" step="any" >
  </div>
  <div class="form-group">
    <label for="image">Image :</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
$content = ob_get_clean();
$titre = "ajout d'un livre";
require "template.php";
?>