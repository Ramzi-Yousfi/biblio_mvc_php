<?php 


ob_start() ?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>prix</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php 
   
    for($i=0;$i < count($livres);$i++) :
    ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?= $livres[$i]->getImage() ;?>" width="60px;"></td>
        <td class="align-middle"><a href="<?= URL ?>livres/r/<?=$livres[$i]->getId(); ?>"><?= $livres[$i]->getTitre() ?></a></td>
        <td class="align-middle"><?= $livres[$i]->getPrix() ?> €</td>
        <td class="align-middle"><a href="<?= URL ?>livres/u/<?= $livres[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle">
        <form action="<?= URL ?>livres/d/<?= $livres[$i]->getId(); ?>" method="post" onsubmit="return confirm('voulez vous vraiment suprimer ') ">
        <button class="btn btn-danger" type="submit"> suprimer</button>
        </form>
        </td>

    </tr>
    <?php endfor ?>

</table>
<a href="<?= URL ?>livres/c" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
$titre = "Les livres de la bibliothèque";
require "template.php";
?>