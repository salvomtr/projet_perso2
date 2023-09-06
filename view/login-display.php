<?php include '../view/partial/header.php' ?>

<main>
    <h1>
        <?= $pageTitle ?>
    </h1>

    <form id="form-login" method="post" action="/ctrl/login.php">

        <div>
            <label for="mail">E-mail</label>
            <input id="mail" type="text" name="mail" autofocus required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <button type="submit">Submit</button>
        </div>

    </form>
</main>

<?php include '../view/partial/footer.php' ?>