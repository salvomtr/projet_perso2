<?php session_start(); ?>

<?php

$pageTitle = 'Secret !...';
if (isset($_SESSION['nom'])) {
    $pageTitle = 'No more secret :)';
}
?> 

<?php include '../view/admin.php' ?><?php

$pageTitle = 'Secret !...';
if (isset($_SESSION['nom'])) {
    $pageTitle = 'No more secret :)';
}
