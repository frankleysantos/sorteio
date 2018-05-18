<meta charset="utf-8">
<?php 
session_start();
require "config.php";
require "cabecalho.php";
$login = $_SESSION['id'];

if (!empty($_POST['cod_ver'])) {
	# code...
}
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
 $excluido = $_GET['msn'];
 if (!empty($excluido)) {
 	  echo "<label class='form-control btn btn-danger'>".$excluido."</label>";
 	}	
 $cod_ver = $_GET['cod_ver'];
 ?>
 <h1>Lista de Cadastros Realizados</h1>
 <div class="row">
    <div class="col-md-12" align="right"><a href="sair.php" class="btn btn-danger fa fa-sign-out">Sair</a></div>
 </div>
 </br>
 <form action="" method="POST" role="form">
 	<div class="row">
 	   <div class="col-md-11">
 		<input style="font-size: 12px;" type="text" class="form-control" id="" placeholder="Buscar com CPF ou Cod. Verificação da Nota" name="cod_ver"></div>
 		<div class="col-md-1">
 		<button type="submit" class="btn btn-primary fa fa-search">Buscar</button>
 		</div>
 	</div>
 </form>
 <?php
 if (!empty($_POST['cod_ver'])) {
 	$cod_ver = $_POST['cod_ver'];
 	$sql = $pdo->prepare("SELECT c.id, c.Nome, c.CPF, c.Cod_Ver_Nota, c.Valor_Nota, c.Insercao,p.numsorte,p.cupom FROM concorrentes as c INNER JOIN premiacao as p WHERE c.Cod_Ver_Nota = :cod_ver AND c.id = p.id_concorrente OR c.CPF = :cod_ver AND c.id = p.id_concorrente");
 	$sql->bindValue(":cod_ver", $cod_ver);
 	$sql->execute();
 	if ($sql->rowCount() > 0) {
 		$sql = $sql->fetchAll();
 		?>
 		<table class="table table-bordered table-hover">
 			<thead>
 				<tr>
 					<th>Nome</th>
			        <th>CPF</th>
			        <th>Cod. Verificação</th>
			        <th>Valor Nota</th>
			        <th>Nº da Sorte</th>
			        <th>Cupom</th>
			        <th>Data de Cadastro</th>
 				</tr>
 			</thead>
 		<?php
 		foreach ($sql as $notas) {
 			$count =+1;
 		?>	
 			<tbody>
 				<tr>
 					<td><?php echo $notas['Nome'];?></td>
			        <td><?php echo $notas['CPF'];?></td>
			        <td><?php echo $notas['Cod_Ver_Nota'];?></td>
			        <td><?php echo $notas['Valor_Nota'];?></td>
			        <td><?php echo $notas['numsorte'];?></td>
			        <td><?php echo $notas['cupom'];?></td>
			        <td><?php echo date("d/m/Y H:i:s", strtotime($notas['Insercao']));?></td>				
			        <td><a class="btn btn-primary fa fa-pencil-square-o" href="listar_nota_cadastrada.php?id=<?=$notas['id']?>">-Editar</a></button></td>
			        <td><a class="btn btn-danger fa fa-trash-o" href="excluir_dados.php?id=<?=$notas['id']?>">-Deletar</a></button></td>
			        <td><a class="btn btn-primary fa fa-list" href="listar_cupom.php?cod=<?=$notas['Cod_Ver_Nota']?>">-Listar Nº Sorte - Cupom</a></button></td>
 				</tr>
 			</tbody>
 		<?php
 		}
 		?>
 		</table>
 		<a href="listar_busca.php?msn=0&cod_ver=0" class="btn btn-primary">Voltar</a>
 		<?php
 	}
 }else{
 $total = 0;
 $sql2 = $pdo -> prepare("SELECT count(*) as c FROM premiacao");
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

 $sql = $pdo->prepare("SELECT c.id, c.Nome, c.CPF, c.Cod_Ver_Nota, c.Valor_Nota, c.Insercao,p.numsorte,p.cupom FROM concorrentes as c INNER JOIN premiacao as p WHERE c.id = p.id_concorrente ORDER BY c.Nome LIMIT $p, $qntpg");
 $sql -> execute();
 $count = 0;
    if ($sql -> rowCount() > 0 ) {
        $sql = $sql -> fetchAll();
        
?>
<table class="table table-striped table-hover" id="ulItens">
	<thead>
		<tr>
			<th>Nome</th>
			<th>CPF</th>
			<th>Cod. Verificação</th>
			<th>Valor Nota</th>
			<th>Nº da Sorte</th>
			<th>Cupom</th>
			<th>Data de Cadastro</th>
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
			<td><?php echo $notas['numsorte'];?></td>
			<td><?php echo $notas['cupom'];?></td>
			<td><?php echo date("d/m/Y H:i:s", strtotime($notas['Insercao']));?></td>				
			<td><a class="btn btn-primary fa fa-pencil-square-o" href="listar_nota_cadastrada.php?id=<?=$notas['id']?>">-Editar</a></button></td>
			<td><a class="btn btn-danger fa fa-trash-o" href="excluir_dados.php?id=<?=$notas['id']?>">-Deletar</a></button></td>
			<td><a class="btn btn-primary fa fa-list" href="listar_cupom.php?cod=<?=$notas['Cod_Ver_Nota']?>">-Listar Nº Sorte - Cupom</a></button></td>
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
 	echo '<a href="./listar_cadastros.php?p='.($q+1).'&msn=0" class="btn btn-default">'.($q+1).'</a>';
 }
}
}
 else{
 	header("Location: login.php");
 }
 require "rodape.php"
 ?>