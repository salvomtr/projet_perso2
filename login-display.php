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
    <title>Login</title>
    <link rel="stylesheet" href="./css/<?= $theme ?>.css">
</head>

<body>
    <?php include './header.php' ?>

    <h1>Login</h1>

    <form id="form-login" method="post" action="./login.php">

        <div>
            <label for="username">Username</label>
            <input id="username" type="text" name="username" autofocus>
            <button type="submit">Submit</button>
        </div>
    </form>

</body>

</html>