<?php
//Fazendo conexão com o banco.
include '../conexao.php';

//Recebendo os dados da tela de cadastro.
$titulo=$_POST['titulo'];
$link=$_POST['link'];
$categoria=2;
$data = date('Y-m-d');

$sql = "INSERT INTO noticias(titulo, link, categoria, data, id_noticias)
VALUES ('$titulo','$link', '$categoria', '$data', NULL)"; 

//Erro de SQL
mysqli_query($conexao, $sql) or die("Ocorreu um erro ao cadastrar a vídeo-aula! Tente novamente.");
mysqli_close($conexao);

echo"<script>alert('Cadastrado com sucesso!');
	window.location.replace('adm_videos.php');
	</script>";

?>


