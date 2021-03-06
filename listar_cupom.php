<?php 
session_start();
require "config.php";
require "cabecalho.php";
 if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
 $cod = $_GET['cod'];
 $total = 0;
 $sql2 = $pdo -> prepare("SELECT count(*) as c FROM premiacao WHERE Cod_Ver_Nota = :cod");
 $sql2->bindValue(":cod", $cod);
 $sql2->execute();
 $sql2 = $sql2->fetch();
 $total = $sql2['c'];
 $paginas = $total / 10;
 
 $qntpg = 10;
 $pg= 1;

 if(isset($_GET['p']) && !empty($_GET['p'])){
 	$pg = addslashes($_GET['p']);
 }
 $p = ($pg-1) * $qntpg;

 $sql = $pdo->prepare("SELECT * FROM premiacao WHERE Cod_Ver_Nota = :cod ORDER BY id LIMIT $p, $qntpg");
 $sql -> bindValue(":cod", $cod);
 $sql -> execute();
 $count = 0;
    if ($sql -> rowCount() > 0 ) {
        $sql = $sql -> fetchAll();
        
?>
<h3><i class="fa fa-list">Cupoms Cadastrados por Cod. de Verificação</i></h3>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Cod. Ver. Nota</th>
			<th>Nº Sorte</th>
			<th>Cupom</th>
			<th>Inserção</th>
			<th>Atualização</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($sql as $notas) {  
  $count +=1;
?>
		<tr>
			<td><?php echo $notas['id'];?></td>
			<td><?php echo $notas['Cod_Ver_Nota']?></td>
			<td><?php echo $notas['numsorte'];?></td>
			<td><?php echo $notas['cupom'];?></td>
			<td><?php echo date("d/m/Y H:i:s", strtotime($notas['Insercao']));?></td>
			<td><?php echo date("d/m/Y H:i:s", strtotime($notas['atualizacao']));?></td>
			<?php 
              if ($_SESSION['perfil'] == 'admin') {
			?>				
			<td><a class="btn btn-primary" href="form_numsorte_cupom.php?id=<?=$notas['id']?>">Editar Nº Sorte - Cupom</a></td>
			<td><abbr title="Excluir dados"><a class="btn btn-danger fa fa-trash" href="excluir_cupom.php?id=<?=$notas['id']?>"></a></abbr></td>
			<?php
              }
			?>
		</tr>
	</tbody>

<?php
         }
}
echo "<h3><label class='form-control label-warning' align='center'>".$count."&ensp;de&ensp;".$total."&ensp;Registros"."</label></h3>";
?>
 </table>

 <?php
 echo "<hr/>";
 for ($q=0; $q < $paginas; $q++) { 
 	echo '<a href="./listar_cupom.php?cod='.$cod.'&p='.($q+1).'&msn=0" class="btn btn-default">'.($q+1).'</a>';
 }
}else{
	header("Location: login.php");
}
 require "rodape.php";
 ?>