<?php

$pageTitle = 'Foodies toutes les recettes du monde!';

?>
<?php require_once('../lib/article.php'); ?>
<?php
$id = null;
if (key_exists('id', $_GET)) {
    $id = $_GET['id'];
}

// Appel de la fonction read() pour récupérer l article
$article = LibArticle::read($id);

//list le commentaire de l article
$listCommentaires = LibArticle::readCommentaires($id);
$articles = LibArticle::readArtPub();
$categories = LibArticle::listCategorie();
?>

<?php include '../view/accueil.php' ?>