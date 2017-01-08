<?php
require_once("./entidades/PseTransactionRequest.php");

class generarTransaccion{

	/* Elemento de tipo PseTransactionRequest */
	private $gestor;
		
	function __construct(){
		/* Instanciar el controlador de la transacción actual */
		$this->gestor = new PseTransactionRequest();
	}
	
	public function getPseTransactionRequest(){
		return $this->gestor;
	}
	
	public function add_payer($pagador){
			
		/* Verificar que el objeto proporcionado es de tipo "Person" */	
		if (is_a($pagador, 'Person')){
			$this->gestor->setPayer($pagador);
		}
		else{
			/* Generar mensaje de error */
			print ("Parámetro de pagador no especificado correctamente en función generarTransaccion->add_payer."); return;
		}
		
		// crear PSETransactionRequest y asignar payer		
	}
	
	public function add_buyer($comprador){
		
		/* Verificar que el objeto proporcionado es de tipo "Person" */	
		if (is_a($comprador, 'Person')){
			$this->gestor->setBuyer($comprador);
		}
		else{
			/* Generar mensaje de error */
			print ("Parámetro de comprador no especificado correctamente en función generarTransaccion->add_buyer."); return;
		}		
	}
	
	public function add_shipping($receptor){
		
		/* Verificar que el objeto proporcionado es de tipo "Person" */	
		if (is_a($receptor, 'Person')){
			$this->gestor->setShipping($receptor);
		}
		else{
			/* Generar mensaje de error */
			print ("Parámetro de receptor no especificado correctamente en función generarTransaccion->add_buyer."); return;
		}		
	}
	
	public function asignar_datos_monetarios($codigo_banco, $interfaz_lista_bancos, $tipo_moneda, $idioma){
		$this->gestor->setBankcode($codigo_banco);
		$this->gestor->setBankinterface($interfaz_lista_bancos);
		$this->gestor->setCurrency($tipo_moneda);
		$this->gestor->setLanguage($idioma);
	}
	
	public function asignar_datos_compra($datos_transaccion){
		
		$this->gestor->setReturnurl($datos_transaccion["returnURL"]);
		$this->gestor->setReference($datos_transaccion["reference"]);
		$this->gestor->setDescription($datos_transaccion["description"]);
		$this->gestor->setTotalamount($datos_transaccion["totalAmount"]);
		$this->gestor->setTaxamount($datos_transaccion["taxAmount"]);		
		$this->gestor->setDevolutionBase($datos_transaccion["devolutionBase"]);
		$this->gestor->setTipamount($datos_transaccion["tipAmount"]);
		$this->gestor->setIpaddress($datos_transaccion["ipAddress"]);
		$this->gestor->setUseragent($datos_transaccion["userAgent"]);
		$this->gestor->setAdditionaldata($datos_transaccion["additionalData"]);
	}
}
?>