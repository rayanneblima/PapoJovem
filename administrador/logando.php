<?php

//Fazendo conexão com o banco.
include '../conexao.php';

$emailuser=addslashes($_POST['emailuser']);
$senha=addslashes($_POST['senha']);

if ($_POST['emailuser'] && $_POST['senha']){
    $resultado = mysqli_query($conexao, "SELECT * FROM usuarios");
    $linhas = mysqli_num_rows($resultado);
    
    while($linhas = mysqli_fetch_array($resultado)){
        if ($linhas['emailuser'] == $emailuser && $linhas['senha'] == $senha) {
            
            $_SESSION['conectado'] = 1;
            $_SESSION['id_user'] = $linhas['id_user'];  
            $_SESSION['emailuser'] = $linhas['emailuser'];  
            $_SESSION['senha'] = $linhas['senha'];  
        }
    }
    
    if ($_SESSION["conectado"]){
		echo "<script>alert('Bem-vindo!');
		window.location.replace('index.php');
		</script>";
	} else{
	echo "<script>alert('Usuário ou senha inválido! Tente novamente.');
	window.location.replace('login.php');
	</script>";
    }
}
    
?>