<?php

ob_start()
?>
<div class="text-center" >
  <form method="post" action="" class="form-signin">
    <label for="staticEmail" ><h3>Email</h3></label>
    <input type="text" class="form-control"  id="staticEmail"  name="email">
    <label for="inputPassword" ><h3>Password</h3></label>
    <input type="password" class="form-control" id="inputPassword" name="password">
    <button class="btn btn-danger" type="submit">se connecter</button>
  </form>
</div>
<?php  if($alert !== ""){  ?>
   <div class="alert alert-danger" role="alert">
   <?= $alert ?>
   </div>
<?php } ?>

<?php
$content = ob_get_clean();
$titre = "Connexion";
require "template.php";
?>