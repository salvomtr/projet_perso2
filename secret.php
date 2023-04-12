<?php include './header.php'; ?>

<?php

$pageTitle = 'Secret !...';
if (isset($_SESSION['username'])) {
    $pageTitle = 'No secret :)';
}

?>

<main>
    <h1><?= $pageTitle ?></h1>
</main>

<?php include './footer.php'; ?>