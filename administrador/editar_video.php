<?php
//Fazendo conexão com o banco.
include '../conexao.php';

$id_noticias = $_GET["id_noticias"];
$categoria = $_GET["categoria"];

// Executa uma consulta 
$sql = "SELECT * FROM noticias WHERE id_noticias=$id_noticias";
$conexao = $conexao->query($sql);
while ($dados = $conexao->fetch_assoc()){
	$titulo=$dados["titulo"];
	$link=$dados["link"];
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Editar Vídeo | Papo Jovem!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method ="POST" action="salvar_editvideo.php" enctype="multipart/form-data">
				<span class="login100-form-title p-b-51">
						Editar vídeo:
					</span>
					
				<div>
					<input type="hidden" required name="id_noticias" value="<?php echo $id_noticias;?>">
					<input type="hidden" required name="categoria" value="<?php echo $categoria;?>">
				</div>
					
				<div class="wrap-input100 validate-input m-b-16" data-validate = "Título obrigatório.">
						<input class="input100" type="text" name="titulo" placeholder="título" id="titulo" value="<?php echo $titulo;?>"/>
						<span class="focus-input100"></span>
				</div>
				
				
				<div class="wrap-input100 validate-input m-b-16" data-validate = "Incorpore o vídeo.">
						<textarea class="input100" type="text" name="link" placeholder="iframe" id="link"/><?php echo $link;?></textarea>
						<span class="focus-input100"></span>
				</div>
				
			
				<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" onClick="return confirm('Deseja atualizar o registro?');" type="submit" name="Submit" value="Salvar alterações" id="button-form" >
							editar
						</button>
				</div>
				
				</form>
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
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
	<script src="../js/main.js"></script>

</body>
</html>