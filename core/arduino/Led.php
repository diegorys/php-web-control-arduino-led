<?php

namespace Arduino;

use Arduino\Arduino;

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
	public function __construct($puerto, $pin) {
		parent::__construct($puerto);	
		$this->pin = $pin;
		parent::escribir($this->pin);
	}
		
	/****************************** FUNCIONES PÚBLICAS *****************************/
	
	/**
	 * Enciende el led.
	 */
	public function encender(){
		parent::escribir("101");
	}
	
	/**
	 * Apaga el led.
	 */
	public function apagar(){
		parent::escribir("100");
	}

}
