<meta charset="utf-8">
<?php 
session_start();
require "config.php";
require "cabecalho.php";

 $sql = $pdo -> prepare("SELECT * FROM concorrentes ORDER BY Nome");
 $sql -> execute();
 $count = 0;
    if ($sql -> rowCount() > 0 ) {
        $sql = $sql -> fetchAll();
        
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Nome</th>
			<th>CPF</th>
			<th>Cod. Verificação</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($sql as $notas) {  
  $count +=1;
?>
		<tr>
			<td><?php echo $notas['Nome'];?></td>
			<td><?php echo $notas['CPF'];?></td>
			<td><?php echo $notas['Cod_Ver_Nota'];?></td>
			<td><?php echo $notas['Valor_Nota'];?></td>
			<td><?php echo $notas['Num_Sorte'];?></td>
			<td><?php echo $notas['Cupom'];?></td>
			<td><a class="btn btn-primary" href="listar_nota_cadastrada.php?id=<?=$notas['id']?>">Editar</a></button></td>
		</tr>
	</tbody>

<?php
         }
}
echo "<h3><label class='label label-info'>Pessoas cadastradas:".$count."</label></h3>";
?>
 </table>