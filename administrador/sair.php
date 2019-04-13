<?php
include '../conexao.php';

session_destroy();
echo "<script>alert('Desconectado com sucesso!');
		window.location.replace('../index.php');
		</script>";
?>