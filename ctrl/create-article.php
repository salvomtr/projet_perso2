<?php $pageTitle = 'Create Article' ?>

<?php require_once('../lib/article.php'); ?>
<?php
$idCategorie = 2;
$idUser = 1; //$_POST['idUtilisateur'];
$title = 'ciao'; //$_POST['titre'];
$description = 'ciao ciao';//$_POST['descriptionCourte'];
$text = 'mangiare e bello';// $_POST['textArticle'];
$picture =// $_POST['immage'];
$difficulte = 3;


// Appel de la fonction create() pour creer des articles
$articles = LibArticle::create($idUser, $title, $description, $text, $picture, $idCategorie, $difficulte);


header('Location: /ctrl/article.php');
?> 