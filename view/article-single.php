<?php include '../view/partial/header.php' ?>



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
                    <?= $article['textArticle'] ?>
                </p>
            </div>

        </article>

        <div>
            <a href="../ctrl/deletArticle.php?id=<?= $article['id'] ?>">delete article</a>
        </div>

        <div>
            <a href="../ctrl/update-article-display.php?id=<?= $article['id'] ?>">modif article</a>
        </div>

        <div>
            <form id="form-commentaire" method="post" action="/ctrl/commentaire.php">
                <br>
                <label for="commentaire">Commentaire: </label>
                <input id="commentaire" type="text" placeholder="text" name="textCommentaire" autofocus>
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



</main>



<?php include '../view/partial/footer.php' ?>