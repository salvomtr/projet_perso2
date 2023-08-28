<?php $pageTitle = 'Recettes'?>

<?php require_once('../lib/article.php');?>

<?php
// Inclure le fichier contenant la fonction readAll() et la connexion à la base de données

// Appel de la fonction readAll() pour récupérer tous les articles
$articles = LibArticle::readAll();

// Vous pouvez maintenant parcourir les articles et faire quelque chose avec les données
foreach ($articles as $article) {
    // echo "ID : " . $article['id'] . "<br>";
    echo "Titre : " . $article['titre'] . "<br>";
    echo "Description : " . $article['descriptionCourte'] . "<br>";
    echo "Procediment : " . $article['textArticle'] . "<br>";
    echo "<br>";
}

?>
<?php include '../view/article.php' ?>