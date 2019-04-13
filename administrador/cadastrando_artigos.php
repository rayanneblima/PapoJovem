<?php
//Fazendo conexão com o banco.
include '../conexao.php';
//Recebendo os dados da tela de cadastro.
$titulo=$_POST['titulo'];

if(isset($_FILES['arquivo'])){
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "../artigos/"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
    $sql = "INSERT INTO artigos(id_artigos,titulo, arquivo) VALUES(null,'$titulo', '$novo_nome')";
}
//Erro de SQL
mysqli_query($conexao, $sql) or die("Ocorreu um erro ao cadastrar o arquivo! Tente novamente.");
mysqli_close($conexao);

echo"<script>alert('Cadastrado com sucesso!');
	window.location.replace('adm_artigos.php');
	</script>";

?>


