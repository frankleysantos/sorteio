function adicionarLinha(){
	var local=document.getElementById('TabParentesco');
	var tblBody = local.tBodies[0];
	var newRow = tblBody.insertRow(-1);  
	var total  = document.getElementById('familiatotal').value;
	var newCell0 = newRow.insertCell(0);
	newCell0.innerHTML = '<td><input type="text" name="Num_Sorte'+total+'"  value="" class="form-control" placeholder="Numero da Sorte"></td>'; 
	var newCell1 = newRow.insertCell(1);
	newCell1.innerHTML = '<td><input type="text" name="Cupom'+total+'"  value="" class="form-control" maxlength="10" placeholder="Cupom"></td>';
	var newCell2 = newRow.insertCell(2);
	newCell2.innerHTML = '<td><button class="btn btn-large btn-danger" onclick="deleteRow(this.parentNode.parentNode.rowIndex)">Remover</button></td>';
	var total=document.getElementById('familiatotal').value++;

}

function deleteRow(i){
	document.getElementById('TabParentesco').deleteRow(i);
}