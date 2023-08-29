    <?php

    //echo 'hello';

    // Ouvre une connexion à la Base de données,
    // et configure la connexion pour afficher toutes les erreurs (s'il s'en produit)
    function getPDO()
    {
        $host = '127.0.0.1';
        $port = 3306;
        $dbname = 'projet_perso';
        $user = 'root';
        $password = '';
        $dataSourceName = "mysql:host=$host;port=$port;dbname=$dbname";
        $pdo = new PDO($dataSourceName, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
    function logMsg($msg)
    {
        echo 'foo';
        echo $msg . PHP_EOL;
    }

    class LibArticle{
    // Bibliothèque de fonctions dédiées aux Articles

    static function create($idUser, $title, $description, $text, $picture, $idCategorie, $difficulte)
    {
        $query = 'INSERT INTO article (idUtilisateur, titre, descriptionCourte, textArticle, immage, idCategorie, difficulte) VALUES';
        $query .= ' (:idUtilisateur, :titre, :descriptionCourte, :textArticle, :immage, :idCategorie, :difficulte)';

        $stmt = getPDO()->prepare($query);
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
    $query = 'SELECT ART.id, ART.idUtilisateur, ART.titre, ART.descriptionCourte, ART.textArticle, ART.immage, ART.dateHeure';
    $query .= ' FROM article ART';
    $query .= ' WHERE ART.id = :id';
    $stmt = getPDO()->prepare($query);
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
        $stmt = getPDO()->prepare($query);
    // logMsg($stmt->debugDumpParams());

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
        $stmt = getPDO()->prepare($query);
        // logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        //  logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    }