<?php require_once('../lib/article.php'); ?>

<?php
$pageTitle = 'Admin';

//list les categories pour alimentatire la liste des choix dans le formulaire
$rows = LibArticle::listArtComm();
?>

<?php include '../view/admin.php' ?>