<?php include '../view/partial/header.php' ?>

<main class="p-1">
    <h1>
        <?= $pageTitle ?>
    </h1>

    <div class="container d-flex wrap jc-center mw-1200 m-auto">
        <!-- liste des posts / recettes -->
        <?php foreach ($articles as $article) { ?>

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
                        $linenb = 0;
                        foreach ($linesText as $line) {
                            $linenb++;
                            if ($linenb > 6) {
                                break;
                            }
                            ?>
                            <?= $line ?><br>
                        <?php } ?>
                    </p>
                </div>

                <footer class="art__footer">
                    <a href="/ctrl/article-single.php?id=<?= $article['id'] ?>">En savoir plus</a>
                </footer>

            </article>

        <?php } ?>

    </div>

</main>

<?php include '../view/partial/footer.php' ?>