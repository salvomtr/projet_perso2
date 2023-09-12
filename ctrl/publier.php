<?php $pageTitle = '' ?>

<?php require_once('../lib/article.php'); ?>

<?php
$id = $_GET['id'];
?>

<?php
// Inclure le fichier contenant la fonction readAll() et la connexion à la base de données

// Appel de la fonction readAll() pour récupérer tous les articles
$succes = LibArticle::publier($id);

?>
<?php include '../view/article.php' ?>