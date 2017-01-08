<?php
	/* Procesar respuesta del servicio web */
	/* Recordar que la variable $respuesta guarda los datos retornados por el servicio web */

	/* crear objeto PseTransactionResponse */		
	//$PseTransactionResponse = new PseTransactionResponse(); // no se usa para insertar en base de datos
		
	/* En vez de usar la clase entidades/PseTransactionResponse, se usar� entidades/DB/PseTransactionResponseDB
	Ya que cuenta con las configuraciones para persistencia en base de datos que se realizar�,
	cabe resaltar que ambas entidades son compatibles */
	require_once("entidades/BD/PseTransactionResponseDB.php");
	$PseTransactionResponse = new \Entities\PseTransactionResponseDB();
		
	/* Tomar datos de respuesta para crear instancia de 'PseTransactionResponse', en caso de ser efectiva la creaci�n de la transacci�n */
	
	if( $respuesta["returnCode"] == "SUCCESS" ):
			
		$PseTransactionResponse->setTransactionid( $respuesta["transactionID"] );
		$PseTransactionResponse->setSessionid( $respuesta["sessionID"] );
		$PseTransactionResponse->setReturncode( $respuesta["returnCode"] );
		$PseTransactionResponse->setTrazabilitycode( $respuesta["trazabilityCode"] );
		$PseTransactionResponse->setTransactioncycle( $respuesta["transactionCycle"] );
		$PseTransactionResponse->setBankcurrency( $respuesta["bankCurrency"] );
		$PseTransactionResponse->setBankfactor( $respuesta["bankFactor"] );
		$PseTransactionResponse->setBankurl( $respuesta["bankURL"] );
		$PseTransactionResponse->setResponsecode( $respuesta["responseCode"] );
		$PseTransactionResponse->setResponsereasoncode( $respuesta["responseReasonCode"] );
		$PseTransactionResponse->setResponsereasontext( $respuesta["responseReasonText"] );
				
		// cargar entity manager
		require "bootstrap.php";
		// guardar en BD	
		$entityManager->persist($PseTransactionResponse);
		$entityManager->flush();				
	
		/* Luego de obtener los datos, se procede a realizar la redirecci�n a la URL de la pasarela de pagos del banco en menci�n, se obvia el proceso para efectos de esta prueba */
		$URL = $PseTransactionResponse->getBankurl();
		//header('Location: '.$URL);
	
	else:
		/* Obtener mensaje de respuesta y generar alerta sobre el mismo */
		$mensaje_error = $PseTransactionResponse->getResponsereasontext();
		print "Se ha producido un error al procesar su transacci�n: {$mensaje_error} Por favor int�ntelo m�s tarde<BR>";
	
	endif;
?>