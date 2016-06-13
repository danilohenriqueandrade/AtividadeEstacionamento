
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
    <head>
        <title>Sistema Estacionamento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php
			if(file_exists("../init.php")){
				require_once "../init.php";
			} else {
				die("Arquivo de init não encontrado");
			}

			require_once "../seguranca.php";

				
		?>
    </head>
    <frameset rows="*" cols="200,*" frameborder="1">
        <frame src="menu.php" name="leftFrame" frameborder="1" scrolling="auto" bordercolor="#CCCCCC">
        <frame src="blank.html" name="mainFrame" marginheight="15" frameborder="1" scrolling="auto" bordercolor="#CCCCCC">
        <!-- Retirado frame superior pois ListaWorkflow não está sendo utilizado (21/03/2006)-->
        <!--<frameset rows="80,*" frameborder="NO" border="0" framespacing="0">
            <frame src="ListaWorkflow.jsp" name="topFrame" frameborder="yes" bordercolor="#CCCCCC" border="2">
            <frame src="branco.jsp" name="mainFrame" frameborder="yes" scrolling="auto" bordercolor="#CCCCCC">
        </frameset>-->
    </frameset>
</html>
