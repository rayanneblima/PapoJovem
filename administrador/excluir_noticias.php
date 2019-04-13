<?php
//Fazendo conexão com o banco.
include '../conexao.php';

$id_noticias = $_GET['id_noticias'];
$categoria = $_GET['categoria'];
$sql = "DELETE FROM noticias WHERE noticias.id_noticias = '$id_noticias'"; 
mysqli_query($conexao, $sql) or die("Ocorreu um erro ao deletar a notícia!");

	if ($categoria == 0){
		echo"<script>alert('Excluída com sucesso!');
			window.location.replace('adm_noticias.php');
		</script>";
	}
	else if (($categoria == 1) || ($categoria == 2)) {
		
		echo"<script>alert('Excluído com sucesso!');
		window.location.replace('adm_videos.php');
		</script>";	

	}
mysqli_close($conexao);
?>