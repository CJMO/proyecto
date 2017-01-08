<?php
	/* Vector que contendrá los datos de la transacción que falten por añadir */
	$datos_transaccion = array();
	
	/* Crear datos de comprador, pagador y receptor*/
	$datos_comprador = array( "document"=>"1152194468", "documenttype"=>"CC", "firstname"=>"Cristian", "lastname"=>"Muñoz Oliveros", "company"=>"CJMO", "emailaddress"=>"cjmo91@gmail.com"
	, "address"=>"Av 37 dg 64", "city"=>"Bello", "province"=>"Antioquia", "country"=>"CO", "phone"=>"4448877", "mobile"=>"3207853636" );
	$buyer = new Person($datos_comprador);
	
	$datos_pagador = array( "document"=>"15304482", "documenttype"=>"CC", "firstname"=>"Petronilo", "lastname"=>"Suárez Pinto", "company"=>"Empresa", "emailaddress"=>"cjmo@gmail.com"
	, "address"=>"Av 37 dg 64", "city"=>"Bello", "province"=>"Antioquia", "country"=>"CO", "phone"=>"4448877", "mobile"=>"3207853636" );
	$payer = new Person($datos_pagador);
	
	$datos_receptor = array( "document"=>"3939270", "documenttype"=>"CC", "firstname"=>"Virgilio", "lastname"=>"Vogdan", "company"=>"Trasteos Ltda", "emailaddress"=>"virgilio@vogdan.com"
	, "address"=>"Av 37 dg 64", "city"=>"Arauquita", "province"=>"Arauca", "country"=>"CO", "phone"=>"3287808", "mobile"=>"312456987" );
	$shipping = new Person($datos_receptor);
	
	$gestor_transaccion = new generarTransaccion();
	
	/* Verificar si pagador y comprador presentan igualdad en #documento y tipo del mismo */
	$gestor_transaccion->add_payer($payer);
	if( $buyer->getDocument() === $payer->getDocument() ):
		if($buyer->getDocumenttype() === $payer->getDocumenttype()):
			print "Mismo pagador y comprador para el producto<BR>";
			$gestor_transaccion->add_buyer(null);
		else:			
			print "Diferente pagador y comprador para el producto<BR>";
			$gestor_transaccion->add_buyer($buyer);
		endif;
	else:
		print "Diferente pagador y comprador para el producto<BR>";
		$gestor_transaccion->add_buyer($buyer);
	endif;
	
	/* Añadir información de receptor, si se especifica */
	$gestor_transaccion->add_shipping($shipping);
	
	/* Obtener lista de bancos, para luego teniendo en cuenta la interfaz escogida por el usuario, desplegar la lista y continuar con la operación */	
	$servicios = new consumoServicios($usuario, $clave, $opciones_ad);
	$lista_bancos = $servicios->obtener_lista_bancos($usar_servicio);
	
	/* Simular estado en el cual se eligió interfaz para lista de bancos a desplegar, banco de destino, además de moneda a usar, etc */
	$interfaz_lista_bancos = "0";
	$codigo_banco = "0187";
	$tipo_moneda = "COP";
	$idioma = "CO";
	
	/*Introducir datos de compra de prueba para generar transacción*/
	$url_retorno = "https://www.placetopay.com/";
	$referencia = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 32); /* Cadena aleatoria de 32 caracteres */
	//print $referencia;
	$descripcion = utf8_encode("Pago de recibo de servicios públicos, # de contrato 278910, correspondiente al mes de Enero de 2017");
	$pago_total = 189.710;
	$impuesto = 0.0;
	$base_devolucion = 0.0;
	$propina = 0.0;
	
	$datos_transaccion["returnURL"] = $url_retorno;
	$datos_transaccion["reference"] = $referencia;
	$datos_transaccion["description"] = $descripcion;
	$datos_transaccion["totalAmount"] = $pago_total;
	$datos_transaccion["taxAmount"] = $impuesto;
	$datos_transaccion["devolutionBase"] = $base_devolucion;
	$datos_transaccion["tipAmount"] = $propina;
		
	/* Asignar datos adicionales */
	$ip = $_SERVER['REMOTE_ADDR'];
	$agente_navegador = $_SERVER['HTTP_USER_AGENT'];
	
	$datos_transaccion["ipAddress"] = $ip;
	$datos_transaccion["userAgent"] = $agente_navegador;
	$datos_transaccion["additionalData"] = null;	
	
	/* Asignar bankCode, bankInterface, currency, language */
	$gestor_transaccion->asignar_datos_monetarios($codigo_banco, $interfaz_lista_bancos, $tipo_moneda, $idioma);
	
	/* Asignar datos faltantes */
	$gestor_transaccion->asignar_datos_compra($datos_transaccion);
	
	/* Obtener el gestor como objeto PseTransactionRequest para generar la transacción completa*/
	$PseTransactionRequest = $gestor_transaccion->getPseTransactionRequest();
	
	/* Generar transacción */
	$respuesta = $servicios->generar_transaccion($PseTransactionRequest, $usar_servicio);	
?>