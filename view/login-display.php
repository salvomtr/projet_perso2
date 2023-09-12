<?php include '../view/partial/header.php' ?>

<main>
    
    <h1>
        <?= $pageTitle ?>
    </h1>

    <div>
        <form id="form-login" class="form-login d-flex jc-center column mw-600 m-auto" method="post"
            action="/ctrl/login.php">

            <label for="mail">E-mail</label>
            <input id="mail" type="text" name="mail" autofocus required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <button type="submit">Submit</button>
        </form>
    </div>

</main>

<?php include '../view/partial/footer.php' ?>