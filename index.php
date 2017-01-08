<?php
	/*
	En este script se usar�n las funciones creadas para el uso de servicios web al momento de crear transacciones financieras.
	Se simular� el uso de dichas porciones de c�digo en un proyecto independiente, que use las interfaces para usar la integraci�n con la plataforma a usar
	*/

	//header('Content-Type: text/html; charset=utf-8');
	
	// cargar entidades	para gestionar transacci�n
	require_once("entidades/PseTransactionRequest.php");
	require_once("entidades/PseTransactionResponse.php");
	require_once("entidades/TransactionInformation.php");
	require_once("entidades/Person.php");
	require_once("entidades/Bank.php");
	require_once("./componentes/generarTransaccion.php");
	require_once("./componentes/consumoServicios.php");
	
	/* Credenciales de autenticaci�n para servicios web */
	$usuario = '6dd490faf9cb87a9862245da41170ff2';
	$clave = '024h1IlD';
	$opciones_ad = null;
	
$login = "6dd490faf9cb87a9862245da41170ff2";
$tranKey = "024h1IlD";
$seed = date('c');
$hashString = sha1( $seed. $tranKey , false );
	
$proxy = new SoapClient('https://test.placetopay.com/soap/pse?wsdl'); 
$sessionId = $proxy->getBankList($login, $hashString, $seed );

return;	

	$usar_servicio = 0; // 0: datos de prueba local; 1: servicio web
	
	/* Script con instrucciones para generaci�n de transacci�n: PSETransactionRequest */
	require_once("crear_transaccion.php");
	
	/* Script con instrucciones para tomar la respuesta de transacci�n: PSETransactionResponse */
	require_once("respuesta_transaccion.php");
	
	/* Script con instrucciones para procesar el estado de transacci�n luego de ingresar a pasarela de pagos del banco: TransactionInformation */
	require_once("informacion_transaccion.php");
	
?>