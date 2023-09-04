<?php

require_once('../lib/article.php');

$pageTitle = 'Articles';

$id = $_GET['id'];

// Appel de la fonction delete pour effacer l article
$ret = LibArticle::deleteCommentaires($id);
$ret = LibArticle::delete($id);


// redirige l utilisateur a la page recette
header('Location: /ctrl/article.php');
include '../view/article.php' ?>