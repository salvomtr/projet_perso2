<?php session_start(); ?>

<?php

$pageTitle = 'Secret !...';
if (isset($_SESSION['username'])) {
    $pageTitle = 'No more secret :)';
}
?>

<?php include '../view/secret.php' ?>