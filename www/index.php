<?php

error_reporting(0);

$path = str_replace("www", "", $_SERVER["DOCUMENT_ROOT"]);

require_once $path.'/core/arduino/Arduino.php';
require_once $path.'/core/arduino/Led.php';

use Arduino\Led;

define('PORT', "\\\\.\\COM8"); //Puerto serie al que está conectada tu placa.
define('PIN', 12); //Pin al que está conectado el led.

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
		$status = $e->getMessage();
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Control web de un led</title>
		<meta charset="UTF-8">
		<style>
			body {
				background-color:#e6e6e6;
				font-family: "Arial", Georgia, Serif;
				margin: 0;
			}
			h1 {
				color:#1e73be;
				text-align: center;
			}
			h1 a{
				color:#1e73be;
				text-align: center;
				text-decoration: none;
			}
			.main {
				margin: 0 auto;
				max-width: 500px;
				width: 100%;
				background-color: #FFFFFF;
				padding: 2em 0 1em 0;
				text-align: center;
			}
			.button {
				display: block;
				margin: 0 auto;
				color:#09f;
				text-decoration: none;
				padding: 1em 0;
				width: 80%;
				border: solid 1px #000000;
			}
			.button--on {
				background-color: #01DF01;
				color: #FFFFFF;
			}
			.button--off {
				background-color: #FE2E2E;
				color: #FFFFFF;
			}
			.status{
				padding-top: 1em;
			}
			.footer {
				padding: 1em 0;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<header>
			<h1><a href="/" title="Control web de un led">Control web de un led</a></h1>
		</header>
		<main class="main">
		<form name="form" action="">	
			<section class="buttons">
				<p><a class="button button--on" href="?status=on" <?php if($status == "on"){?>style="display: none;" <?php } ?>title="Encender led">Encender led</a></p>
				
				<p><a class="button button--off" href="?status=off" <?php if($status == "off"){?>style="display: none;" <?php } ?>title="Apagar led">Apagar led</a></p>
			</section>
			<section class="status">				
				<?php if($status == "on"){ ?>
				<p style="color: green;">El led está encendido</p> 
				<?php }else if($status == "off"){ ?>
				<p style="color: red;">El led está apagado</p>
				<?php }else if($status != ""){ ?>
				<p style="color: red;"><?php echo $status; ?></p>
				<?php } ?>
			</section>
		</form>
		</main>
		<footer class="footer">
			<a href="http://diegorys.es" title="DiegoRyS" target="_blank">http://diegorys.es</a>
		</footer>
	</body>
</html>