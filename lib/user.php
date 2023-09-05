<?php

// Ouvre une connexion à la Base de données,
// et configure la connexion pour afficher toutes les erreurs (s'il s'en produit)
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

function logMsg($msg)
{
    echo $msg . PHP_EOL;
}

class LibUser
{
    // Bibliothèque de fonctions dédiées aux Utilisateurs
    static function create($nom, $prenom, $mail, $motDePasse, $idRole)
    {
        // hashe le mot de passe
        $passwordHashed = password_hash($motDePasse, PASSWORD_BCRYPT);



        $query = 'INSERT INTO utilisateur (nom, prenom, mail, motDePasse, idRole) VALUES';
        $query .= ' (:nom, :prenom, :mail, :motDePasse, :idRole)';

        $stmt = LibDb::getPDO()->prepare($query);
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
        $stmt = LibDb::getPDO()->prepare($query);
        logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // cherche un utilisateurd apres son email et sa password. 
    // retourn null si il ne existe pas
    static function login($mail, $motDePasse)
    {
        // Prépare la requête
        $query = 'SELECT U.id, U.nom, U.prenom, U.mail, U.motDePasse, U.idRole';
        $query .= ' FROM utilisateur AS U';
        $query .= ' WHERE U.mail = :mail';
        // $query .= ' AND U.motDePasse = :motDePasse';
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':mail', $mail);
        // $stmt->bindParam(':motDePasse', $motDePasse);
        logMsg($stmt->debugDumpParams());

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        // logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result == false) {
            return null;
        }
        password_verify($motDePasse, $result['motDePasse']);
        return $result;
    }

}