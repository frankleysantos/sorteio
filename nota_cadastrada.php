<?php
session_start();
require "cabecalho.php";
?>
<div class="table table-bordered table-hover">
	<table class="table table-hover">
			<tr>
				<th>Nome</th>
				<td><label class="form-control"><?php echo $_SESSION['NOTA']['Nome'];?></label></td>
			</tr>
			<tr>
			    <th>CPF</th>
				<td><label class="form-control"><?php echo $_SESSION['NOTA']['CPF'];?></label></td>
			</tr>
			<tr>
				<th>Cod. Verificação</th>
				<td><label class="form-control"><?php echo $_SESSION['NOTA']['Cod_Ver_Nota'];?></label></td>
			</tr>
		    <tr>
		    	<th>Valor Nota</th>
		    	<td><label class="form-control"><?php echo $_SESSION['NOTA']['Valor_Nota'];?></label></td>
		    </tr>
			<tr>				
				<th>Números da Sorte</th>
				<td><label class="form-control"><?php echo $_SESSION['NOTA']['Num_Sorte'];?></label></td>
			</tr>
			<tr>
				<th>Data de Cadastro</th>
				<td><label class="form-control"><?php echo date("d/m/Y H:i:s", strtotime($_SESSION['NOTA']['Insercao']))?></label></td>
			</tr>
	</table>
	<div class="row">
	    <div class="col-md-6" align="left">
	    <button type="button" class="btn btn-danger"><a href="sair.php">Sair</a></button>
	    </div>
	    <div class="col-md-6" align="right">
		<button type="button" class="btn btn-primary"><a href="index.php?msn=0">Nova Consulta</a></button>
		</div>
	</div>
</div>