<html>
<head>
<title>Pesquisa</title>
<link rel="stylesheet" href="estilo.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>    
    function busca(){
        document.form.submit();
        return true;
    }
    
</script>
</head>
<body onload="document.form.CAMPOBUSCA.focus();">
<form name="form" method="post" action="ConsultaCliente2.php" onsubmit="return busca();">
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
    <tr><td bgcolor="#CCCCCC" align="center" class="titulo">Pesquisa Clientes</td></tr>
    <tr>
        <td align="center">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="pretopq">Nome:</td>
                    <td align="left" class="pretopq">
                        <input name="CAMPOBUSCA" type="text" id="CAMPOBUSCA" size="40" maxlength="45" value="">
                    </td>	
                    <td>
                        <input type="submit" name="Submit" value=" ... ">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
</table>
</form>
<?php
    require_once('funcoes.php');  

	conectar('localhost', 'root','', 'bd_estacionamento');
	
	$result = mysql_query("SELECT * FROM clientes");

	echo "<table border=5 style=3 width=100%><tr><td>ID</td><td>Nome</td><td>RG</td></tr>";
	
	while($row = mysql_fetch_assoc($result)){
        echo "<tr><td>".$row['id_cliente']."</td>"."<td>".$row['nome_cliente']."</td>"."<td>".$row['rg_cliente']."</td>";
    }
	
	echo "</table>";
?>
</body>
</html>
