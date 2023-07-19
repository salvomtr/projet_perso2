<?php

echo 'hello';

// Ouvre une connexion à la Base de données,
// et configure la connexion pour afficher toutes les erreurs (s'il s'en produit)
function getPDO()
{
    $host = 'localhost';
    $port = 3306;
    $dbname = 'projet_perso';
    $user = '';
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


// Bibliothèque de fonctions dédiées aux Articles

function create($idUser, $title, $description, $text, $picture)
{
    $query = 'INSERT INTO article (idUser, title, description, text, picture) VALUES';
    $query .= ' (:idUser, :title, :description, :text, :picture)';

    $stmt = getPDO()->prepare($query);
    $stmt->bindParam(':idUser', $idUser);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':text', $text);
    $stmt->bindParam(':picture', $picture);
    logMsg($stmt->debugDumpParams());

    // Exécute la requête
    $successOrFailure = $stmt->execute();
    logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

    return $successOrFailure;
}

function read($id)
{
   // Prépare la requête
   $query = 'SELECT ART.id, ART.idUser, ART.title, ART.description, ART.text, ART.picture, ART.timestamp';
   $query .= ' FROM article ART';
   $query .= ' WHERE ART.id = :id';
   $stmt = getPDO()->prepare($query);
   $stmt->bindParam(':id', $id);
   logMsg($stmt->debugDumpParams());

   // Exécute la requête
   $successOrFailure = $stmt->execute();
   logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result;
}

function readAll()
{
    // Prépare la requête
    $query = 'SELECT ART.id, ART.idUser, ART.title, ART.description, ART.text, ART.picture, ART.timestamp';
    $query .= ' FROM article ART';
    $query .= ' ORDER BY ART.timestamp DESC';
    $stmt = getPDO()->prepare($query);
    logMsg($stmt->debugDumpParams());

    // Exécute la requête
    $successOrFailure = $stmt->execute();
    logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function update($id, $title, $description, $text, $picture)
{
    // ...
}

function delete($id)
{
    // ...
}
