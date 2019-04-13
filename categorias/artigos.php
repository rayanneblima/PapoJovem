<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Artigos e E-books | Papo Jovem!</title>
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
							<li><a class="nav" href="videos.php">Vídeos</a></li>
							<li><a class="nav" href="videoaula.php">Vídeo-Aula</a></li>
							<li><a class="nav linkAtivo" href="artigos.php">Livros e Artigos</a></li>
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
	
	
	<article><center>
		<?php
		include '../conexao.php';
		echo "<h1><center>Materiais para download: </h1>";
		$resultado2 = mysqli_query($conexao, "SELECT * FROM artigos ORDER BY id_artigos DESC");
		$linhas2 = mysqli_num_rows($resultado2); 
		echo'<style type="text/css">
				table {
					border: 1px solid black;
					display:inline-block;
					margin: 10px;
					background: #dcdcdc;
					width: 350px;
					height: 150px;
					float: center;
					text-align: center;
				}
				table h2 {
					font-style: italic;
					
				}		
			  </style>';

		while($linhas2 = mysqli_fetch_array($resultado2)){

				echo '<table>
				<tr><td><h2><b><u>'.$linhas2['titulo'].'</u></b></h2></td></tr>
				<tr><td><b><a href=..\artigos/'.$linhas2['arquivo'].' target="_blank">'.$linhas2['arquivo'].'</a></b></td></tr>	
				</table>';
			
		}
		mysqli_close($conexao);
	?>
	<br><br></center></article>
	
	<div class="footer">
		<div class="linha">
			<footer>
				<div class="coluna col12">
					<span>© 2018 PAPO JOVEM!  <br /> 
					Desenvolvido por: Laboratório de Multimídia Interativa - LAMIF, IFSEMG Campus Rio Pomba</span>
				</div>
			</footer>
		</div>
	</div>	
	
</body>
</html>	