<?php

session_start();

$theme = 'style';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/css/style.css">
    <title><?= $pageTitle ?></title>
</head>

<body>

    <header class="p-1 d-flex align-center">
        <nav>
            <ul>
                <a href="/ctrl/accueil.php">Accueil</a>
                <a href="/ctrl/article.php">Recettes</a>
                <a href="/ctrl//secret.php">Secret !?..</a>
               
                <?php if ($_SESSION['username']) { ?>
                    Hello "<?= $_SESSION['username'] ?>"</li>
                    <a href="/ctrl/logout.php">Logout</a></li>
                <?php } else { ?>
                    <a href="/ctrl/login-display.php">Login</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>