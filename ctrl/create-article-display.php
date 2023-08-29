<?php require_once('../lib/article.php');  ?>

<?php

$pageTitle = 'Creer Article';


//list les categories pour alimentatire la liste des choix dans le formulaire
$listCategories = LibArticle::listCategorie();

?>

<?php include '../view/create-article-display.php' ?>