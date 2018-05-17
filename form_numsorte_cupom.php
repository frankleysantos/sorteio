<?php
require "cabecalho.php";
require "functions.php";
require "config.php";

    $id = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM premiacao WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql ->execute();

    if ($sql -> rowCount() > 0) {
        # code...
        $sql = $sql ->fetch();
?>
<form action="alterar_sorte_cupom.php" method="POST" role="form">
	<legend>Faça sua Alteração</legend>

	<div class="form-group">
	    <input type="hidden" name="id" value="<?php echo $sql['id'];?>">
	    <label for="Nº Sorte">Nº Sorte</label>
		<input type="text" name="numsorte" value="<?php echo $sql['numsorte'];?>" class="form-control">
		<label for="Cupom">Cupom</label>
        <input type="text" name="cupom" value="<?php echo $sql['cupom'];?>" class="form-control">
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