<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Administrar Enquetes | Papo Jovem!</title>
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
							<li><a class="nav" href="index.php">Voltar</a></li>
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


<?php
//Fazendo conexão com o banco.
include '../conexao.php';

echo "<h1>ENQUETES: </h1>";
	$resultado = mysqli_query($conexao, "SELECT * FROM enquete ORDER BY id_enquete DESC");
	$linhas = mysqli_num_rows($resultado); 
	echo'<style type="text/css">
				table {
					border: 0px solid black;
					display:inline-block;
					margin: 10px;
					text-align: center;
					width: 500px;
					height: 200px;
					float: center;
					margin-left: 40px;
				}
				table b{
					color: blue;
				}	
	</style>';

	while($linhas = mysqli_fetch_array($resultado)){
		
		echo '<table border="1">
		<tr><td><h1><b><u>'.$linhas['pergunta'].'</u></b></h1></td></tr>	
		<tr><td colspan="2"><center><a href="editar_enquete.php?id_enquete='.$linhas['id_enquete'].'"><img width="40px" height="40px" src="../images/edit.png"/</a><a href="excluir_enquete.php?id_enquete='.$linhas['id_enquete'].'"><img width="40px" height="40px" src="../images/x.png"/</a></center></td></tr>
		</table>';
	
	}			

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