<?php

require_once('../lib/article.php');

$pageTitle = 'Articles';

$id = $_GET['id'];

// Appel de la fonction read() pour récupérer l article
$article = LibArticle::read($id); 
$listCategories = LibArticle::listCategorie();
// ../view/update-article-display.php

// redirige l utilisateur a la page recette
include '../view/update-article-display.php' ?>