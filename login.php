<?php

require "cabecalho.php";
require "config.php";
session_start();
if (isset($_POST['usuario']) && !empty($_POST['usuario'])) {
	$usuario = addslashes($_POST['usuario']);
	$senha = md5(addslashes($_POST['senha']));

	$sql = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario and senha = :senha");
	$sql->bindValue(":usuario", $usuario);
	$sql->bindValue(":senha", $senha);
	$sql->execute();

	if ($sql->rowCount() > 0) {
		$sql = $sql->fetch();
		$_SESSION['id'] = $sql['id'];
   	    header("Location: index.php?msn=0");
	}
	else{
		?>
    <label class="btn btn-danger form-control"><?php echo "Usuário não existe";?></label>
<?php		
	}
}
?>
<form method="POST">
	<legend>Sistema de Cupom</legend>

	<div class="form-group">
		<label for="">Usuário</label>
		<input type="text" class="form-control" name="usuario" placeholder="Login">
	</div>
	<div class="form-group">
		<label for="">Senha</label>
		<input type="password" class="form-control" name="senha" placeholder="Senha">
	</div>

	<button type="submit" class="btn btn-primary">Logar</button>
</form>

<?php
require "rodape.php";
?>