<?php
header('Content-type: text/html; charset=utf-8;');
//Fazendo conexão com o banco.
$host = "127.0.0.1";
$user="root";
$pass="";
$banco = "bd_papojovem";
$conexao = mysqli_connect($host,$user,$pass,$banco) or die(mysqli_error());
mysqli_select_db($conexao,$banco) or die(mysqli_error());
session_start();
?>