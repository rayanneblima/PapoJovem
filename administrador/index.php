<?php

include '../conexao.php';
//Não permite entrar na página sem estar logado
if (!isset($_SESSION['conectado'])) header('Location: login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Página de Administração | Papo Jovem!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
							<li><a class="nav linkAtivo" href="../index.php">Início</a></li>
							<li><a href="sair.php">Sair</a></li>
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
						<h1 class="logo">Papo Jovem! - Administração</h1>
						<h3 class="logo">Aqui você pode excluir, cadastrar </br> ou editar uma notícia.</h3>
					</div>
				</header>
			</div>
		</div>
		<!--FIM do Cabeçalho-->
		<center>
		<br><br>
			<!--Open The PopUp -->
			
			<button id="myBtn"><img width="70px" height="70px" src="../images/add.png"/></button>
			<!--The PopUp-->
			<div id="myModal" class="modal">
			  <!--The PopUp Content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <span class="close">&times;</span>
				  <h2>Escolha o que deseja cadastrar: </h2>
				</div>
				<div class="modal-body">
					<br>
					<form method ="POST" action="redirecionar_popup.php" enctype="multipart/form-data">
					<input type="radio" id="categoria" name="categoria" value="noticia">
						<label for="noticia">Notícia</label><br>
					<input type="radio" id="categoria" name="categoria" value="artigos">
						<label for="artigos">Artigos e E-books</label><br>
					<input type="radio" id="categoria" name="categoria" value="enquetes">
						<label for="enquetes">Enquetes</label><br>
					<input type="radio" id="categoria" name="categoria" value="videos">
						<label for="videos">Vídeos</label><br>
					<input type="radio" id="categoria" name="categoria" value="video-aula">
						<label for="video-aula">Vídeo-Aula</label><br><br>
							
					<button type="Submit">OK</button>
					
				</div>
			  </div>

			</div>
			
			<a href="adm_noticias.php"><img width="70px" height="70px" src="../images/newspaper.png"/></a>
			<a href="adm_videos.php"><img width="70px" height="70px" src="../images/video-player.png"/></a>
			<a href="adm_artigos.php"><img width="70px" height="70px" src="../images/folder.png"/></a>
			<a href="adm_enquetes.php"><img width="70px" height="70px" src="../images/questions.png"/></a>
		</div>
		<br>
<?php
//Fazendo conexão com o banco.
include '../conexao.php';

$resultado4 = mysqli_query($conexao, "SELECT * FROM perguntas ORDER BY id_perguntas");
$linhas4 = mysqli_num_rows($resultado4);

			echo'<style type="text/css">
				table h3{
					color: red;
				}
			</style>';		
			
			echo '<center><table border="1" class="tabela">
				<tr><td><h3><b><u>PERGUNTAS</u></b></h3> </td><td><h3><b><u> RESPOSTAS</u></b></h3></td></tr>';
		while($linhas4 = mysqli_fetch_array($resultado4)){

            $perg= htmlspecialchars($linhas4['perg']);

            if($perg!=""){
                echo '<tr><td>'.$linhas4['id_perguntas'].') '.$perg.'</td><td> '.$linhas4['resp'].'</td></tr>
				<tr><td colspan="2"><center><a href="responderpergunta.php?id_perguntas='.$linhas4['id_perguntas'].'"><img width="40px" height="40px"   src="../images/edit.png"/</a><a href="excluir_pergunta.php?id_perguntas='.$linhas4['id_perguntas'].'"><img width="40px" height="40px" src="../images/x.png"/</a></center></td></tr>';
            }				
		}
		echo '</table></center>';			
		


mysqli_close($conexao);

?>
	<br><br></center>
	
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
<!--===============================================================================================-->
	<script src="../js/popup.js"></script>

</body>
</html>	