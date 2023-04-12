<?php

$pageTitle = 'Secret !...';
if (isset($_SESSION['username'])) {
    $pageTitle = 'No secret :)';
}
?>

<?php include './header.php'; ?>

<main>
    <h1><?= $pageTitle ?></h1>
</main>

<?php include './footer.php'; ?>