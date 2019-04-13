<?php
//Fazendo conexão com o banco.
include '../conexao.php';

$id_artigos = $_GET['id_artigos'];
$sql = "DELETE FROM artigos WHERE artigos.id_artigos = '$id_artigos'"; 
mysqli_query($conexao, $sql) or die("Ocorreu um erro ao deletar o arquivo!");

	echo"<script>alert('Excluído com sucesso!');
	window.location.replace('adm_artigos.php');
	</script>";

mysqli_close($conexao);
?>