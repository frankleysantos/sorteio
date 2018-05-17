<?php
require "functions.php";
require "config.php";
$id = $_POST['id'];
$numsorte = $_POST['numsorte'];
$cupom = $_POST['cupom'];

alterarCupom($id, $numsorte, $cupom);
?>