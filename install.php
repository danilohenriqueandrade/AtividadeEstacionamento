<?php
if(file_exists("..\AtividadeFinal\init.php")){
	require_once "..\AtividadeFinal\init.php";
} else {
	die("Arquivo de init n�o encontrado");
}

$link = mysql_connect(SERVIDOR, USUARIO, SENHA);
$dbs  = mysql_fetch_array(mysql_list_dbs($link));

if(!in_array(BANCO, $dbs)){
	$sql = file_get_contents("..\AtividadeFinal\db\bd_estacionamento.sql");
	mysql_query("CREATE DATABASE bd_estacionamento");
	mysql_select_db(BANCO);
	mysql_query($sql);	
}
?>