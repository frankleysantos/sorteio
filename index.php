<?php 
session_start();
require "cabecalho.php";
require "config.php";
$login = $_SESSION['id'];
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
	$alterado = $_GET['msn'];
	if (!empty($alterado)) {
		echo "<label class='form-control btn btn-info'>".$alterado."</label>";
		# code...
	}
?>
<div class="row"><br>
<div class="col-md-12" align="right">
<button type="button" class="btn btn-danger"><a href="sair.php">Sair</a></button>
</div>
</div>
<form action="buscar_nota.php" method="POST" role="form">
	<legend>Bem Vindo a tela de consulta da Nota Fiscal.</legend>

	<div class="form-group">
		<label for="">Código de Verificação da Nota</label>
		<input type="text" class="form-control" name="Cod_Ver_Nota" placeholder="Inserir Código Verificação">
	</div>
	<button type="submit" class="btn btn-primary">Buscar</button>
</form>
<?php    
}
else{
    header("Location: login.php");
}
require "rodape.php";
?>
