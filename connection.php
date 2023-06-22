<?php

$host = '0.0.0.0';
$dbname = 'fuel-dataviz';
$username = 'postgres';
$password = 'password';

$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";  // data source name
try{
    $conn = new PDO($dsn);
    echo "ok";
}catch (PDOException $e){
    echo $e->getMessage();
}

function request ($conn, $query){
    $result = $conn->query($query);
    $lines = $result->fetchAll(PDO::FETCH_ASSOC);
    return $lines;
}
?>