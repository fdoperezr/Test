function mostrarLista(){
	var lista = document.getElementsByName('lista');
	var numero = document.getElementByName('numero').value;

	lista.innerHTML= numero;
}