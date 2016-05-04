<?php

/**
 * Control de un objeto de Arduino.
 */
class Arduino{

	/********************************** ATRIBUTOS **********************************/
	
	/**
	 * Puerto con el que nos comunicamos.
	 * @var string
	 */
	private $puerto;
	
	/**
	 * Manejador del puerto.
	 * @var file
	 */
	private $manejador;

	/******************************** CONSTRUCTORES ********************************/

	/**
	 * Constructor que abre un puerto.
	 * @param string $puerto: nombre del puerto a abrir.
	 */
	public function Arduino($puerto) {
		$this->puerto = $puerto;	
	}
		
	/****************************** FUNCIONES PÚBLICAS *****************************/
	
	/**
	 * Abre el puerto.
	 */
	public function Conectar(){		
		//mode: BAUD=9600 PARITY=N data=8 stop=1 xon=off`;
		
		//Abrimos el puerto (para mayores de 9: "\\\\.\\COM10");
		$this->manejador = fopen ($this->puerto, "w+");
		
		if (!$this->manejador) {
			throw new Exception("No se ha encontrado ninguna placa conectada al puerto ".$this->puerto);
		}
	}
	
	/**
	 * Escribe una orden en un puerto.
	 * @param string $orden: orden a escribir.
	 */
	public function Escribir($orden){
		fputs ($this->manejador, $orden);
	}
	
	/**
	 * Cierra el puerto.
	 */
	public function Desconectar(){
		fclose ($this->fp);
	}
	
	/***************************** FUNCIONES PROTEGIDAS ****************************/
	
	/****************************** FUNCIONES PRIVADAS *****************************/
	

}

?>