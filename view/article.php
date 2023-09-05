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
                        <?= $article['textArticle'] ?>
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