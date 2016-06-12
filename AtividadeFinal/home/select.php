<?php
	require_once('funcoes.php');

	conectar('localhost', 'root', '', 'biblioteca');
	$result = mysql_query("SELECT * From usuarios");
	echo $result."<br>";

	while($row = mysql_fetch_assoc($result)){
		echo ""
	}

?>