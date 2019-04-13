<?php
//Fazendo conexão com o banco.
include '../conexao.php';

$id_perguntas = $_GET['id_perguntas'];
$sql = "DELETE FROM perguntas WHERE perguntas.id_perguntas = '$id_perguntas'"; 
mysqli_query($conexao, $sql) or die("Ocorreu um erro ao deletar a pergunta!");




echo"<script>alert('Pergunta excluída com sucesso!');
	window.location.replace('index.php');
	</script>";
	
	mysqli_close($conexao);
?>