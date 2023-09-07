<?php include '../view/partial/header.php' ?>

<?php
$isRegistered = false;
$idRole = 0;
if (array_key_exists('utilisateur', $_SESSION) && isset($_SESSION['utilisateur'])) {
    $isRegistered = true;
    $idRole = $_SESSION['utilisateur']['idRole'];
    $utilisateur = $_SESSION['utilisateur'];
}



?>

<main class="p-1">
    <h1>
        <?= $pageTitle ?>
    </h1>

    <div class="container d-flex wrap jc-center mw-1200 m-auto">
        <article class="art p-1 mw-350 f-1-300">

            <header class="art__header">
                <picture>
                    <img src="https://source.unsplash.com/1600x900?meal&<?= $article['titre'] ?>" alt="Lorem"
                        width="600">
                </picture>

                <h2>
                    <?= $article['titre'] ?>
                </h2>

                <p>
                    <?= $article['descriptionCourte'] ?>
                </p>

                <p>
                    <small>Difficulté :
                        <?php for ($i = 1; $i <= $article['difficulte']; $i++) { ?>
                            ⭐
                        <?php } ?>
                    </small>
                </p>
            </header>

            <div class="art__summary">

                <p>
                    <?php
                    // Divise la chaîne de texte $article['textArticle'] en un tableau de lignes
                    //  en utilisant des caractères de retour à la ligne comme délimiteurs.
                    // $linesText = explode('\r', $article['textArticle']);
                    $linesText = preg_split("/(\r\n|\n|\r)/", $article['textArticle']);
                    foreach ($linesText as $line) { ?>
                        <?= $line ?><br>
                    <?php } ?>
                </p>

            </div>
        </article>
        <!--Se on est le gestionnaire ou l auteur de l article redirige', 
        on as le droit de supprimer ou modifier l article  -->
        <?php if ($idRole == 1 || $utilisateur['id'] == $article['idUtilisateur']) { ?>

            <div>
                <a href="../ctrl/deletArticle.php?id=<?= $article['id'] ?>">delete article</a>
            </div>

            <div>
                <a href="../ctrl/update-article-display.php?id=<?= $article['id'] ?>">modif article</a>
            </div>
        <?php } ?>




        <?php if ($idRole == 1) { ?>

            <?php if ($article['pubblication'] == 1) { ?>
                <div>
                    <a href="../ctrl/publier.php?id=<?= $article['id'] ?>">depublier</a>
                </div>
            <?php } elseif ($article['pubblication'] == 0) { ?>
                <div>
                    <a href="../ctrl/publier.php?id=<?= $article['id'] ?>">publier</a>
                </div>
            <?php } ?>

        <?php } ?>




        <div>
            <form id="form-commentaire" method="post" action="/ctrl/commentaire.php">
                <br>
                <label for="commentaire">Commentaire: </label>
                <input id="commentaire" type="text" placeholder="text" name="textCommentaire" autofocus required>
                <br>
                <input type="hidden" name="idArticle" value="<?= $article['id'] ?>">
                <button type="submit">creer</button>
            </form>
        </div>

        <div>
            <?php foreach ($listCommentaires as $commentaire) { ?>

                <article class="art p-1 mw-350 f-1-300">
                    <div class="art__summary">
                        <p>
                            <?= $commentaire['textCommentaire'] ?>
                        </p>
                    </div>
                </article>

            <?php } ?>
        </div>
    </div>
</main>

<?php include '../view/partial/footer.php' ?>