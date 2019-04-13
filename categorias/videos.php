<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Vídeos | Papo Jovem!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/normalize.css" rel="stylesheet">
	<link href="../css/index.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
</head>
<body>
	<div class="header">
		<!--INÍCIO da Barra Inicial-->
		<div class="barra1">
			<div class="linhax">
				<div class="colunax col1x">
					<nav>
						<ul class="barra inline sem-marcador">
							<li><a class="nav" href="../index.php">Início</a></li>
							<li><a class="nav" href="../sobre.php">Sobre</a></li>
							<li><a class="nav" href="../contato.php">Contato</a></li>
							<li><a class="nav" href="../administrador/login.php">Área Administrativa</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!--FIM da Barra Inicial-->
		<!--INÍCIO do Cabeçalho-->
		<div class="cabecalho">
			<div class="linhax">
				<header>
					<div class="colunax col1x">
						<h1 class="logo">Papo Jovem!</h1>
						<h3 class="logo">Sexualidade, DST/AIDS e adolescência:</h3>
						<h3><b><u>vamos conversar?!</u></b></h3>
					</div>
				</header>
			</div>
		</div>
		<!--FIM do Cabeçalho-->
		<!--INÍCIO do Menu-->
		<div class="menu1">
			<div class="linhax">
				<div class="colunax col1x">
					<nav>
						<ul class="menu inline sem-marcador">
							<li><a class="nav" href="noticias.php">Notícias</a></li>
							<li><a class="nav linkAtivo" href="videos.php">Vídeos</a></li>
							<li><a class="nav" href="videoaula.php">Vídeo-Aula</a></li>
							<li><a class="nav" href="artigos.php">Livros e Artigos</a></li>
							<li><a class="nav" href="pergunta.php">Perguntas</a></li>
							<li><a class="nav" href="enquete.php">Enquete</a></li>
							<li><a class="nav" href="categorias/cxduvidas.php">Caixa de Dúvidas</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!--FIM do Menu-->
		<!--FIM da class HEADER-->
	</div>
	
	<!--INÍCIO do Conteúdo da Direita-->
	<article><br><br><center>
		<?php
			include '../conexao.php';
			
			$resultado = mysqli_query($conexao, "SELECT * FROM noticias WHERE categoria=1 ORDER BY id_noticias DESC");
			$linhas = mysqli_num_rows($resultado); 
			echo'<style type="text/css">
				table {
					border: 1px solid black;
					display:inline-block;
					margin: 10px;
					background: #dcdcdc;
					width: 565px;
					height: 550px;
					float: center;
					text-align: center;
				}
				table h2 {
					font-style: italic;
					
				}	
				table h4, h5 {
					color: #545454;
				}	
			  </style>';

			while($linhas = mysqli_fetch_array($resultado)){
				 $linhas['data'] = implode("/",array_reverse(explode("-",$linhas['data'])));

				echo '<center><table>
				<tr><td><h1><b><u>'.$linhas['titulo'].'</u></b></h1></td></tr>
				<tr><td>'.$linhas['link'].'</b></td></tr>
				<tr><td><h4><img src="../images/clock.png" width="20" height="20"> <b>Postado em: '.$linhas['data'].'</b></h4></td></tr>
				<tr><td>
				
				</td></tr>
				</table></center>';

			}

			mysqli_close($conexao);

			?>
	
	<br><br></center></article>
	
	<div class="footer">
		<div class="linha">
			<footer>
				<div class="coluna col12">
					<span>© 2018 PAPO JOVEM! <br /> 
					Desenvolvido por: Laboratório de Multimídia Interativa - LAMIF, IFSEMG Campus Rio Pomba</span>
				</div>
			</footer>
		</div>
	</div>	
	
	<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/readmore.js"></script>
	
</body>
</html>	