<?php

include('../conexao.php');

$id_noticias = $_POST['id_noticias'];
$titulo = $_POST['titulo'];
$noticia = $_POST['noticia'];
$link = $_POST['link'];

if(!$_FILES['nv_imagem']['size'] == 0){										//se tiver imagem
    $ext = strtolower(substr($_FILES['nv_imagem']['name'], -4)); 		//pega a extensao do arquivo (buga com JPEG)
    $new_name= md5(time()) . $ext; 									//define o nome do arquivo
    $dir = "../imagens_de_noticias/"; 									//define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['nv_imagem']['tmp_name'], $dir.$new_name); //efetua o upload


    $sql = "UPDATE noticias SET titulo='$titulo', noticia='$noticia', link='$link',imagem='$new_name' WHERE noticias.id_noticias = '$id_noticias'"; 



} else {																	//se não tiver imagem, faz o UPDATE sem a variavel imagem
    $sql = "UPDATE noticias SET titulo='$titulo', noticia='$noticia', link='$link' WHERE noticias.id_noticias = '$id_noticias'"; 
}

mysqli_query($conexao, $sql) or die("Ocorreu um erro ao atualizar a notícia!");
mysqli_close($conexao);

echo"<script>alert('Salvo com sucesso!');
	window.location.replace('adm_noticias.php');
	</script>";

?>