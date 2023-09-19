<?php session_start(); ?>
<?php $pageTitle = 'Recettes' ?>

<?php require_once('../lib/article.php'); ?>

<?php
if (array_key_exists('utilisateur', $_SESSION) && isset($_SESSION['utilisateur'])) {
    $idUtilisateur = $_SESSION['utilisateur']['id'];
}
?>

<?php
// Inclure le fichier contenant la fonction readAll() et la connexion à la base de données

// Appel de la fonction readAll() pour récupérer tous les articles
$articles = LibArticle::readArtPub($idUtilisateur);

?>
<?php include '../view/article.php' ?>

