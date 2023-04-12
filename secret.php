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
    <title>Secret !...</title>
    <link rel="stylesheet" href="./css/<?= $theme ?>.css">
</head>

<body>
    <?php include './header.php' ?>
    <h1>Secret !...</h1>
</body>

</html>