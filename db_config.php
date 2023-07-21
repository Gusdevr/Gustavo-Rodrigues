<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "cadastro_contratos"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_errno) {
    echo "Falha ao conectar: " . $conn->connect_error;
}
?>

