<?php
session_start();

function buscarNota($VerCod){
	require "config.php";
    $sql = $pdo->prepare("SELECT * FROM concorrentes WHERE Cod_Ver_Nota = :VerCod");
    $sql->bindValue(":VerCod", $VerCod);
    $sql ->execute();

    if ($sql -> rowCount() > 0) {
    	# code...
    	$sql = $sql ->fetch();
    	$_SESSION['NOTA']['Nome'] = $sql['Nome'];
    	$_SESSION['NOTA']['CPF'] = $sql['CPF'];
    	$_SESSION['NOTA']['Cod_Ver_Nota'] = $sql['Cod_Ver_Nota'];
    	$_SESSION['NOTA']['Valor_Nota'] = $sql['Valor_Nota'];
    	$_SESSION['NOTA']['Num_Sorte'] = $sql['Num_Sorte'];
    	$_SESSION['NOTA']['Insercao'] = $sql['Insercao'];
 
    	header("Location: nota_cadastrada.php");
    }
    else{
        $_SESSION['NOTA']['Cod_Ver_Nota'] = $VerCod;
    	header("Location: form_cadastrar_nota.php");
    }
}

function inserirNota($Nome, $CPF, $Cod_Ver_Nota, $Valor_Nota, $Num_Sorte, $Cupom){
    require "config.php";
    $sql = $pdo->prepare("INSERT INTO concorrentes (Nome, CPF, Cod_Ver_Nota, Valor_Nota, Num_Sorte, Cupom,Insercao) 
        VALUES (:Nome, :CPF, :Cod_Ver_Nota, :Valor_Nota, :Num_Sorte, :Cupom, Now())");
    $sql->bindValue(":Nome", $Nome);
    $sql->bindValue(":CPF", $CPF);
    $sql->bindValue(":Cod_Ver_Nota", $Cod_Ver_Nota);
    $sql->bindValue(":Valor_Nota", $Valor_Nota);
    $sql->bindValue(":Num_Sorte", $Num_Sorte);
    $sql->bindValue(":Cupom", $Cupom);
    $sql->execute();
    header("Location: index.php");

}