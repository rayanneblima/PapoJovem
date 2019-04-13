<?php
//Fazendo conexão com o banco.
include '../conexao.php';
date_default_timezone_set('America/Sao_Paulo');
//Recebendo os dados da tela de cadastro.
$titulo=$_POST['titulo'];
$noticia=$_POST['noticia'];
$link=$_POST['link'];
$categoria=0;
$data = date('Y-m-d');



//Salva a imagem em "imagens_de_noticias" com o nome próprio da imagem.
if(isset($_FILES['imagem']))
   {
 
      $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
      $new_name = md5(uniqid(time())) . "." . $ext; //Definindo um novo nome (numero random) para o arquivo
      $dir = '../imagens_de_noticias/'; //Diretório para uploads
      move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
   }


//Insere todas as informações obtidas no banco de dados, incluindo a URL da imagem enviada
$sql = "INSERT INTO noticias(titulo, noticia, link, imagem, categoria, data, id_noticias)
VALUES ('$titulo','$noticia','$link','$new_name', '$categoria', '$data', NULL)"; 

//Erro de SQL
mysqli_query($conexao, $sql) or die("Ocorreu um erro ao cadastrar a notícia! Tente novamente.");
mysqli_close($conexao);

echo"<script>alert('Cadastrada com sucesso!');
	window.location.replace('adm_noticias.php');
	</script>";

?>

