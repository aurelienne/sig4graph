<html ng-app='myApp'>
	<head>
		<meta charset='UTF-8'/>
		<title>Sig4Graph</title>
		<link rel="stylesheet" type="text/css" href="assets/css/map.css">
		<!-- <link rel="stylesheet" type="text/css" href="assets/css/leaflet.control.orderlayers.css"> -->

		<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.9.4/angular-material.min.css">

	</head>
	<body ng-controller="MapController as mapCtrl">
		<div class="container">
			<h1><img src="img/logo.png"> Sig4Graph</h1>
			<hr>
			<table class="table alert alert-success">
				<?php
				chdir('out/');
				$arquivos = glob("{*.txt}", GLOB_BRACE);
				foreach ($arquivos as $arq) {
					$arq2 = basename($arq,'.txt');
					?><tr>
						<td><b><?=$arq2?></b></td>
						<td><a href="view.php?arq=<?=$arq2?>.json" target="_blank">Mapa</a></td>
						<td><a href="grafo/index.php?acao=verRede&arq=<?=$arq2?>.txt" target="_blank">Grafo</a></td>
						<td><a href="grafo/index.php?acao=verRede&arq=<?=$arq2?>.zip" target="_blank">Download</a></td>
					</tr>
				<?php }	?>
			</table>
			<hr>
			<form  enctype="multipart/form-data" action="processa.php" method="POST">
				<div class="form-group">
					<label for="dbf">DBF</label>
					<input class="form-control" id="dbf" name="dbf" type="file" />
					<Br>
				</div>
				<div class="form-group">
					<label for="dbf">PRJ</label>
					<input class="form-control" id="prj" name="prj" type="file" />
					<Br>
				</div>
				<div class="form-group">
					<label for="dbf">SHP</label>
					<input class="form-control" id="shp" name="shp" type="file" />
					<Br>
				</div>
				<div class="form-group">
					<label for="dbf">SHX</label>
					<input class="form-control" id="shx" name="shx" type="file" />
					<Br>
				</div>
				<div class="form-group">
					<input class="btn btn-success" type="submit" value="OK">
				</div>
			</form>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
		<script type="text/javascript" src='app/scripts/controllers/index.js'></script>
		<script type="text/javascript" src='app/scripts/directives/map.js'></script>
		<script type="text/javascript" src='app/scripts/services/functions.js'></script>
		<script type="text/javascript" src='assets/js/leaflet.control.orderlayers.js'></script>

		<!-- Libraries to angular material design -->
		<script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.9.4/angular-material.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.min.js"></script>

	</body>
</html>