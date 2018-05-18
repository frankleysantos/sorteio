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

  $sql = $pdo->prepare("INSERT INTO premiacao (numsorte, cupom, id_concorrente, Cod_Ver_Nota, Insercao, atualizacao) VALUES (:numsorte, :cupom, :id_concorrente, :Cod_Ver_Nota, Now(), Now())");
  $sql->bindValue(":numsorte", $tmpnumsorte);
  $sql->bindValue(":cupom", $tmpcupom);
  $sql->bindValue(":id_concorrente", $id);
  $sql->bindValue(":Cod_Ver_Nota",$Cod_Ver_Nota);
  $sql->execute();
  header("Location: index.php?msn=0");   
      }
}
}

  if (empty($_SESSION['NOTA']['Cod_Ver_Nota'])) {
    require "sair.php";
}
?>
<script language="JavaScript" src="funcoes.js"></script>
<form action="" method="POST" role="form">
	<legend><i class="fa fa-plus-square"></i>&ensp;Cadastrando a Nota Fiscal</legend>

	<div class="form-group">
		<label><i class="fa fa-user"></i>&ensp;Nome</label>
		<input type="text" class="form-control" name="Nome" placeholder="Nome da Pessoa da Nota" required> 
		<label><i class="fa fa-file-text-o"></i>&ensp;CPF</label>
		<input type="text" class="form-control" name="CPF" placeholder="CPF - Somente Números" maxlength="12" minlength="11" onblur="return verificarCPF(this.value)" id="cpf" required>
		<label><i class="fa fa-file-text-o"></i>&ensp;Código Verificador</label>
		<input type="text" name="Cod_Ver_Nota" class="form-control" placeholder="Código Verificador" value="<?php echo $_SESSION['NOTA']['Cod_Ver_Nota']?>" readonly="readonly">
		<label><i class="fa fa-money"></i>&ensp;Valor da Nota</label>
		<input type="text" name="Valor_Nota" class="form-control" placeholder="Valor da Nota" required>
	</div>
<legend><i class="fa fa-plus-square-o"></i>&ensp;Cadastro Dados Cupom</legend>
<div class="row">
<div class="col-md-12">
        <input type="hidden" name="premiacaototal" id="premiacaototal" value="<?php if(empty($_SESSION['NOTA']['premiacaototal'])) echo 0; else echo $_SESSION['NOTA']['premiacaototal'] ?>" />
        <table class='table table-striped table-bordered table-hover' id="TabPremiacao">
         <tr><td colspan="6" align="center"><strong>Nº Sorte - Cupom</strong></td></tr>
         <tr>
          <td><i class="fa fa-list"></i>Numero da Sorte</td>
          <td><i class="fa fa-file-o"></i>Cupom</td>
          <td><strong></strong></td>
         </tr>
        </table>
</div>
</div>
<div class="row">
  <div class="col-md-6"><button class="btn btn-large btn-success fa fa-plus-square" onclick="adicionarLinha()" type="button">&ensp;Adicionar Cupom</button></div>
</div>
<br>
	<div class="row">
	<div class="col-md-6">
	<button type="submit" class="btn btn-primary fa fa-check-square-o">&ensp;Cadastrar</button>
	</div>
	<div class="col-md-6" align="right">
	<a href="sair.php" class="btn btn-danger"><i class="fa fa-sign-out"></i>&ensp;Sair</a>
	</div>
	</div>
</form>

<?php
require "rodape.php";
?>