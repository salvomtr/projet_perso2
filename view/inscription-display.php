<?php include '../view/partial/header.php' ?>

<main>
    <h1>
        <?= $pageTitle ?>
    </h1>

    <form id="form-inscription" method="post" action="/ctrl/inscription.php">

        <div>
            <label for="prenom">Prenom</label>
            <input id="prenom" type="text" name="prenom" autofocus>
            
            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom">

            <label for="mail">E-mail</label>
            <input id="mail" type="text" name="mail" autofocus>

            <label for="password_1">Password</label>
            <input id="password_2" type="password" name="password">
            
            <button type="submit">Submit</button>
        </div>

    </form>
</main>

<?php include '../view/partial/footer.php' ?>