<?php session_start(); ?>

<?php

$pageTitle = 'Secret !...';
if (isset($_SESSION['username'])) {
    $pageTitle = 'No secret :)';
}

?>

<?php include './view/secret.php' ?>