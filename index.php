<?php include 'conexao.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Papo Jovem!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/normalize.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
</head>
<body>
	<div class="header">
		<!--INÍCIO da Barra Inicial-->
		<div class="barra1">
			<div class="linhax">
				<div class="colunax col1x">
					<nav>
						<ul class="barra inline sem-marcador">
							<li><a class="nav linkAtivo" href="index.php">Início</a></li>
							<li><a class="nav" href="sobre.php">Sobre</a></li>
							<li><a class="nav" href="contato.php">Contato</a></li>
							<li><a class="nav" href="administrador/login.php">Área Administrativa</a></li>
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
                        <div align="right"><img src="https://contador.s12.com.br/img-7Z5bd3Z1zZWzcZ6A-6.gif" border="0" alt="contador de visitas"><script type="text/javascript" src="https://contador.s12.com.br/ad.js?id=7Z5bd3Z1zZWzcZ6A"></script><style>#parceiroafiliado { font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#999999;} #parceiroafiliado a:link {color:#999999; text-decoration:none; } #parceiroafiliado a:hover {color:#999999; text-decoration:none; } #parceiroafiliado a:visited {color:#999999; text-decoration:none; }</style></div>
					</div>
				</header>
			</div>
		</div>
		<!--FIM do Cabeçalho-->
		<!--INÍCIO do Menu-->
			<div class="menu1">
			<div class="linhax">
				<div class="colunax col1x">
					
					<ul class="menu inline sem-marcador">
						<li><a class="nav" href="categorias/noticias.php">Notícias</a></li>
						<li><a class="nav" href="categorias/videos.php">Vídeos</a></li>
						<li><a class="nav" href="categorias/videoaula.php">Vídeo-Aula</a></li>
						<li><a class="nav" href="categorias/artigos.php">Livros e Artigos</a></li>
						<li><a class="nav" href="categorias/pergunta.php">Perguntas</a></li>
						<li><a class="nav" href="categorias/enquete.php">Enquete</a></li>
						<li><a class="nav" href="categorias/cxduvidas.php">Caixa de Dúvidas</a></li>
					</ul>
					
				</div>
			</div>
		</div>
		<!--FIM do Menu-->
		<!--FIM da class HEADER-->
	</div>

	<article><center>
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
	<br><br></center>
	</article>
	<br><br>
	<div class="footer">
		<div class="linha">
			<footer>
				<div class="coluna col12">
					<span>© 2018 PAPO JOVEM! <br> 
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

	</body></html>
