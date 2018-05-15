<?php
require "functions.php";
$id = $_POST['id'];
$Nome = $_POST['Nome'];
$CPF = $_POST['CPF'];
$Cod_Ver_Nota = $_POST['Cod_Ver_Nota'];
$Valor_Nota = $_POST['Valor_Nota'];

alterarNota($id,$Nome, $CPF, $Cod_Ver_Nota, $Valor_Nota);
?>