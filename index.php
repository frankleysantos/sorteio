<?php 
session_start();
require "cabecalho.php";
require "config.php";
$login = $_SESSION['id'];
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
?>
<div class="row">
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

?>
