<?php
require "cabecalho.php";
require "functions.php";
require "config.php";

if (isset($_POST['Nome']) && !empty($_POST['Nome'])) {
$Nome = $_POST['Nome'];
$CPF = $_POST['CPF'];
$Cod_Ver_Nota = $_POST['Cod_Ver_Nota'];
$Valor_Nota = $_POST['Valor_Nota'];


$sql = $pdo->prepare("INSERT INTO concorrentes (Nome, CPF, Cod_Ver_Nota, Valor_Nota, Insercao) 
        VALUES (:Nome, :CPF, :Cod_Ver_Nota, :Valor_Nota, Now())");
$sql->bindValue(":Nome", $Nome);
$sql->bindValue(":CPF", $CPF);
$sql->bindValue(":Cod_Ver_Nota", $Cod_Ver_Nota);
$sql->bindValue(":Valor_Nota", $Valor_Nota);
$sql->execute();
}
$id = $pdo->lastInsertId();
if (!empty($_POST['premiacaototal'])) {
$premiacaototal = $_POST['premiacaototal'];

if($premiacaototal>0){
      for ($i=0;$i<$premiacaototal;$i++){
        $tmpnumsorte = $_POST['numsorte'.$i];
        $tmpcupom = $_POST['cupom'.$i];

  $sql = $pdo->prepare("INSERT INTO parentesco (numsorte, cupom, id_concorrente) VALUES (:numsorte, :cupom, :id_concorrente)");
  $sql->bindValue(":numsorte", $tmpnumsorte);
  $sql->bindValue(":cupom", $tmpcupom);
  $sql->bindValue(":id_concorrente", $id);
  $sql->execute();
  header("Location: index.php");   
      }
}
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
	</div>
<legend>Form title</legend>
<div class="col-md-12">
        <input type="hidden" name="premiacaototal" id="premiacaototal" value="<?php if(empty($_SESSION['NOTA']['premiacaototal'])) echo 0; else echo $_SESSION['NOTA']['premiacaototal'] ?>" />
        <table class='table table-striped table-bordered table-hover' id="TabPremiacao">
         <tr><td colspan="6" align="center"><strong>Composição Familiar</strong></td></tr>
         <tr>
          <td><strong>Numero da Sorte</strong></td>
          <td><strong>Cupom</strong></td>
          <td><strong></strong></td>
         </tr>
        </table>
        <div><button class="btn btn-large btn-success" onclick="adicionarLinha()" type="button">Adicionar Membros</button></div>
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