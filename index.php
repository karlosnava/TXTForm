<?php
	include './funcs.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TXTForm</title>

	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link rel="stylesheet" href="./styles.css"/>
</head>
<body>
	<div class="grid">
		<div class="left">
			
			<div class="left-head">
				TXTForm
			</div>
			
			<form action="./actions/create.php" method="POST" id="inserter">
				<label for="name">Nombre</label>
    		<input type="text" id="name" name="name" placeholder="Nombre...">

				<label id="document_type_label">
					Tipo de documento
					<select id="document_type" name="document_type">
						<option value="CC">CC</option>
						<option value="TI">TI</option>
						<option value="CE">CE</option>
					</select>
				</label>

				<label>
					Documento
					<input type="text" id="documentt" name="documentt" onkeypress="return isNumber(event)">
				</label>

				<label>
					Dirección
					<input type="text" id="direction" name="direction">
				</label>

				<label>
					Fecha de nacimiento
					<input type="date" id="birthday" max="<?=date("Y-m-d");?>" name="birthday">
				</label>

				<small class="info"></small>

				<button id="save">Guardar</button>
			</form> 
		</div>


		<div class="right">
			<div id="refresh"><?php
				$file = fopen("data.txt", "r");
				while(!feof($file)) {
					$datas[] = fgets($file);
				}
				fclose($file);

				if(count($datas) >=2 ){ ?>
					<table class="w-100">
						<thead>
							<th>Key</th>
							<th>Nombre</th>
							<th>Tipo de documento</th>
							<th>Documento</th>
							<th>Dirección</th>
							<th>Fecha de nacimiento</th>
							<th></th>
						</thead>
						<tbody><?php
							foreach ($datas as $data) {
								if (!empty($data)) {
									$data = explode("|", $data); ?>
									<tr>
										<td><?=$data[0];?></td>
										<td><?=$data[1];?></td>
										<td><?=$data[2];?></td>
										<td><?=$data[3];?></td>
										<td><?=$data[4];?></td>
										<td><?=$data[5];?></td>
										<td>
											<span key="<?=$data[0];?>" class="deleter">Eliminar</span>
										</td>
									</tr><?php
								}
							} ?>
						</tbody>
					</table><?php
				}else{ ?>
					<div class="text-center">
						<img src="https://cdn.dribbble.com/users/3821/screenshots/5673869/attachments/1225509/desert.png?compress=1&resize=400x300">
						<h3>No hay registros para mostrar.</h3>
						<p>¡Empieza creando uno!</p>
					</div>
					<?php
				} ?>
		</div>
		
		<div class="text-center credits">
			Desarrollado y diseñado por Carlos Rodriguez 10/2021
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="./scripts.js"></script>
</body>
</html>