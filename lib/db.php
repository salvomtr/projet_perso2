<?php


class LibDb
{

    static function logMsg($msg)
    {
        echo 'foo';
        echo $msg . PHP_EOL;
    }

    // Ouvre une connexion à la Base de données,
    // et configure la connexion pour afficher toutes les erreurs (s'il s'en produit)
    static function getPDO()
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
}



