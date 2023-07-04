<?php

$dsn = 'pgsql:host=localhost;port=5432;dbname=postgres;user=postgres;password=password';

try
{
    $pdo = new PDO($dsn);
    if ($pdo) {
//        echo"connected";
    }
}
catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
}

