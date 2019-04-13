<?php

ob_start();
//pega as variaveis por POST
$categoria = $_POST['categoria'];

switch($_POST['categoria']) {

    case 'noticia':
             header ('Location: cadastro_noticias.php');
    break;

    case 'videos':
             header ('Location: cadastro_videos.php');
    break;
	
	case 'video-aula':
             header ('Location: cadastro_videoaula.php');
    break;

    case 'enquetes':
             header ('Location: cadastro_enquete.php');
    break;
	
	case 'artigos':
             header ('Location: cadastro_artigos.php');
    break;
}
?>