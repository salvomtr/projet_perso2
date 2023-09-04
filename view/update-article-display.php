<?php include '../view/partial/header.php' ?>



    <main>
        <h1>
            <?= $pageTitle ?>
        </h1>

        <form id="form-article" method="post" action="/ctrl/update-article.php">


            <div>
                <input id="idArticle" type="hidden" value="<?= $article['id']?>" name="id">
                <br>
                <label for="title">Titre de votre recette: </label>
                <input id="title" type="text" placeholder="Titre" name="titre" value="<?= $article['titre']?>" autofocus>
                <br>
                <label for="description">Description: </label>
                <input id="description" type="text" placeholder="Description" name="descriptionCourte" value="<?= $article['descriptionCourte']?>">
                <br>
                <label for="text">Texte de votre recette: </label>
                <textarea id="text" placeholder="Texte" name="textArticle" rows="5" cols="33" value="<?= $article['textArticle']?>"></textarea>


                <br>
                <label for="difficulte">Difficulte: </label>
                <input id="difficulte" type="number" placeholder="Texte" name="difficulte" min="1" max="5" value="<?= $article['difficulte']?>">
                <br>
                <label for="categorie">Categorie recette: </label>
                <select id="categorie" name="idCategorie">
                    <?php foreach ($listCategories as $categorie): ?>
                        <option value="<?= $categorie['id'] ?>"><?= $categorie['nomCategorie'] ?></option>
                    <?php endforeach; ?>
                </select>

                <br>
                <label for="image">Image</label>
                <input id="image" type="text" placeholder="Votre image" name="immage" value="<?= $article['immage']?>">
                <hr>
                <button type="submit">Creer</button>

            </div>

        </form>
    </main>


<?php include '../view/partial/footer.php' ?>
