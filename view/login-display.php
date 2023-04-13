<?php include './view/partial/header.php'; ?>

<main>
    <h1><?= $pageTitle ?></h1>

    <form id="form-login" method="post" action="./login.php">

        <div>
            <label for="username">Username</label>
            <input id="username" type="text" name="username" autofocus>
            <button type="submit">Submit</button>
        </div>
    </form>
</main>

<?php include './view/partial/footer.php'; ?>