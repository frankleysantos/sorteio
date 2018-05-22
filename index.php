<script type="text/javaScript">
function Trim(str){
	return str.replace(/^\s+|\s+$/g,"");
}
</script>
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
<form action="buscar_nota.php" method="POST" role="form">
	<legend>Bem Vindo a tela de consulta da Nota Fiscal.</legend>

	<div class="form-group">
		<label class="fa fa-list">&ensp;Código de Verificação da Nota</label>
		<input type="text" class="form-control" name="Cod_Ver_Nota" placeholder="Inserir Código Verificação" onkeyup="this.value = Trim( this.value ); maiuscula(this)">
	</div>
	<button type="submit" class="btn btn-primary fa fa-search">&ensp;Buscar</button>
</form>
<?php    
}
else{
    header("Location: login.php");
}
require "rodape.php";
?>
