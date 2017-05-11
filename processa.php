<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$path_parts = pathinfo(__FILE__);
$pastaArq = $path_parts['dirname'].DIRECTORY_SEPARATOR;
$destino = $pastaArq.'in/';
$saida = $pastaArq.'out/';
$erro=false;
if (!file_exists($destino)) {
	echo "Pasta destino (in) não existe\n<Br>";
	$erro=true;
}

if (!file_exists($saida)) {
	echo "Pasta saida (out) não existe\n<Br>";
	$erro=true;
}

if ( (!isset($_FILES['dbf'])) || (!file_exists($_FILES['dbf']['tmp_name']))) {
	echo "Arquivo dbf não carregado na pasta temp\n<Br>";
	$erro=true;
} else if (move_uploaded_file($_FILES['dbf']['tmp_name'], $destino . $_FILES['dbf']['name'])) {
	echo "Arquivo  dbf enviado com sucesso.\n<BR>";
} else {
	echo "ERRO NO dbf!\n<BR>";
	$erro=true;
}

if ( (!isset($_FILES['prj'])) || (!file_exists($_FILES['prj']['tmp_name']))) {
	echo "Arquivo prj não carregado na pasta temp\n<Br>";
	$erro=true;
} else 
if (move_uploaded_file($_FILES['prj']['tmp_name'], $destino . $_FILES['prj']['name'])) {
	echo "Arquivo  prj enviado com sucesso.\n<BR>";
} else {
	echo "ERRO NO prj!\n<BR>";
	$erro=true;
}

if ( (!isset($_FILES['shp'])) || (!file_exists($_FILES['shp']['tmp_name']))) {
	echo "Arquivo shp não carregado na pasta temp\n<Br>";
	$erro=true;
} else 
if (move_uploaded_file($_FILES['shp']['tmp_name'], $destino . $_FILES['shp']['name'])) {
	echo "Arquivo  shp enviado com sucesso.\n<BR>";
} else {
	echo "ERRO NO shp!\n<BR>";
	$erro=true;
}

if ( (!isset($_FILES['shx'])) || (!file_exists($_FILES['shx']['tmp_name']))) {
	echo "Arquivo shx não carregado na pasta temp\n<Br>";
	$erro=true;
} else if (move_uploaded_file($_FILES['shx']['tmp_name'], $destino . $_FILES['shx']['name'])) {
	echo "Arquivo  shx enviado com sucesso.\n<BR>";
} else {
	echo "ERRO NO shx!\n<BR>";
	$erro=true;
}

if ($erro) exit;
$filesNames = basename($_FILES['shp']['name'],'.shp');
$cmd = 'python3 '.$pastaArq.'/py/converter.py '.$destino.$_FILES['shp']['name'].' '.$saida.$filesNames;

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
if (!file_exists($saida.$filesNames.'.shp')) {
	echo "<br>Erro no processamento<br>";
}
//var_dump($_FILES);
ob_clean();
header('Location: index.php');
//echo file_get_contents('/home/aurelienne/www/leo/nodes.json');
