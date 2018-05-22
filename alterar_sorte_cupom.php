<?php
require "functions.php";
require "config.php";
$id = $_POST['id'];
$numsorte = $_POST['numsorte'];
$cupom = $_POST['cupom'];
$atualizado_por = $_SESSION['user'];

alterarCupom($id, $numsorte, $cupom, $atualizado_por);
?>