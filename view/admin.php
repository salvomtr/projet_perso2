<?php include '../view/partial/header.php' ?>

<main>
    <h1>
        <?= $pageTitle ?>
    </h1>
    <div class="admin">
        <table>
            <tr>
                <th>user</th>
                <th>titre</th>
                <th>publication</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td>
                        <?= $row['nom'] ?>
                    </td>
                    <td>
                        <a href="../ctrl/article-single.php?id=<?= $row['idArticle'] ?>">
                            <?= $row['titre'] ?>
                        </a>
                    </td>
                    <td>
                        <?= $row['pubblication'] ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</main>

<?php include '../view/partial/footer.php' ?>