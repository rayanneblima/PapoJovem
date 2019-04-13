<?php

include('../conexao.php');

$id_perguntas = $_POST['id_perguntas'];
$resp = $_POST['resp'];								
$sql = "UPDATE perguntas SET resp='$resp' WHERE perguntas.id_perguntas = '$id_perguntas'"; 

mysqli_query($conexao, $sql) or die("Ocorreu um erro ao enviar a resposta!");
mysqli_close($conexao);

echo"<script>alert('Salva com sucesso!');
	window.location.replace('index.php');
	</script>";
?>