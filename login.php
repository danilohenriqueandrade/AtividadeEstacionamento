<?php
session_start();			
if(file_exists("init.php")){
	require_once "init.php";
} else {
	die("Arquivo de init não encontrado");
}

function limpa($string){
	$var = trim($string);
	$var = addslashes($var);	
	return $var;
}

if(getenv("REQUEST_METHOD") == "POST"){
	$nome  = isset($_POST["user"]) ? limpa($_POST["user"]) : "";
	$senha = isset($_POST["password"]) ? limpa($_POST["password"]) : "";
	
	$sql = sprintf("select count(*) from usuarios where user = '%s' and password = '%s'", $nome, $senha);
	mysql_connect(SERVIDOR, USUARIO, SENHA) or die(mysql_error());
	mysql_select_db(BANCO) or die(mysql_error());
	
	$re = mysql_query($sql) or die(mysql_error());
	if(mysql_result($re, 0)){
		$re 	   = mysql_query("select * from usuarios where user = '$nome' and password = '$senha'") or die(mysql_error());		
		$resultado = mysql_fetch_array($re);

		if($resultado["nivel_acesso"] >= 0){
			$dados             = array();
			$dados["user"]     = $nome;
			$dados["password"]    = $senha;			
			$_SESSION["dados"] = $dados;			
			
			if(isset($_POST["cookie"])){			
				setcookie("dados", serialize($dados), time()+60*60*24*365);			
			}
			header("Location: /AtividadeFinal/home/");
		} else {
			header("Location: index.html");
		}		
	} else {
		header("Location: index.html");
	}
}
?>