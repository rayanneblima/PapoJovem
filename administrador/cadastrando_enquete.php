<?php
//Fazendo conexão com o banco.
include '../conexao.php';

//Recebendo os dados da tela de cadastro.
$pergunta=$_POST['pergunta'];
$categoria=$_POST['categoria'];
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];


//Insere todas as informações obtidas no banco de dados
$sql = "INSERT INTO enquete(pergunta, categoria, a, b, c, d)
VALUES ('$pergunta','$categoria','$a', '$b', '$c', '$d')"; 

//Erro de SQL
mysqli_query($conexao, $sql) or die("Ocorreu um erro ao cadastrar a enquete! Tente novamente.");
mysqli_close($conexao);

echo"<script>alert('Cadastrada com sucesso!');
	window.location.replace('adm_enquete.php');
	</script>";

?>
