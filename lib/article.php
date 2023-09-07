<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/db.php');

function logMsg($msg)
{
    echo 'foo';
    echo $msg . PHP_EOL;
}

class LibArticle
{
    // Bibliothèque de fonctions dédiées aux Articles

    static function create($idUser, $title, $description, $text, $picture, $idCategorie, $difficulte)
    {
        $query = 'INSERT INTO article (idUtilisateur, titre, descriptionCourte, textArticle, immage, idCategorie, difficulte) VALUES';
        $query .= ' (:idUtilisateur, :titre, :descriptionCourte, :textArticle, :immage, :idCategorie, :difficulte)';

        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':idUtilisateur', $idUser);
        $stmt->bindParam(':difficulte', $difficulte);
        $stmt->bindParam(':idCategorie', $idCategorie);
        $stmt->bindParam(':titre', $title);
        $stmt->bindParam(':descriptionCourte', $description);
        $stmt->bindParam(':textArticle', $text);
        $stmt->bindParam(':immage', $picture);
        logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        return $successOrFailure;
    }




    // selection l article dont l id est passe'
    static function read($id)
    {
        // Prépare la requête
        $query = 'SELECT ART.id, ART.idUtilisateur, ART.titre, ART.descriptionCourte, ART.textArticle, ART.immage, ART.dateHeure, ART.difficulte, ART.pubblication';
        $query .= ' FROM article ART';
        $query .= ' WHERE ART.id = :id';
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':id', $id);
        //    logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        //   logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }




    static function readAll()
    {
        // Prépare la requête
        $query = 'SELECT ART.id, ART.idUtilisateur, ART.titre, ART.descriptionCourte, ART.textArticle, ART.immage, ART.difficulte, ART.dateHeure';
        $query .= ' FROM article ART';
        $query .= ' ORDER BY ART.titre ASC';
        $stmt = LibDb::getPDO()->prepare($query);
        // logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        //  logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // fucntion pour lire que les article publie'

    static function readArtPub($idUtilisateur)
    {
        // Prépare la requête
        $query = 'SELECT ART.id, ART.idUtilisateur, ART.titre, ART.descriptionCourte, ART.textArticle, ART.immage, ART.difficulte, ART.dateHeure, ART.pubblication';
        $query .= ' FROM article ART';
        $query .= ' WHERE ART.pubblication = 1 or ART.idUtilisateur = :idUtilisateur';
        $query .= ' ORDER BY ART.titre ASC';
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':idUtilisateur', $idUtilisateur);
        // Exécute la requête
        $successOrFailure = $stmt->execute();
        //  logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    static function listCategorie()
    {
        // Prépare la requête
        $query = 'SELECT CAT.id, CAT.nomCategorie';
        $query .= ' FROM categorie CAT';
        $query .= ' ORDER BY CAT.nomCategorie ASC';
        $stmt = LibDb::getPDO()->prepare($query);
        // logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        //  logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    static function update($id, $title, $description, $textArticle, $immage, $difficulte, $idCategorie)
    {


        $pdo = LibDb::getPDO();
        $query = "UPDATE article SET titre = :titre, textArticle = :textArticle , immage = :immage, descriptionCourte = :descriptionCourte,";
        $query .= "difficulte = :difficulte, idCategorie = :idCategorie, pubblication = 0 WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':immage', $immage);
        $stmt->bindParam(':descriptionCourte', $description);
        $stmt->bindParam(':titre', $title);
        $stmt->bindParam(':textArticle', $textArticle);
        $stmt->bindParam(':difficulte', $difficulte);
        $stmt->bindParam(':idCategorie', $idCategorie);


        $success = $stmt->execute();
        return $success;

    }


    static function delete($id)
    {
        // $query = 'SELECT article.title, article.texte';
        $query = 'DELETE article';
        $query .= ' FROM article';
        $query .= ' WHERE article.id = :id';

        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':id', $id);
        // $stmt->bindParam(':picture', $picture);
        logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        return $successOrFailure;
    }


    //lib dediee aux commentaires

    static function create_comment($text, $idArticle, $idUser)
    {
        $query = 'INSERT INTO commentaire (textCommentaire, idArticle, idUtilisateur) VALUES';
        $query .= ' (:textCommentaire, :idArticle, :idUtilisateur)';

        $pdo = LibDb::getPDO(); // Assuming you have a function to get the PDO connection

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':textCommentaire', $text);
        $stmt->bindParam(':idArticle', $idArticle);
        $stmt->bindParam(':idUtilisateur', $idUser);

        // Execute the query and handle any errors
        $successOrFailure = $stmt->execute();

        return $successOrFailure;
    }

    //liste les commentaires de l article passe en parametre
    static function readCommentaires($idArticle)
    {
        // Prépare la requête
        $query = 'SELECT COM.id, COM.textCommentaire, COM.idArticle, COM.idUtilisateur ';
        $query .= ' FROM commentaire COM';
        $query .= ' WHERE COM.idArticle = :idArticle';
        $query .= ' ORDER BY COM.textCommentaire ASC';
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':idArticle', $idArticle);
        // logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        //  logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    static function deleteCommentaires($id)
    {
        $query = 'DELETE FROM commentaire';
        $query .= ' WHERE idArticle = :id';
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':id', $id);
        // $stmt->bindParam(':picture', $picture);
        logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        return $successOrFailure;
    }



    static function listArtComm()
    {
        // Prépare la requête
        $query = 'SELECT ';
        $query .= ' ART.id AS idArticle';
        $query .= ', ART.titre';
        $query .= ', U.nom';
        $query .= ', U.id AS idUtilisateur';
        $query .= ', ART.descriptionCourte';
        $query .= ', ART.dateHeure';
        $query .= ', ART.pubblication';
        $query .= ' FROM article AS ART';
        $query .= ' INNER JOIN utilisateur AS U ON ART.idUtilisateur = U.id';
        $query .= ' WHERE ART.dateHeure > date_sub(curdate(), interval 30 day)';
        $stmt = LibDb::getPDO()->prepare($query);


        // Exécute la requête
        $successOrFailure = $stmt->execute();
        //  logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    static function publier($id)
    {


        $pdo = LibDb::getPDO();
        $query = "UPDATE article SET pubblication = NOT pubblication";
        $query .= " WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        
        $success = $stmt->execute();
        return $success;

    }


}
