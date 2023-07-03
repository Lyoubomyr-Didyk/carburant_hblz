<?php

$host = '0.0.0.0';
$dbname = 'postgres';
$username = 'postgres';
$password = 'password';

$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";  // data source name
try{
    $conn = new PDO($dsn);
  //echo "ok, la base est connecté";
}catch (PDOException $e){
    echo $e->getMessage();
}

function request ($conn, $query){
    $result = $conn->query($query);
    $lines = $result->fetchAll(PDO::FETCH_ASSOC);
    return $lines;
}
?>