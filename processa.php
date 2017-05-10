<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$destino = '/home/aurelienne/geograph/in/';
$saida = '/home/aurelienne/geograph/out/';
 
if (!file_exists($destino)) {
	echo "Pasta destino (in) não existe\n<Br>";
}

if (!file_exists($saida)) {
	echo "Pasta saida (out) não existe\n<Br>";
}

if (!file_exists($_FILES['dbf']['tmp_name'])) {
	echo "Arquivo dbf não carregado na pasta temp\n<Br>";
}



if (move_uploaded_file($_FILES['dbf']['tmp_name'], $destino . $_FILES['dbf']['name'])) {
	echo "Arquivo  dbf enviado com sucesso.\n<BR>";
} else {
	echo "ERRO NO dbf!\n<BR>";
}

if (move_uploaded_file($_FILES['prj']['tmp_name'], $destino . $_FILES['prj']['name'])) {
	echo "Arquivo  prj enviado com sucesso.\n<BR>";
} else {
	echo "ERRO NO prj!\n<BR>";
}


if (move_uploaded_file($_FILES['shp']['tmp_name'], $destino . $_FILES['shp']['name'])) {
	echo "Arquivo  shp enviado com sucesso.\n<BR>";
} else {
	echo "ERRO NO shp!\n<BR>";
}


if (move_uploaded_file($_FILES['shx']['tmp_name'], $destino . $_FILES['shx']['name'])) {
	echo "Arquivo  shx enviado com sucesso.\n<BR>";
} else {
	echo "ERRO NO shx!\n<BR>";
}
$cmd = 'python3 /home/aurelienne/PycharmProjects/geograph/converter.py '.$destino.$_FILES['shp']['name'].' '.$saida.'resultado.shp';
/*
exec(
	'python3 /home/aurelienne/PyCharmProjects/geograph/converter.py '.$destino.$_FILES['shp']['name'].' '.$saida.'teste.shp',
	$output, $return_var
);
echo "<br>";
var_dump($output);
echo "<br>";
var_dump($return_var);
*/

$exec = shell_exec($cmd);
//echo $exec;
if (!file_exists($saida.'resultado.shp')) {
	echo "<br>não deu<br>";
}
//var_dump($_FILES);
ob_clean();
header('Location: view.html');
//echo file_get_contents('/home/aurelienne/www/leo/nodes.json');