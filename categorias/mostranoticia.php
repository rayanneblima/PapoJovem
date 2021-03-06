<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title> Notícias | Papo Jovem!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/normalize.css" rel="stylesheet">
	<link href="../css/index.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="../images/icons/favicon.png"/><!-- You can use open graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
  <meta property="og:url"           content="https://papojovem.net" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Notícias - PapoJovem!" />
</head>
<body>

  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
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
							<li><a class="nav linkAtivo" href="noticias.php">Notícias</a></li>
							<li><a class="nav" href="videos.php">Vídeos</a></li>
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
	
	<article><center>
		<?php
			include '../conexao.php';
			$id_noticias = $_GET['id_noticias'];
			$linkatual = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			$resultado = mysqli_query($conexao, "SELECT * FROM noticias WHERE id_noticias = '$id_noticias'");
      		

			while($linhas = mysqli_fetch_array($resultado)){
            $linhas['data'] = implode("/",array_reverse(explode("-",$linhas['data'])));  
				
				echo '<center><table width="450px" height="500px">
				<tr><td><h1><b><u>'.$linhas['titulo'].'</u></b></h1></td></tr>
				<tr><td><img width=450px height=250px src="../imagens_de_noticias/'.$linhas['imagem'].'"></a><br></td></tr>
				<tr><td><b>FONTE: <a href='.$linhas['link'].' target=“_blank”>'.$linhas['link'].'</a></b></td><td>
				<tr><td>
				
				<div class="box-toggle" style="cursor: pointer;">
				'.$linhas['noticia'].'
				</div></div>
				
				
				</td></tr>
				<tr><td><b>Postada em: '.$linhas['data'].' </b></td></tr>
				<tr><td>
					
				<div class="fb-like" data-href='.$linkatual.' data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
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
					<span>© 2018 PAPO JOVEM!  <br /> 
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