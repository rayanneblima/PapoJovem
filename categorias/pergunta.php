<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Perguntas Anônimas | Papo Jovem!</title>
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
							<li><a class="nav" href="artigos.php">Livros e Artigos</a></li>
							<li><a class="nav linkAtivo" href="pergunta.php">Perguntas</a></li>
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
	
	
	<article><br><br><center>
		<?php
		//Fazendo conexão com o banco.
		include '../conexao.php';

		$resultado = mysqli_query($conexao, "SELECT * FROM perguntas ORDER BY id_perguntas DESC");
		$linhas = mysqli_num_rows($resultado);

			echo'<style type="text/css">
				table h3{
					color: red;
				}
				table tr{
					height: 100px;	
				}
			</style>';		
			
			echo '<center><table border="1" class="tabela">
				<tr><td><h3><b><u>PERGUNTAS</u></b></h3> </td><td><h3><b><u> RESPOSTAS</u></b></h3></td></tr>';
		while($linhas = mysqli_fetch_array($resultado)){


			if($linhas['resp'] <> ''){
				
                $perg= htmlspecialchars($linhas['perg']);

				echo '<tr><td> '.$perg.' </td><td> '.$linhas['resp'].'</td></tr>';
				
			}
		}
		echo '</table></center>
				<a href="fazerpergunta.php" class="botao">Fazer uma pergunta anônima &raquo;</a>';

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
	
</body>
</html>	