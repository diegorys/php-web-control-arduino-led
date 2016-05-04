<?php

require_once PATH_CORE.'arduino/Arduino.php';

/**
 * Control de un led.
 */
class Led extends Arduino{

	/********************************** ATRIBUTOS **********************************/
	
	/**
	 * Pin donde está colocado el led.
	 * @var string
	 */
	private $pin;

	/******************************** CONSTRUCTORES ********************************/

	/**
	 * Constructor que abre un puerto.
	 * @param string $puerto: nombre del puerto a abrir.
	 */
	public function Led($puerto, $pin) {
		parent::Arduino($puerto);	
		$this->pin = $pin;
	}
		
	/****************************** FUNCIONES PÚBLICAS *****************************/
	
	/**
	 * Enciende el led.
	 */
	public function encender(){
		parent::Escribir("2");
	}
	
	/**
	 * Apaga el led.
	 */
	public function apagar(){
		parent::Escribir("1");
	}
	
	/***************************** FUNCIONES PROTEGIDAS ****************************/
	
	/****************************** FUNCIONES PRIVADAS *****************************/
	

}
