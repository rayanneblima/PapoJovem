<?php
//Fazendo conexão com o banco.
include '../conexao.php';

$id_enquete = $_GET['id_enquete'];
$sql = "DELETE FROM enquete WHERE enquete.id_enquete = '$id_enquete'"; 
mysqli_query($conexao, $sql) or die("Ocorreu um erro ao deletar a enquete!");

	echo"<script>alert('Excluída com sucesso!');
	window.location.replace('adm_enquetes.php');
	</script>";

mysqli_close($conexao);
?>