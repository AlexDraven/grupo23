<?php
$funcion = $_REQUEST["f"];

if ($funcion == 'perdida') 
	echo perdida();
else
	echo error();

function perdida(){
	$cont = '<strong>Perdi a mi mascota:</strong> 
		 <form action="" method="post">
			<div class="form-group has-feedback">
				<label> Raza de mascota 
					<input type="text" class="form-control" name="raza" placeholder="Raza" ><br>
				</label>
			</div>
			<div class="form-group has-feedback">
				<label> Nombre de mascota perdida
					<input type="text" class="form-control" name="nombre" placeholder="Nombre de mascota" ><br>
				</label>
			</div>
			<div class="form.group has-feedback">
				<label> Informacion adicional <br>
					<textarea class="form-control" rows="5" cols="50" maxleght="50"> </textarea></br></br>
				</label>
			</div>
			<div class="form-group has-feedback">
				<label> Fecha en que se perdio
					<input type="date" name="fechaperdido" />
				</label>
			</div>
			<div class="form.group has-feedback">
				<label> Subir foto <br>
					<input type="file" name="foto" id="foto-perdida">
				</label>
			</div> <br>
		<input type="submit" value="Publicar">
		</form> ';	
	return $cont;
}

function listaperd(){
	$cont='';
}

function error(){
	$cont='<strong> NO ENCONTRADO <strong>';
	return $cont;
}