<?php

ob_start() 
?>

<div class="row">
    <div class="col-6">
        <img src="<?= URL ?>public/images/<?= $livre->getImage();?>" alt="">
    </div>
    <div class="col-6">
    <p> Titre : <?=$livre->getTitre();?> </p>
    <p> Prix : <?=$livre->getPrix();?> €</p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $livre->getTitre();
require "template.php";
?>