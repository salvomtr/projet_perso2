<?php include($_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php') ?>

<main>
    <h1>
        <?= $pageTitle ?>
    </h1>

    <form id="form-inscription" class="form-inscription d-flex jc-center column mw-600 m-auto" method="post"
        action="/ctrl/inscription.php">

        <div>
            <label for="prenom">Prenom</label>
            <input id="prenom" type="text" name="prenom" minlength="3" maxlength="20" autofocus required>

            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom" minlength="3" maxlength="20" required>

            <label for="mail">E-mail</label>
            <input id="mail" type="text" name="mail" minlength="5" maxlength="319" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" minlength="4" maxlength="20" required>

            <button type="submit">Submit</button>
        </div>

    </form>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/view/partial/footer.php') ?>