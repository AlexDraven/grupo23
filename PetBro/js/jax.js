function contenido(funcion) {
	var http = false; 
	
	http = new XMLHttpRequest(); 

	rannum = Math.random()*50000; 

	http.open("GET", "formularios.php?f="+funcion+"&rnd="+rannum, true);

	http.onreadystatechange=function() { 

		if(http.readyState == 4) { 
			document.getElementById('contenedor').innerHTML = http.responseText; 
		} 
	}
	
	http.send(null); 

}

