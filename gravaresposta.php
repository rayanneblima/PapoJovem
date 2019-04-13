<?php
//Fazendo conexão com o banco.
include 'conexao.php';
$id_enquete = $_GET['id_enquete'];

$votosA=0; 
$votosB=0; 
$votosC=0; 
$votosD=0; 
$votosTotal=0;

if($_POST['radio']=='A'){
	$pegaResp = mysqli_query($conexao,"SELECT * FROM enquete WHERE id_enquete = '$id_enquete'");
	//chamar o total de votos aqui
	while($ln = mysqli_fetch_array($pegaResp)){
		$votosA = $ln['votosA'] + 1;
		$votosTotal = $ln['total']+ 1;
	}
	$sql = "UPDATE enquete SET votosA='$votosA', total='$votosTotal' WHERE id_enquete='$id_enquete'";
	//mudar o total de votos aqui
	echo"<script>alert('Obrigado pelo seu voto!');
	window.location.replace('categorias/enquete.php');
	</script>";
}

else if($_POST['radio']=='B'){
	$pegaResp = mysqli_query($conexao,"SELECT * FROM enquete WHERE id_enquete = '$id_enquete'");
	while($ln = mysqli_fetch_array($pegaResp)){
		$votosB = $ln['votosB'] + 1;
		$votosTotal = $ln['total']+ 1;
	}
	$sql = "UPDATE enquete SET votosB='$votosB', total='$votosTotal' WHERE id_enquete='$id_enquete'";		
echo"<script>alert('Obrigado pelo seu voto!');
	window.location.replace('categorias/enquete.php');
	</script>";
}

else if($_POST['radio']=='C'){
	$pegaResp = mysqli_query($conexao,"SELECT * FROM enquete WHERE id_enquete = '$id_enquete'");
	while($ln = mysqli_fetch_array($pegaResp)){
		$votosC = $ln['votosC'] + 1;
		$votosTotal = $ln['total']+ 1;
	}
	$sql = "UPDATE enquete SET votosC='$votosC', total='$votosTotal' WHERE id_enquete='$id_enquete'";
echo"<script>alert('Obrigado pelo seu voto!');
	window.location.replace('categorias/enquete.php');
	</script>";
}

else if($_POST['radio']=='D'){
	$pegaResp = mysqli_query($conexao,"SELECT * FROM enquete WHERE id_enquete = '$id_enquete'");
	while($ln = mysqli_fetch_array($pegaResp)){
		$votosD = $ln['votosD'] + 1;
		$votosTotal = $ln['total']+ 1;
	}
	$sql = "UPDATE enquete SET votosD='$votosD', total='$votosTotal' WHERE id_enquete='$id_enquete'";
echo"<script>alert('Obrigado pelo seu voto!');
	window.location.replace('categorias/enquete.php');
	</script>";	
}
else echo"<script>alert('Obrigado pelo seu voto!');
	window.location.replace('categorias/enquete.php');
	</script>";

//Erro de SQL
mysqli_query($conexao, $sql) or die("Ocorreu um erro ao votar! Tente novamente.");
mysqli_close($conexao);
?>

