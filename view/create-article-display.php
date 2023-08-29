<?php include '../view/partial/header.php' ?>


<main>
    <main>
        <h1>
            <?= $pageTitle ?>
        </h1>

        <form id="form-article" method="post" action="/ctrl/create-article.php">

            <div>
                <p>Titre recette : <input type="text" name="recette" /></p>
                <p>Description : <input type="text" name="recette" /></p>
                <p>Votre texte : <input type="text" name="texte" /></p>
                <p>Titre recette : <input type="text" name="recette" /></p>
                <p>Titre recette : <input type="text" name="recette" /></p>
                <p><input type="submit" value="OK"></p>

            </div>

        </form>
    </main>
</main>

<?php include '../view/partial/footer.php' ?>