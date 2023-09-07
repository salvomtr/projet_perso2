<?php include '../view/partial/header.php' ?>



<main>
    <h1>
        <?= $pageTitle ?>
    </h1>

    <table>
        <tr>
            <th>user</th>
            <th>article</th>
            <th>commentaire</th>
        </tr>
        <tr>
            <td>
                <?= $utilisateur['nom'] ?>
            </td>
        </tr>

    </table>





</main>

<?php include '../view/partial/footer.php' ?>