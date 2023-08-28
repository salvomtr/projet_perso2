<?php $pageTitle = ''?>

<?php require_once('../lib/article.php');?>

<?php
$id = $_GET['id'];

// Appel de la fonction read() pour récupérer l article
$article = LibArticle::read($id);

?>

<?php include '../view/article-single.php' ?>