<?php session_start(); ?>

<?php

$theme = 'style';
if ($_COOKIE['prefer-inverted-theme']) {
    $theme .= '-inverted';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/<?= $theme ?>.css">
    <title><?= $pageTitle ?></title>
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="./hello-girls.php">Hello Girls !</a></li>
                <li><a href="./hello-boys.php">Hello Boys !</a></li>
                <li><a href="./secret.php">Secret !?..</a></li>
                <li>
                    <form action="./invert-theme.php">
                        <button type="submit">Invert theme</button>
                    </form>
                </li>
                <?php if ($_SESSION['username']) { ?>
                    <li>Hello "<?= $_SESSION['username'] ?>"</li>
                    <li><a href="logout.php">Logout</a></li>
                <?php } else { ?>
                    <li><a href="./login-display.php">Login</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>