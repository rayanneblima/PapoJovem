<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Enquetes | Papo Jovem!</title>
	<meta charset="UTF-8">
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
							<li><a class="nav" href="artigos.php">Materiais</a></li>
							<li><a class="nav" href="pergunta.php">Perguntas</a></li>
							<li><a class="nav linkAtivo" href="enquete.php">Enquete</a></li>
							<li><a class="nav" href="cxduvidas.php">Caixa de Dúvidas</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!--FIM do Menu-->
		<!--FIM da class HEADER-->
	</div>
	<article>
		<center>
	<?php
	//Fazendo conexão com o banco.
	include '../conexao.php';

	$resultado = mysqli_query($conexao, "SELECT * FROM enquete ORDER BY id_enquete DESC");
	$linhas = mysqli_num_rows($resultado); 
	echo'<style type="text/css">
				table {
					border: 1px solid grey;
					display:inline-block;
					margin: 10px;
					background: #f4f5f2;
					text-align: center;
					width: 450px;
					height: 350px;
					float: center;
					margin-left: 40px;
				}
				table b{
					color: blue;
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
		
		if(($linhas['c'] == '') && ($linhas['total'] == 0)){
			echo '<table><tr><td><h1><i>'.$linhas['pergunta'].'</i></h1>
			<form method="post" action="../gravaresposta.php?id_enquete='.$linhas['id_enquete'].'">
				<input type="radio" name="radio" id="question-1-answers-A" value="A"/> A)'.$linhas['a'].' || <b> 0% </b> || <b> Nenhum voto </b> <br><br>
				<input type="radio" name="radio" id="question-1-answers-B" value="B"/> B)'.$linhas['b'].' || <b> 0% </b> || <b> Nenhum voto </b> <br><br>
				<input type="submit" value="VOTAR" />
			</form></td></tr></table>';	
		}	
		
		else if(($linhas['c'] == '') && ($linhas['total'] > 0)){
			$pA = round(($linhas['votosA']/$linhas['total'])*100);
			$pB = round(($linhas['votosB']/$linhas['total'])*100);
			
			echo '<table><tr><td><h1><i>'.$linhas['pergunta'].'</i></h1>
			
			<form method="post" action="../gravaresposta.php?id_enquete='.$linhas['id_enquete'].'">
				<input type="radio" name="radio" id="question-1-answers-A" value="A"/> A)'.$linhas['a'].' || <b>'.$pA.'% </b> || <b> '.$linhas['votosA'].' votos </b> <br><br>
				<input type="radio" name="radio" id="question-1-answers-B" value="B"/> B)'.$linhas['b'].' || <b>'.$pB.'% </b> || <b> '.$linhas['votosB'].' votos </b> <br><br>
				<input type="submit" value="VOTAR" />
			</form></td></tr></table>';	
		}
		
		else if($linhas['total'] > 0){
			$pA = round(($linhas['votosA']/$linhas['total'])*100);
			$pB = round(($linhas['votosB']/$linhas['total'])*100);
			$pC = round(($linhas['votosC']/$linhas['total'])*100);
			$pD = round(($linhas['votosD']/$linhas['total'])*100);
			
			echo '<table><tr><td><h1><i>'.$linhas['pergunta'].'</i></h1>
			
			<form method="post" action="../gravaresposta.php?id_enquete='.$linhas['id_enquete'].'">
				<input type="radio" name="radio" id="question-1-answers-A" value="A"/> A)'.$linhas['a'].' || <b>'.$pA.'% </b> || <b> '.$linhas['votosA'].' votos </b> <br><br>
				<input type="radio" name="radio" id="question-1-answers-B" value="B"/> B)'.$linhas['b'].' || <b>'.$pB.'% </b> || <b> '.$linhas['votosB'].' votos </b> <br><br>
				<input type="radio" name="radio" id="question-1-answers-C" value="C"/> C)'.$linhas['c'].' || <b>'.$pC.'% </b> || <b> '.$linhas['votosC'].' votos </b> <br><br>
				<input type="radio" name="radio" id="question-1-answers-D" value="D"/> D)'.$linhas['d'].' || <b>'.$pD.'% </b> || <b> '.$linhas['votosD'].' votos </b> <br><br>
				<input type="submit" value="VOTAR" />
			</form></td></tr></table>';	
		}
		
		else if($linhas['total'] == 0){
			echo '<table><tr><td><h1><i>'.$linhas['pergunta'].'</i></h1>
		
			<form method="post" action="../gravaresposta.php?id_enquete='.$linhas['id_enquete'].'">
				<input type="radio" name="radio" id="question-1-answers-A" value="A"/> A)'.$linhas['a'].' || <b>0% </b> || <b> Nenhum voto </b> <br><br>
				<input type="radio" name="radio" id="question-1-answers-B" value="B"/> B)'.$linhas['b'].' || <b>0% </b> || <b> Nenhum voto </b> <br><br>
				<input type="radio" name="radio" id="question-1-answers-C" value="C"/> C)'.$linhas['c'].' || <b>0% </b> || <b> Nenhum voto </b> <br><br>
				<input type="radio" name="radio" id="question-1-answers-D" value="D"/> D)'.$linhas['d'].' || <b>0% </b> || <b> Nenhum voto </b> <br><br>
				<input type="submit" value="VOTAR" />
			</form></td></tr></table>';	
		}
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
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/readmore.js"></script>

</body>
</html>	