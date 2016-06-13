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
<form name="form" method="post" action="ConsultaRegistros2.php" onsubmit="return busca();">
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
    <tr><td bgcolor="#CCCCCC" align="center" class="titulo">Pesquisa Registro</td></tr>
    <tr>
        <td align="center">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="pretopq">Cliente:</td>
                    <td align="left" class="pretopq">
                        <input name="CAMPOBUSCA" type="text" id="CAMPOBUSCA" size="40" maxlength="60" value="">
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
	$result = mysql_query("SELECT * FROM registros");

	echo "<table border=5 style=3 width=100%><tr><td>ID</td><td>Entrada</td><td>Saida</td><td>Cliente</td><td>Veiculo</td><td>Placa</td><td>Cor</td><td>Vaga</td></tr>";
	
	while($row = mysql_fetch_assoc($result)){
        echo "<tr><td>".$row['id_registro']."</td>"."<td>".$row['entrada_registro']."</td>"."<td>".$row['saida_registro']."</td>";
		$fk1 = mysql_fetch_assoc(mysql_query("SELECT * FROM clientes where id_cliente='".$row['fk_registro_cliente']."'"));
		echo "<td>".$fk1['nome_cliente']."</td>";
		$fk2 = mysql_fetch_assoc(mysql_query("SELECT * FROM veiculos where id_veiculo='".$row['fk_registro_veiculo']."'"));
		echo "<td>".$fk2['modelo_veiculo']."</td>"."<td>".$fk2['placa_veiculo']."</td>"."<td>".$fk2['cor_veiculo']."</td>";
		echo "<td>".$row['fk_registro_vaga']."</td></tr>";
		
    }
	
	echo "</table>";
?>
</body>
</html>
