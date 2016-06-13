<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Teste Menu Arvore</title>
<link rel="stylesheet" href="estilo.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.viz{visibility: visible }
.viz1{visibility: hidden }
.disp{display: block }
.disp1{display: none }
</style>
<script language="javascript">

    aberto=new Image()
    aberto.src="img/open-menu.gif"  
    fechado=new Image()
    fechado.src="img/closed-menu.gif"

    var sinal = fechado;

    function controle(obj,sinalId){
        if(obj!=null){
            if(obj.style.display == 'block'){
                //mudaSinal(1,sinalId);
                obj.style.display = 'none';
            }else{
                //mudaSinal(0,sinalId);
                obj.style.display = 'block';
            }
        }
    }
    
    function mudaSinal(val,sinalId){
        if(val == 1){
            document.images["sinal" + sinalId].src = fechado.src
        }
        if(val == 0){
            document.images["sinal" + sinalId].src = aberto.src
        }
    }

    function submit(ref,id,acao){
        location=ref + "?id" + id + "&acao" + acao + "target='mainFrame'"
    }
    
</script>
</head>
<body top="0" left="0" bgcolor="#BEBCBA"><!--#6666CC-->
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td class="destaque"><font color="#FFFFFF">Seja bem vindo!</font></td>
    </tr>
</table><br> 
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#BEBCBA">

    <tr>
        <td>
            <table id="pai1" cellpadding="0" cellspacing="1" border="0">
                <tr>
                    <td align="center" width="30" nowrap>
                        <a href="javascript:controle(document.all('filho1'),'1')" class="amenu">
                        <img border="0" name="sinal1" src="Cliente\clientes.jpg">
                        </a>
                    </td>
                    <td align="left">
                        <a href="Cliente\ConsultaCliente.php" target="mainFrame" class="amenu">
                        Cadastro de Clientes
                        </a>
                    </td>
                </tr>
                    
                <tr>
                    <td></td>
                    <td align="left">
                        <ul>
                            <table id="filho1" cellpadding="0" cellspacing="0" style="display:none">
                                    
                                <tr>
                                    <td>
                                        <a href="Cliente\InserirCliente.php" target="mainFrame" class="amenu">
                                        Inserir Cliente
                                        </a>
                                    </td>
                                </tr>
                
                                <tr>
                                    <td>
                                        <a href="Cliente\ConsultaCliente.php" target="mainFrame" class="amenu">
                                        Consultar Cliente
                                        </a>
                                    </td>
                                </tr>

                            </table>
                        </ul>
                    </td>
                </tr>				
            </table>
		</td>
	</tr>
	
	<tr>
		<td>
			<table id="pai2" cellpadding="0" cellspacing="1" border="0">
				<tr>
					<td align="center" width="30" nowrap>
						<a href="javascript:controle(document.all('filho2'),'2')" class="amenu">
						<img border="0" name="sinal2" src="Veiculos\veiculo.jpg">
						</a>
					</td>
					<td align="left">
						<a href="Veiculos\ConsultaVeiculo.php" target="mainFrame" class="amenu">
						Cadastro de Veículos
						</a>
					</td>
				</tr>
				<tr>
                    <td></td>
                    <td align="left">
                        <ul>
                            <table id="filho2" cellpadding="0" cellspacing="0" style="display:none">
                                    
                                <tr>
                                    <td>
                                        <a href="Veiculos\InserirVeiculo.php" target="mainFrame" class="amenu">
                                        Inserir Veículos
                                        </a>
                                    </td>
                                </tr>
								
								<tr>
                                    <td>
                                        <a href="Veiculos\ConsultaVeiculo.php" target="mainFrame" class="amenu">
                                        Consultar Veículos
                                        </a>
                                    </td>
                                </tr>

                            </table>
                        </ul>
                    </td>
                </tr>
			</table>
		</td>
	</tr>
	
	<tr>
		<td>
			<table id="pai3" cellpadding="0" cellspacing="1" border="0">
				<tr>
					<td align="center" width="30" nowrap>
						<a href="javascript:controle(document.all('filho3'),'3')" class="amenu">
						<img border="0" name="sinal3" src="Vagas\vagas.jpg">
						</a>
					</td>
					<td align="left">
						<a href="Vagas\Vagas.php" target="mainFrame" class="amenu">
						Relacionamento de Vagas
						</a>
					</td>
				</tr>
				<tr>
                    <td></td>
                    <td align="left">
                        <ul>
                            <table id="filho3" cellpadding="0" cellspacing="0" style="display:none">
                            </table>
                        </ul>
                    </td>
                </tr>
			</table>
		</td>
	</tr>
	
	<tr>
		<td>
			<table id="pai4" cellpadding="0" cellspacing="1" border="0">
				<tr>
					<td align="center" width="30" nowrap>
						<a href="javascript:controle(document.all('filho4'),'4')" class="amenu">
						<img border="0" name="sinal4" src="Registros\Registros.jpg">
						</a>
					</td>
					<td align="left">
						<a href="Registros\ConsultaRegistros.php" target="mainFrame" class="amenu">
						Relacionamento de Registros
						</a>
					</td>
				</tr>
				<tr>
                    <td></td>
                    <td align="left">
                        <ul>
                            <table id="filho4" cellpadding="0" cellspacing="0" style="display:none">
                            </table>
                        </ul>
                    </td>
                </tr>
			</table>
		</td>
	</tr>
	
</table>

<br>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center"><a href="\AtividadeFinal\sair.php" class="apretopq" target="_top"><b><font color="#FFFFFF">Logout</font></b></a></td>
    </tr>
</table>

</body>
</html>