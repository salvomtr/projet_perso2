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
    <link rel="stylesheet" href="/asset/style.css">
    <title>
        <?= $pageTitle ?>
    </title>
</head>

<body>

    <header class="p-1 d-flex align-center">
        <nav>
            <ul class="menu_element">
                <a class="button_menu" href="/ctrl/accueil.php">Accueil</a>
                <a class="button_menu" href="/ctrl/article.php">Recettes</a>

                <?php if (
                    array_key_exists('utilisateur', $_SESSION)
                    && isset($_SESSION['utilisateur'])
                    && $_SESSION['utilisateur']['idRole'] == 1

                        ) { ?>

                    <a class="button_menu" href="/ctrl/create-article-display.php">Create Article</a>
                    <a class="button_menu" href="/ctrl/admin.php">Admin</a>
                <?php } ?>


                <?php if (array_key_exists('nom', $_SESSION) && $_SESSION['nom']) { ?>

                    Hello "<?= $_SESSION['nom'] ?>"
                   
                    <a href="/ctrl/logout.php">Logout</a>

                <?php } else { ?>
                    <a class="button_menu" href="/ctrl/login-display.php">Login</a>
                <?php } ?>

            </ul>
        </nav>
    </header>