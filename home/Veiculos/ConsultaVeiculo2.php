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
<form name="form" method="post" action="ConsultaVeiculo2.php" onsubmit="return busca();">
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
    <tr><td bgcolor="#CCCCCC" align="center" class="titulo">Pesquisa Veículo</td></tr>
    <tr>
        <td align="center">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="pretopq">Placa:</td>
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
	
	if ($_POST["CAMPOBUSCA"] == ""){
		$result = mysql_query("SELECT * FROM veiculos");
	} else {
		$result = mysql_query("SELECT * FROM veiculos WHERE placa_veiculo='".$_POST["CAMPOBUSCA"]."'");
	}
	
	echo "<table border=5 style=3 width=100%><tr><td>ID</td><td>Placa</td><td>Tipo</td><td>Modelo</td><td>Ano</td><td>Cor</td><td>Cliente</td></tr>";
	
	while($row = mysql_fetch_assoc($result)){
        echo "<tr><td>".$row['id_veiculo']."</td>"."<td>".$row['placa_veiculo']."</td>"."<td>".$row['tipo_veiculo']."</td>"."<td>".$row['modelo_veiculo']."</td>"."<td>".$row['ano_veiculo']."</td>"."<td>".$row['cor_veiculo']."</td>";
		$fk = mysql_fetch_assoc(mysql_query("SELECT * FROM clientes where id_cliente='".$row['fk_cliente_veiculo']."'"));
		echo "<td>".$fk['nome_cliente']."</td></tr>";
    }
	
	echo "</table>";
?>
</body>
</html>
