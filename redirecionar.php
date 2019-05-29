<?php

//Fazendo conexão com o banco.
include 'conexao.php';

$id_noticias = $_GET['id_noticias'];					//Pega o ID da notícia

$resultado = mysqli_query($conexao, "SELECT * FROM noticias WHERE noticias.id_noticias = '$id_noticias'"); //Seleciona tudo de notícias quando tiver o ID citado

$linhas = mysqli_num_rows($resultado); 

while($linhas = mysqli_fetch_array($resultado)){
	$visualizacoes = $linhas['visualizacoes'];				//Pega quantas visualizações já teve
	$update = "UPDATE noticias SET visualizacoes = '$visualizacoes'+1 WHERE noticias.id_noticias = '$id_noticias'"; //Adiciona 1 nas visualizações no banco de dados


header('Location: categorias/mostranoticia.php?id_noticias='.$linhas['id_noticias'].'');

}							//Redireciona pra notícia
mysqli_query($conexao, $update) or die("Erro, por favor, acesse manualmente a notícia!");
mysqli_close($conexao);
?>