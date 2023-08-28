<?php $pageTitle = 'Recettes'?>

<?php require_once('../lib/article.php');?>

<?php
// Inclure le fichier contenant la fonction readAll() et la connexion à la base de données

// Appel de la fonction readAll() pour récupérer tous les articles
$articles = LibArticle::readAll();

?>
<?php include '../view/article.php' ?>