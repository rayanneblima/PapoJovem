<?php
//Fazendo conexão com o banco.
$host = "";
$user="";
$pass="";
$banco = "epiz_22330010_papojovem";
ini_set('default_charset', 'UTF-8'); 
$conexao = mysqli_connect($host,$user,$pass,$banco) or die(mysqli_error());
$conexao->query("SET NAMES utf8"); 
mysqli_select_db($conexao,$banco) or die(mysqli_error());

//Faz o PHP aceitar acentos na hora de exibir
header('Content-type: text/html; charset=UTF-8');

//inicia sessão se usuario correto
session_start(); 
?>
