<?php session_start(); ?>
<?php $pageTitle = 'Recettes' ?>

<?php require_once('../lib/article.php'); ?>

<?php
if (array_key_exists('utilisateur', $_SESSION) && isset($_SESSION['utilisateur'])) {
    $idUtilisateur = $_SESSION['utilisateur']['id'];
}

$idCategorie = -1;
if(array_key_exists('idCategorie', $_GET)) {
    $idCategorie = (int)$_GET['idCategorie'];
}

$filtre = null;
if(array_key_exists('q', $_GET)) {
    $filtre = $_GET['q'];
    if($filtre === '') {
        $filtre = null;
    }
}
?>

<?php
// Inclure le fichier contenant la fonction readAll() et la connexion à la base de données

// Appel de la fonction readAll() pour récupérer tous les articles
$articles = LibArticle::readArtPub($idUtilisateur, $idCategorie, $filtre);
?>
<?php include '../view/article.php' ?>

