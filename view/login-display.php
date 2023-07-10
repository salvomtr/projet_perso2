<?php include '../view/partial/header.php' ?>

<main>
    <h1><?= $pageTitle ?></h1>

    <form id="form-login" method="post" action="/ctrl/login.php">

        <div>
            <label for="mail">E-mail</label>
            <input id="mail" type="text" name="mail" autofocus>
            <label for="password_1">Password</label>
            <input id="password_2" type="password" name="password">
            <button type="submit">Submit</button>
        </div>
        
    </form>
</main>

<?php include '../view/partial/footer.php' ?>