<html>
<head>
	<meta charset="utf-8">
	<title>Sorteio</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/functions.js"></script>
    <script type="text/javascript">
  $(function(){
    $("#txtBusca").keyup(function(){
      var index = $(this).parent().index();
      var texto = $(this).val().toUpperCase();

      $("#ulItens td").each(function(){
        if($(this).text().toUpperCase().indexOf(texto) < 0)
         $(this).css("display", "none");
     });
      $("#ulItens td").each(function(){
        if($(this).text().toUpperCase().indexOf(texto) >= 0)
         $(this).css("display", "block");
     });
    });
  });
  function verificarCPF(c){
    var i;
    s = c;
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    var v = false;
    var cpf = s;

    if ( (cpf == "00000000000") || (cpf == "11111111111") || (cpf == "22222222222") || (cpf == "33333333333") 
        || (cpf == "44444444444") || (cpf == "55555555555") || (cpf == "66666666666")
        || (cpf == "77777777777") || (cpf == "88888888888") || (cpf == "99999999999")){
        alert("CPF Inválido")
        v = true;
        document.getElementById('cpf').value=null;
        return false; 
    }  
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(10-i);
    }

    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
        alert("CPF Inválido")
        v = true;
        document.getElementById('cpf').value=null;
        document.getElementById('CPF').value=null;
        return false;   
    }
 
    d1 *= 2;
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){
        alert("CPF Inválido")
        v = true;
        document.getElementById('cpf').value=null;
        document.getElementById('CPF').value=null;
        return false;
        
    }
    if (!v) {
        
    }

}
  </script>
  <script src="funcoes.js"></script>
</head>
<body>
	
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php?msn=0">Sorteio</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li><a href="listar_cadastros.php?msn=0">Listar Cadastrados</a></li>
					<li><a href="listar_excel.php">Excel</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	
	<div class="container" style="padding-top: 100px" class="col-md-12">
		<div class="principal">
			