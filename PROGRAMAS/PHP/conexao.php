<?php
$hostname = "localhost";
$port = 3306;
$username = "root";
$passaword = "";
$database = "DoIn";
$con = mysqli_connect($hostname, $username, $passaword, $database, $port);
if(mysqli_connect_errno()){
    printf("erro ao conectar ao banco de dados: 5s\n", mysqli_connect_error());
}
printf("Banco de dados conectado com sucesso \o/")
?>