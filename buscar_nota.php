<?php
require "functions.php";

if (isset($_POST['Cod_Ver_Nota']) && !empty($_POST['Cod_Ver_Nota'])) {
	# code...
	$VerCod = $_POST['Cod_Ver_Nota'];
    buscarNota($VerCod);
}
else{
	header("Location: index.php");
}