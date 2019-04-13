<?php

include('../conexao.php');

$id_enquete = $_POST['id_enquete'];
$pergunta = $_POST['pergunta'];
$categoria = $_POST['categoria'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
		
$sql = "UPDATE enquete SET pergunta='$pergunta', categoria='$categoria', a='$a', b='$b', c='$c', d='$d' WHERE enquete.id_enquete = '$id_enquete'"; 


mysqli_query($conexao, $sql) or die("Ocorreu um erro ao atualizar a enquete!");
mysqli_close($conexao);

echo"<script>alert('Salva com sucesso!');
	window.location.replace('adm_enquetes.php');
	</script>";

?>