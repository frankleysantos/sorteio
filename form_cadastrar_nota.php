<?php
require "cabecalho.php";
require "functions.php";

if (isset($_POST['Nome']) && !empty($_POST['Nome'])) {
$Nome = $_POST['Nome'];
$CPF = $_POST['CPF'];
$Cod_Ver_Nota = $_POST['Cod_Ver_Nota'];

$Valor_Nota = $_POST['Valor_Nota'];
$Num_Sorte = $_POST['Num_Sorte'];
$Cupom = $_POST['Cupom'];

inserirNota($Nome, $CPF, $Cod_Ver_Nota, $Valor_Nota, $Num_Sorte, $Cupom);
}
  if (empty($_SESSION['NOTA']['Cod_Ver_Nota'])) {
    require "sair.php";
}
?>
<script language="JavaScript" src="funcoes.js"></script>
<form action="" method="POST" role="form">
	<legend>Cadastrando a Nota Fiscal</legend>

	<div class="form-group">
		<label for="Nome">Nome</label>
		<input type="text" class="form-control" name="Nome" placeholder="Nome da Pessoa da Nota">
		<label for="">CPF</label>
		<input type="text" class="form-control" name="CPF" placeholder="Nome da Pessoa da Nota" maxlength="11" minlength="11">
		<label form="Código Verificador">Código Verificador</label>
		<input type="text" name="Cod_Ver_Nota" class="form-control" placeholder="Código Verificador" value="<?php echo $_SESSION['NOTA']['Cod_Ver_Nota']?>">
		<label for="Valor da Nota">Valor da Nota</label>
		<input type="text" name="Valor_Nota" class="form-control" placeholder="Valor da Nota">
        <!--
        <div class="row">
		<div class="col-md-12">
        <input type="hidden" name="familiatotal" id="familiatotal" value="<?php if(empty($_SESSION['VINCULO']['familiatotal'])) echo 0; else echo $_SESSION['VINCULO']['familiatotal'] ?>" />
        <table class='table table-striped table-bordered table-hover' id="TabParentesco">
         <tr><td colspan="6" align="center"><strong>Inclusão de Cupom</strong></td></tr>
         <tr>
          <td><strong>Número da Sorte</strong></td>
          <td><strong>Cupom</strong></td>
         </tr>
        </table>
        <div><button class="btn btn-large btn-success" onclick="adicionarLinha()" type="button">Adicionar Novo Cupom</button></div>
       </div>
       </div>
       -->
       <div class="row">
       	<div class="col-md-6">
       		<label for="Número da Sorte">Número da Sorte</label>
       		<input type="text" name="Num_Sorte" class="form-control" placeholder="Números da Sorte">
       	</div>
       	<div class="col-md-6">
       		<label for="Cupom">Cupom</label>
       		<input type="text" name="Cupom" class="form-control" placeholder="Cupom">
       	</div>
       </div>
	</div>
	<div class="row">
	<div class="col-md-6">
	<button type="submit" class="btn btn-primary">Cadastrar</button>
	</div>
	<div class="col-md-6" align="right">
	<button type="button" class="btn btn-danger"><a href="sair.php">Sair</a></button>
	</div>
	</div>
</form>