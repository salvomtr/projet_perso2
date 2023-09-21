<?php

session_start();


$isRegistered = false;
if (array_key_exists('utilisateur', $_SESSION) && isset($_SESSION['utilisateur'])) {
    $isRegistered = true;
    $idRole = $_SESSION['utilisateur']['idRole'];
}

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

    <header class="p-1 d-flex wrap g-1 align-center">
        <a href="/">
            <img src="../asset/logo.png" alt="logo" width="150">
        </a>
        <form action="">
        <input type="search">
        <button>
            search
        </button>
        </form>
        <nav>
            <div class="menu_element">

                <?php if ($isRegistered) { ?> Hello "
                    <?= $_SESSION['nom'] ?>"
                <?php } ?>

                <a class="button_menu" href="/ctrl/accueil.php">Accueil</a>
                <a class="button_menu" href="/ctrl/article.php">Recettes</a>

                <?php if ($isRegistered) { ?>
                    <a class="button_menu" href="/ctrl/create-article-display.php">Create Article</a>
                <?php } ?>

                <?php if (
                    $isRegistered
                    && $idRole == 1
                ) { ?>

                    <a class="button_menu" href="/ctrl/admin-display.php">Admin</a>
                <?php } ?>


                <?php if ($isRegistered) { ?>

                    <a href="/ctrl/logout.php">Logout</a>

                <?php } else { ?>
                    <a class="button_menu" href="/ctrl/login-display.php">Login</a>
                    <a class="button_menu" href="/ctrl/inscription-display.php">Inscription</a>
                <?php } ?>

            </div>
        </nav>
    </header>