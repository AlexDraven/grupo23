<?php
$funcion = $_REQUEST["f"];
/*
if ($funcion == 'perdida') 
	echo perdida();
else
	echo error();
*/
switch ($funcion){
	case 'perdida': echo perdida();
		break;
	case 'gmaps': echo gmaps();
		break;
	default: echo error();
}

function perdida(){
	$cont = '<strong>Perdi a mi mascota</strong> <br>
		 <form action="" method="post">
			<div class="form-group has-feedback">
				<label> Especie/Raza de mascota:
					<input type="text" class="form-control" name="raza" placeholder="Raza" ><br>
				</label>
			</div>
			<div class="form-group has-feedback">
				<label> Nombre de la mascota perdida:
					<input type="text" class="form-control" name="nombre" placeholder="Nombre de mascota" ><br>
				</label>
			</div>

			<div class="form-group has-feedback">
				<label> Fecha en que se perdio: <br>
					<input type="date" name="fechaperdido" />
				</label>
			</div>
			<div class="form.group has-feedback">
				<label> Subir foto <br>
					<input type="file" name="foto" id="foto-perdida">
				</label>
			</div> 
			<div class="form.group has-feedback">
				<label> Comentario adicional <br>
					<textarea class="form-control" rows="5" cols="50" maxleght="50"> </textarea></br></br>
				</label>
			</div>
			<br>
		<input type="submit" value="Publicar">
		</form> ';	
	return $cont;
}

function gmaps(){
	$cont='<img src="imgs/gmaps.jpg">';
	return $cont;
}

function error(){
	$cont='<strong> NO ENCONTRADO <strong></br>
			<h1> onlyinrosario.com/emprendevs2 </h1>';
	return $cont;
}