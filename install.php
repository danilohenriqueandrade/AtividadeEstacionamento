<?php
if(file_exists("init.php")){
	require_once "init.php";
} else {
	die("Arquivo de init não encontrado");
}

$link = mysql_connect(SERVIDOR, USUARIO, SENHA);
$dbs  = mysql_fetch_array(mysql_list_dbs($link));

if(!in_array(BANCO, $dbs)){
	$sql = file_get_contents("db/bd_estacionamento.sql");
	mysql_query("CREATE DATABASE bd_estacionamento");
	mysql_select_db(BANCO);
	mysql_query($sql);	
}
?>