<?php


ob_start() ?>


<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php
            for ($i = 0; $i < count($livres); $i++) :
            ?>

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="public/images/<?= $livres[$i]->getImage(); ?>">
                        <div class="card-body">
                            <p class="card-text"><a href="<?= URL ?>livres/r/<?= $livres[$i]->getId(); ?>"><?= $livres[$i]->getTitre() ?></a></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-secondary"><?= $livres[$i]->getPrix() ?> €</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor ?>
        </div>
    </div>
</div>



<?php

$content = ob_get_clean();
$titre = "Bibliothèque MGA";
require "template.php";
?>
