<?php
//Fazendo conexão com o banco.
include '../conexao.php';

//Recebendo os dados da tela de cadastro.
$pergunta= addslashes($_POST['pergunta']);


//Insere todas as informações obtidas no banco de dados
$sql = "INSERT INTO perguntas(perg) VALUE ('$pergunta')"; 



//Erro de SQL
mysqli_query($conexao, $sql) or die("Ocorreu um erro ao enviar a pergunta! Tente novamente.");
mysqli_close($conexao);
echo"<script>
	alert('Enviada com sucesso!');
</script>";
?>



<?php
header('Location: pergunta.php');
?>
