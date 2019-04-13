<?php

include('../conexao.php');

$id_noticias = $_POST['id_noticias'];
$titulo = $_POST['titulo'];
$categoria = $_POST['categoria'];
$link = $_POST['link'];

$sql = "UPDATE noticias SET titulo='$titulo', categoria='$categoria', link='$link' WHERE noticias.id_noticias = '$id_noticias'"; 

mysqli_query($conexao, $sql) or die("Ocorreu um erro ao atualizar o vídeo!");
mysqli_close($conexao);

echo"<script>alert('Salvo com sucesso!');
	window.location.replace('adm_videos.php');
	</script>";

?>