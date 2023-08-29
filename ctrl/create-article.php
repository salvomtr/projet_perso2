<?php require_once('../lib/article.php');

session_start(); ?>


<?php $pageTitle = 'Create Article' ?> 



<?php
$idUser = $_SESSION['user']['id'];
$title = $_POST['titre'];
$description = $_POST['descriptionCourte'];
$text = $_POST['textArticle'];
$picture = $_POST['immage'];
$idCategorie = $_POST['idCategorie'];
$difficulte = $_POST['difficulte'];


// Appel de la fonction create() pour creer des articles
$articles = LibArticle::create($idUser, $title, $description, $text, $picture, $idCategorie, $difficulte);


header('Location: /ctrl/article.php');
?>