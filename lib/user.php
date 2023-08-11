<?php

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
    echo $msg . PHP_EOL;
}

class LibUser
{
    // Bibliothèque de fonctions dédiées aux Utilisateurs
    static function create($nom, $prenom, $mail, $motDePasse, $idRole)
    {
        $query = 'INSERT INTO utilisateur (nom, prenom, mail, motDePasse, idRole) VALUES';
        $query .= ' (:nom, :prenom, :mail, :motDePasse, :idRole)';

        $stmt = getPDO()->prepare($query);
        // $stmt->bindParam(':id', $idUser);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':motDePasse', $motDePasse);
        $stmt->bindParam(':idRole', $idRole);
        logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        return $successOrFailure;
    }
    // Sélectionne tous les Utilisateurs et les ordonnées par nom
    static function readAll()
    {
        // Prépare la requête
        $query = 'SELECT USR.id, USR.mail, USR.motDePasse, USR.idRole';
        $query .= ' FROM utilisateur AS USR';
        $query .= ' ORDER BY USR.mail ASC';
        $stmt = getPDO()->prepare($query);
        logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // cherche un utilisateurd apres son email et sa password. 
    // retourn null si il ne existe pas
    static function find($mail, $motDePasse)
    {
        // Prépare la requête
        $query = 'SELECT U.id, U.nom, U.prenom, U.mail, U.motDePasse, U.idRole';
        $query .= ' FROM utilisateur AS U';
        $query .= ' WHERE U.mail = :mail';
        $query .= ' AND U.motDePasse = :motDePasse';
        $stmt = getPDO()->prepare($query);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':motDePasse', $motDePasse);
        logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        // logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result == false) {
            return null;
        }
        return $result;
    }


    
}
