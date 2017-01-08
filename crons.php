<?php

/* El siguiente cronJob con definición:  wget -N -q https://www.empresa.com/transacciones/crons/actualizar_solicitudes_sin_respuesta
Contendrá la siguiente porción de código, programado para cada 10 minutos */
function actualizar_solicitudes_sin_respuesta(){
	
	// cargar entity manager
	require "bootstrap.php";	
	
	/* Suponemos que en una base de datos interna se guardan los datos de tipo TransactionInformation de todas las transacciones */
	require_once("entidades/BD/TransactionInformationDB.php");	
	$repositorio_transacciones = $entityManager->getRepository('TransactionInformationDB');
	/* Asumimos que para las transacciones abandonadas, rompiendo su flujo normal, presentan un 'transactionstate' sin valor alguno en la base de datos */
	$transacciones = $repositorio_transacciones->findBy( array('transactionstate' => ''));

	/* Ahora para cada transacción se realiza la llamada del servicio web getTransactionInformation para consultar su estado actual */
	foreach ($transacciones as $transaccion) {		
		$resultado_busqueda = $servicios->informacion_transaccion($transaccion->getTransactionid(), $usar_servicio);

		date_default_timezone_set('America/Bogota'); // asignar zona para la fecha
		
		$fecha_anuncio = new DateTime( $resultado_busqueda["requestDate"] );
		$fecha_actual = new DateTime();
		
		$diferencia = $fecha_actual->diff($fecha_anuncio); // la propiedad "i" almacena los minutos correspondientes a la fecha
		/* Verificar si tiene al menos 10 minutos de longevidad */
		if($diferencia->i >= 10): //print "Se creó hace más de 7 minutos"; else print "Se creó hace menos de 7 minutos";
			
			/* Verificar su estado y asignar cambio del mismo(si lo hay en la respuesta) en la base de datos local */
			if( $resultado_busqueda["transactionState"] != "" ):
				$transaccion->setTransactionstate( $resultado_busqueda["transactionState"] );
				// actualizar en BD	
				$entityManager->persist($transaccion);
				$entityManager->flush();
			endif;
		endif;
	}	
}

/* El siguiente cronJob con definición:  wget -N -q https://www.empresa.com/transacciones/crons/actualizar_solicitudes_pendientes
Contendrá la siguiente porción de código, programado para cada 15 minutos */
function actualizar_solicitudes_pendientes(){
	
	// cargar entity manager
	require "bootstrap.php";
	
	/* Suponemos que en una base de datos interna se guardan los datos de tipo TransactionInformation de todas las transacciones */
	require_once("entidades/BD/TransactionInformationDB.php");	
	$repositorio_transacciones = $entityManager->getRepository('TransactionInformationDB');
	/* Se buscan las transacciones pendientes de aprobación */
	$transacciones = $repositorio_transacciones->findBy( array('transactionstate' => 'PENDING'));

	/* Ahora para cada transacción se realiza la llamada del servicio web getTransactionInformation para consultar su estado actual */
	foreach ($transacciones as $transaccion) {		
		$resultado_busqueda = $servicios->informacion_transaccion($transaccion->getTransactionid(), $usar_servicio);
		
		date_default_timezone_set('America/Bogota'); // asignar zona para la fecha		
		$fecha_anuncio = new DateTime( $resultado_busqueda["requestDate"] );
		$fecha_actual = new DateTime();
		
		$diferencia = $fecha_actual->diff($fecha_anuncio); // la propiedad "i" almacena los minutos correspondientes a la fecha
		/* Verificar si tiene al menos 15 minutos de longevidad */
		if($diferencia->i >= 15):		
			/* Verificar su estado y asignar cambio del mismo(si lo hay en la respuesta) en la base de datos local */
			if( $resultado_busqueda["transactionState"] != "PENDING" ):
				$transaccion->setTransactionstate( $resultado_busqueda["transactionState"] );
				// actualizar en BD	
				$entityManager->persist($transaccion);
				$entityManager->flush();
			endif;
		endif;
	}	
}

/* Cronjob para borrar contenido de cache de bancos (para ejecutar cerca a la media noche) 
wget -N -q https://www.empresa.com/transacciones/crons/vaciar_cache_bancos */
	function vaciar_cache_bancos(){
		$archivo = "./cache/a898ery574.txt";
	if( file_exists($archivo) ):
		// vaciar cache
		$recurso = fopen($archivo, "w+")or die("No se puede abrir el archivo");
		fwrite($recurso, "");
		fclose($recurso); /*Cerrar fichero*/		
	else: print $recurso = fopen($archivo, "w+"); //"crear archivo vacío si no existe";
	endif;

	}

?>