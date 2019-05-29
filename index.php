<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<!--
Template Name: Algenius
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html lang="pt-br">
<head>
<title>PapoJovem!</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="icon" type="image/png" href="images/icons/favicon.png">
</head>
<body id="top">
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_right">
      <ul>
        <!--<li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>-->
        <li><i class="fa fa-envelope-o"></i> paulo.castro@ifsudestemg.edu.br</li>
      </ul>
    </div>
    <div class="fl_left">
      <ul>
        <li><a href="index.php"><i class="fa fa-lg fa-home"></i></a></li>
		<li><a href="sobre.php">Sobre</a></li>
		<li><a href="contato.php">Contato</a></li>
		<li><a href="administrador/login.php">Login</a></li>
      </ul>
    </div>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row11">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.php">PapoJovem!</a></h1><br>
    </div>
    <!--<div id="quickinfo" class="fl_right">
      <ul class="nospace inline">
        <li><strong>Aliquet:</strong><br>
          +00 (123) 456 7890</li>
        <li><strong>Efficitur:</strong><br>
          +00 (123) 456 7890</li>
      </ul>
    </div>-->
    <!-- ################################################################################################ --> 
  </header>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <nav id="mainav" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="clear">
      <li class="active"><a href="index.php">Início</a></li>
	  <li><a href="pages/gallery.php">Notícias</a></li>
      <!--<li><a class="drop" href="#">Pages</a>
        <ul>
          <li><a href="pages/gallery.html">Gallery</a></li>
          <li><a href="pages/full-width.html">Full Width</a></li>
          <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
          <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
          <li><a href="pages/basic-grid.html">Basic Grid</a></li>
        </ul>
      </li>-->
      <li><a class="drop" href="#">Vídeos</a>
        <ul>
          <li><a href="#">Vídeo-Aulas</a></li>
          <!--<li><a class="drop" href="#">Level 2 + Drop</a>
            <ul>
              <li><a href="#">Vídeo-Aulas</a></li>
              <li><a href="#">Level 3</a></li>
              <li><a href="#">Level 3</a></li>
            </ul>
          </li>
          <li><a href="#">Level 2</a></li>-->
        </ul>
      </li>
      <li><a class="drop" href="#">Arquivos</a>
        <ul>
          <li><a href="#">Livros</a></li>
          <li><a href="#">Artigos</a></li>
        </ul>
      </li>
      <li><a href="#">Perguntas Anônimas</a></li>
	  <li><a href="#">Enquetes</a></li>
	  <li><a href="#">Caixa de Dúvidas</a></li>
    <!--<li><a href="#">Long Link Text</a></li>-->
    </ul>
    <!-- ################################################################################################ --> 
  </nav>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<!--<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/01.png');">
  <article id="pageintro" class="hoc clear"> -->
    <!-- ################################################################################################ -->
    <!--<h3 class="heading">Eget euismod sagittis nunc sed vehicula</h3>
    <p>Elit in tempor arcu vitae leo sollicitudin luctus odio porttitor donec velit ante dictum quis justo.</p>
    <footer><a class="btn" href="#">Tellus et egestas</a></footer> -->
    <!-- ################################################################################################ --> 
  <!--</article>
</div>-->
<center><div id="tablenot">
  
  <?php
        //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
      
        //seleciona todos os itens da tabela 
        $cmd = "SELECT * FROM noticias WHERE categoria=0"; 
        $produtos = mysqli_query($conexao,$cmd); 
        //conta o total de itens 
        $total = mysqli_num_rows($produtos); 
        //seta a quantidade de itens por página, neste caso, 2 itens 
        $registros = 12; 
        //calcula o número de páginas arredondando o resultado para cima 
        $numPaginas = ceil($total/$registros); 
        //variavel para calcular o início da visualização com base na página atual 
        $inicio = ($registros*$pagina)-$registros; 
        //seleciona os itens por página 
        $cmd = "SELECT * FROM noticias WHERE categoria=0 ORDER BY id_noticias DESC LIMIT $inicio,$registros"; 
        $resultado = mysqli_query($conexao, $cmd); 
        $linhas = mysqli_num_rows($resultado); 
			echo'<style type="text/css">
				table {
					border: 1px solid grey;
					display:inline-block;
					margin: 10px;
					background: #f4f5f2;
					width: 380px;
					height: 500px;
					float: center;
					text-align: center;
				}
				table h2, h3{
					font-style: italic;
				}	
				table h4, h5 {
					color: #545454;
				}
				table a:hover {
					background: #1d1d20;
					border: 5px solid grey;
				}
			  </style>';
			while($linhas = mysqli_fetch_array($resultado)){
				
				if($linhas['categoria']==0){
					$linhas['data'] = implode("/",array_reverse(explode("-",$linhas['data'])));
					echo '<a href="redirecionar.php?id_noticias='.$linhas['id_noticias'].'"><table><tr><td>
					<img src="imagens_de_noticias/'.$linhas['imagem'].'" width="370" height="230"><br>';
					if (strlen($linhas['titulo']) > 90){
						echo '<font color=black><h3><b>'.$linhas['titulo'].'</b></h3>';
					}
					else {
						echo '<font color=black><h2><b>'.$linhas['titulo'].'</b></h2>';
					}	
					echo '<h4><img src="images/clock.png" width="20" height="20"> <b>Postada em: '.$linhas['data'].'</h4></b>';
					
					if ($linhas['visualizacoes'] == 0){
						echo '<h5><img src="images/view.png" width="20" height="20" font color="#545454"> <b><u>Nenhuma visualização</u></b></h5>';
					}
					else if ($linhas['visualizacoes'] == 1){
						echo '<h5><img src="images/view.png" width="20" height="20"> <b><u>'.$linhas['visualizacoes'].' visualização</u></b></h5>';
					}
					else echo '<h5><img src="images/view.png" width="20" height="20"> <b><u>'.$linhas['visualizacoes'].' visualizações</u></b></h5>';
					echo '</td></tr></table></a>';
				}
			}
            echo '<br><br>';
            //exibe a paginação
            $anterior = ($pagina - 1);
            if ($pagina > 1){
                echo "  <a href=\"?pagina=$anterior\">|Anterior</a>";
            }
            for($i = 1; $i < $numPaginas + 1; $i++) { 
            echo "<a href='?pagina=$i'>|".$i."|</a>"; 
            }
            if ($pagina < $numPaginas){
                $proxima = ($pagina + 1);
                echo "<a href=\"?pagina=$proxima\">Próxima|</a>";
            }
            
			
			mysqli_close($conexao);
			?>
      
  </div>    

  <br><br><br>
<!-- ################################################################################################ --> 
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_quarter first">
      <h6 class="heading">Sobre o site</h6>
      <p>Desenvolvido como "produto final" para o PROFept (Programa de Pós-Graduação em Educação Profissional e Tecnológica).</p>
      <p>Tem como objetivo disseminar informações sobre sexualidade e adolescência aos estudantes do Instituto Federal de Rio Pomba, de forma a reduzir e previnir os casos de gravidez na juventude e DST's.</p>
    </div>
    <div class="one_quarter">
      <center><h6 class="heading">Links Úteis</h6>
      <nav>
        <ul class="nospace">
          <li><a href="index.php"><i class="fa fa-lg fa-home"></i></a></li>
          <li><a href="sobre.php">Sobre</a></li>
          <li><a href="contato.php">Contato</a></li>
        </ul>
      </nav>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Desenvolvido por:</h6>
      <article>
        <h2 class="nospace font-x1"><a href="https://sistemas.riopomba.ifsudestemg.edu.br/lamif/">Laboratório de Multimídia Interativa - LAMIF</a></h2>
        <time class="font-xs" datetime="2045-04-06">Junho 2018</time>
        <p>O LAMIF é um Laboratório de Multimídia Interativa, que trabalha na convergência entre arte, tecnologia e design, para desenvolver projetos cenográficos e multimídia nas áreas de cultura, educação, reabilitação, entretenimento e propaganda. [&hellip;]</p>
      </article>
    </div>
    <div class="one_quarter">
      <center><h6 class="heading">Total de acessos:</h6>
      <ul class="nospace linklist">
        <li><center><img src="https://counter6.wheredoyoucomefrom.ovh/private/webcontadores.php?c=91jksldsl5rb2646ybdf1a282x1jyuwg" border="0"></a></li>
      <ul>
    </div>
    <!-- ################################################################################################ --> 
  </footer>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">PapoJovem!</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a> 
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>