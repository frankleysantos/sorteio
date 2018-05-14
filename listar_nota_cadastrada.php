<?php
require "cabecalho.php";
require "functions.php";
require "config.php";

    $id = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM concorrentes WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql ->execute();

    if ($sql -> rowCount() > 0) {
        # code...
        $sql = $sql ->fetch();
?>
<form action="alterar_nota.php" method="POST" role="form">
	<legend>Faça sua Alteração</legend>

	<div class="form-group">
	    <input type="hidden" name="id" value="<?php echo $sql['id'];?>">
	    <label for="Nome">Nome</label>
		<input type="text" name="Nome" value="<?php echo $sql['Nome'];?>" class="form-control">
		<label for="CPF">CPF</label>
        <input type="text" name="CPF" value="<?php echo $sql['CPF'];?>" class="form-control">
        <label for="Cod. Verificação">Cod. Verificação</label>
        <input type="text" name="Cod_Ver_Nota" value="<?php echo $sql['Cod_Ver_Nota'];?>" class="form-control">
        <label for="Valor Nota">Valor Nota</label>
        <input type="text" name="Valor_Nota" value="<?php echo $sql['Valor_Nota'];?>" class="form-control">
        <label for="Nº da Sorte">Nº da Sorte</label>
        <input type="text" name="Num_Sorte" value="<?php echo $sql['Num_Sorte'];?>" class="form-control">
        <label for="Cupom">Cupom</label>
        <input type="text" name="Cupom" value="<?php echo $sql['Cupom'];?>" class="form-control">
	</div>
	<div class="row">
	<div class="col-md-6">
	<button type="submit" class="btn btn-primary">Alterar</button>
	</div>
	<div class="col-md-6" align="right">
	<a href="index.php" class="btn btn-success">Home</a>
	</div>
	</div>
</form>
                 
<?php        
    }
?>