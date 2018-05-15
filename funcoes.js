function adicionarLinha(){
	var local=document.getElementById('TabPremiacao');
	var tblBody = local.tBodies[0];
	var newRow = tblBody.insertRow(-1);  
	var total  = document.getElementById('premiacaototal').value;
	var newCell0 = newRow.insertCell(0);
	newCell0.innerHTML = '<td><input type="text" name="numsorte'+total+'"  value="" class="form-control" placeholder="Nº Sorte"></td>'; 
	var newCell1 = newRow.insertCell(1);
	newCell1.innerHTML = '<td><input type="text" name="cupom'+total+'"  value="" class="form-control" placeholder="Cupom"></td>';
	var newCell2 = newRow.insertCell(2);
	newCell2.innerHTML = '<td><button class="btn btn-large btn-danger" onclick="deleteRow(this.parentNode.parentNode.rowIndex)">Excluir</button></td>';
	var total=document.getElementById('premiacaototal').value++;

}

function deleteRow(i){
	document.getElementById('TabPremiacao').deleteRow(i);
}

function mascara(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}

function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}

function mcel(v){
	v=v.replace(/\D/g,"");
	v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
	v=v.replace(/(\d)(\d{4})$/,"$1-$2");
	return v;
}

function mfixo(v){
	v=v.replace(/\D/g,"");
	v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
	v=v.replace(/(\d)(\d{4})$/,"$1-$2");
	return v;
}

window.onload = function(){
	id('Fone_Cel').onkeyup = function(){
		mascara( this, mcel );
	}
	id('Fone_Fixo').onkeyup = function(){
        	mascara( this, mfixo );}
}

function cep(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execcep()",1)
}

function execcep(){
	v_obj.value=v_fun(v_obj.value)
}

function mcep(v){
	v=v.replace(/\D/g,"");            
	v=v.replace(/^(\d{2})(\d)/g,"$1.$2"); 
	v=v.replace(/(\d)(\d{3})$/,"$1-$2");    
	return v;
}

function id( el ){
	return document.getElementById( el );
}

window.onload = function(){
	id('End_CEP').onkeyup = function(){
		cep( this, mcep );
	}
}


function mostraTipo(){
	if((document.getElementById("Trans_Forma").value=="carro")||(document.getElementById("Trans_Forma").value=="moto")){
		document.getElementById("Trans_Tipo").style.display="block";
	}else{
		document.getElementById("Trans_Tipo").style.display="none";
	}			
}

function dataConta(c){
	if(c.value.length ==2){
		c.value += '/';
	}
	if(c.value.length==5){
		c.value += '/';	
	}
}

function mostraimovel(){
	if(document.getElementById("Hab_Modo").value=="proprio"){
		document.getElementById("Hab_propria").style.display="block";
		document.getElementById("Hab_valor").style.display="none";
	}else{
		document.getElementById("Hab_propria").style.display="none";
	}

	if((document.getElementById("Hab_Modo").value=="alugada")
		|| (document.getElementById("Hab_Quit").value=="nao")){
		document.getElementById("Hab_valor").style.display="block";
	}else{
		document.getElementById("Hab_valor").style.display="none";
	}

	if(
		(document.getElementById("Hab_Modo").value=="invadida")||
		(document.getElementById("Hab_Modo").value=="cedida")
	){
		document.getElementById("Hab_propria").style.display="none";
		document.getElementById("Hab_valor").style.display="none";
		document.getElementById("Hab_Quit").value="";
		document.getElementById("Hab_Valor").value=null;
	}
}


function moeda(z){ 
	v = z.value; 
	v=v.replace(/\D/g,"")
	v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2")
	z.value = v; 
}

function deficienteOutra(){
	if(document.getElementById("Deficiente_Qual").value=="Outra"){
		document.getElementById("Def_tmp").style.display="block";
		document.getElementById("Def_Outra").required=true;
	}else{
		document.getElementById("Def_tmp").style.display="none";
	}
}
function SetRequired(){
/*	document.getElementById("Status_escolar").attributes="required";
	document.getElementById("CadUnico").attributes"required";
/*	document.getElementById("TimeRes").attributes.required="required";
	document.getElementById("Ling_Ingles").attributes.required="required";
	document.getElementById("Ling_Espanhol").attributes.required="required";
	document.getElementById("Pensao_Paga").attributes.required="required";
	document.getElementById("Pensao_Recebe").attributes.required="required";
	document.getElementById("Renda_Maior").attributes.required="required";
	document.getElementById("Renda_Mensal_Individual").attributes.required="required";
	document.getElementById("Renda_Mensal_Capita").attributes.required="required";
	document.getElementById("Deficiente").attributes.required="required";
	document.getElementById("Transferencia").attributes.required="required";
	document.getElementById("Idoso").attributes.required="required";
	document.getElementById("PlanoDeSaude").attributes.required="required";
*/
	}

function verficaradio(){
	selecionado=document.getElementById("Status_escolar").checked;
	if (selecionado) {
		window.alert("Você selecionou o checkbox.");
		//document.getElementById("Status_escolar").attributes.required="required"=true;
	}
	else {	
		window.alert(selecionado);
		return false;
	}
}
