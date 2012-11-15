<?php
//fijo el date de hoy
$date_month = date('m');
$date_year = date('Y');
$date_day = date('d');
$Date = "$date_year-$date_month-$date_day";

//Archivo
$filename = "sistema_muebles_magdaleno_$Date.sql"; // Este es el nombre que quieres que tenga la base de datos que se genera

//Datos BD estos son los datos para acceder a la base de datos
$usuario = "root"; 
$passwd = "";
$bd = "magdaleno";

header("Pragma: no-cache");
header("Expires: 0");
header("Content-Transfer-Encoding: binary");
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=$filename");

// Utilización del script para windows o unix. Activar las lineas depende de cada caso

//windows
//$executa = "C:/xampp/mysql/bin/mysqldump.exe -u$usuario -p$passwd -opt $bd";
$executa = "C:/xampp/mysql/bin/mysqldump.exe -u$usuario --opt $bd";

//$executa = "c:/xampp/mysql/bin/mysqldump.exe -u$usuario -p$passwd --opt $bd";

//para Unix
//$executa = "/opt/lampp/bin/mysqldump -u$usuario -p$passwd --opt $bd";

system($executa, $resultado);


if($resultado){
	echo "<H1>Error ejecutando comando: $executa </H1>\n";
}

?>
