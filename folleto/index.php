<html>
	<head>
		<title>Descargar folleto</title>
		<meta charset="UTF-8">
	</head>
	<body>
			<div class=""> <p> Descargar folleto: </p> </div>
			<form role="form" name="pdf" method="post" action="generador.php">
				<div class="">
					<label>Título:</label>
					<input type="text" name="nombre" class="" required />
				</div>
				<div class="">
					<label>Foto de la mascota:</label>
				<img src="loro.jpg" name="loro">
				</div>	
				<!-- Email -->		
				<div class="">
					<label>Descripción:</label>
					<input type="text" name="desc" class="" required />
				</div>	
				<div class="">
					<p> Aca va el codigo QR </p>
				</div>
				<!-- Button -->
				<button type="submit" value="generar" class="">Descargar folleto</button>
			</form>			
	</body>
</html>