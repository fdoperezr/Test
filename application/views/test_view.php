<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/test.js" ></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/test.css">
	<title>Test Selección</title>
</head>
<body>
	<div id = "titulo" class="container" align="center">
		<hr>
		<h1>Test Selección</h1>
		<hr>
	</div>
	<div class="container" align="center">
		Número de entradas: <input type="number" min="1" id="numero" onChange="mostrarLista()">
		<hr>
	</div>
	<div id="lista" class="container" align="center">
		<h4>Lista de Entradas</h4>
		
	</div>
	
	<div id="footer" align="center">
		Fernando Pérez - Febrero 2018 <br>	<a href="mailto:fdoperezr@outlook.com">fdoperezr@outlook.com</a>
	</div>
	
</body>
</html>
	<script type="text/javascript">
	function mostrarLista(){
		var lista = document.getElementById('lista');
		
		var numero = document.getElementById('numero').value;
		lista.innerHTML = "<h4>Lista de Entradas</h4>";
		if (numero > 0){
			lista.innerHTML = "<h4>Lista de Entradas</h4>";
			for (i = 0; i < numero; i++) { 
				lista.innerHTML += "Fecha "+(i+1)+":</h6> <input type='date' name='fechas' onchange='compararFechas();'> Número "+(i+1)+": <input type='number' min='1' name='numeros'><br>";
			}
			lista.innerHTML += "<br> <button type='button' onclick='calcularFechas();'class='btn btn-primary'>Calcular Fechas</button><br><hr>";
			lista.innerHTML += "<br><div id='errorCamposVacios' class='alert alert-danger' style='display: none'></div>"
			lista.innerHTML += "<div id='errorComparacion' class='alert alert-danger' style='display: none'></div><br>"
			lista.innerHTML += "<div id='resultados' class='alert alert-success' style='display: none'></div><br>"
		}			
	}

	function calcularFechas(){
		var resultado = document.getElementById("resultados");
		ocultarMensaje (resultado);
		if(validarInputs())
			if (!compararFechas()){
				console.log("hola");
				var fechas = document.getElementsByName("fechas");
				var numeros = document.getElementsByName("numeros");
				
				for (i = 0; i < fechas.length; i++){
					var fecha = new Date (fechas[i].value);
					var n  = Number(numeros[i].value);
					var fechaProxima = new Date (fecha);
					var contador = 0;
					while (contador <= n ){
						fechaProxima.setDate(fechaProxima.getDate() +1);
						if (fechaProxima.getDay() !=0)
							if (fechaProxima.getDay() != 6){
								contador++;
						}
							
					}
					var dd = fechaProxima.getDate();
					var mm = fechaProxima.getMonth() + 1;
					var y = fechaProxima.getFullYear();
					var formato = dd + "-" + mm + "-" + y;
					resultado.innerHTML += "Próxima fecha para Fecha "+(i+1)+": "+"<strong>"+formato+"</strong>" + "<br>";
				}
				resultado.style.display = "block";	
			}					
	}

	function validarInputs(){
		var fechas = document.getElementsByName("fechas");
		var numeros = document.getElementsByName("numeros");
		var error = document.getElementById('errorCamposVacios');
		var resultado = document.getElementById("resultados");
		ocultarMensaje (resultado);
		ocultarMensaje(error);
		for (i = 0; i < fechas.length; i++) {
		 if (fechas[i].value == "" || numeros[i].value == ""){
				error.innerHTML += "<strong>¡Error!</strong> No debe dejar campos vacíos.";
				error.style.display = "block";
				return false;

			 }
		}
		return true;
	}

	function ocultarMensaje(mensaje){
		mensaje.innerHTML = "";
		if (mensaje.style.display == "block") {
        	mensaje.style.display = "none";
   		}
	}

	function compararFechas (){
		var fechas = document.getElementsByName("fechas");
		var error = document.getElementById('errorComparacion');
		var resultado = document.getElementById("resultados");
		ocultarMensaje (resultado);
		ocultarMensaje(error);
		var contador = 0;
		if (fechas.length > 1){
			for (i = 0; i < fechas.length-1; i++) {
				if (fechas[i].value != "" && fechas[i+1].value != ""){
					var fechax = new Date(fechas[i].value);
					var fechay = new Date(fechas[i+1].value);
					if (fechax > fechay){
						error.innerHTML += "Fecha "+(i+1)+" es mayor que Fecha "+(i+2)+".<br>";
						error.style.display = "block";
						contador++;
					}
				}
					
			}
		}
		console.log("c: "+contador);
		console.log("f: "+fechas.length);
		if (contador == 0)
			return false;
		else 
			return true;
	}
	</script>		
