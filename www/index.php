<?php

require('../private/config.php');
require_once PATH_CORE.'arduino/Led.php';

$status = "";

if(isset($_GET["status"])){
	$status = $_GET["status"];
	
	try{
		$led = new Led(PORT, PIN);
		$led->conectar();
		switch($status){
			case "on":
				$led->encender();
				break;
			case "off":
				$led->apagar();
				break;
		}
		$led->desconectar();
	}catch(Exception $e){
		echo $e->getMessage();
		$status = "disconnect";
	}
}

?>

<html>
	<head>
		<title>Control de Arduino</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>Control de Arduino</h1>
		
		<p><a href="?status=on" <?php if($status == "on"){?>style="display: none;" <?php } ?>title="Encender led">Encender led</a></p>
		
		<p><a href="?status=off" <?php if($status == "off"){?>style="display: none;" <?php } ?>title="Apagar led">Apagar led</a></p>
		
		<?php if($status == "on"){ ?>
		<p style="color: green;">El led está encendido</p> 
		<?php }else if($status == "off"){ ?>
		<p style="color: red;">El led está apagado</p>
		<?php }else if($status == "disconnect"){ ?>
				<p style="color: red;">El led está desconectado</p>
		<?php } ?>
	</body>
</html>