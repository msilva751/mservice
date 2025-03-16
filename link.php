<?php
$servername = "localhost";
$username = "dbclientes";
$password = "m@2s1lV*";
$dbname = "db_cliente";

$link = new  mysqli($servername, $username, $password, $dbname);
if ($link->connect_error){
    die('Conexão com o DB falhou!!! ' . $link->connect_error());
    exit();
}

//echo 'Connected successfully<br>';
//$link->close();
