<?php include($_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php') ?>

<main>
    <h1>
        <?= $pageTitle ?>
    </h1>

    <form id="form-inscription" method="post" action="/ctrl/inscription.php">

        <div>
            <label for="prenom">Prenom</label>
            <input id="prenom" type="text" name="prenom" autofocus required>
            
            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom" required>

            <label for="mail">E-mail</label>
            <input id="mail" type="text" name="mail" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            
            <button type="submit">Submit</button>
        </div>

    </form>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/view/partial/footer.php') ?>