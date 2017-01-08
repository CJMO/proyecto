<?php
/* Simular p�gina de respuesta de la compa�ia, a la cual se redirige una vez finaliza la transacci�n en la pasarela de pagos, a continuaci�n se procesan los resultados */

/* Obtener respuesta arrojada por el servicio web 'getTransactionInformation' */
//$id_transaccion = "2Thf0noUkR4BdDVMaWbzEgqKCyF8OvZl"; //  Identificador de prueba
$id_transaccion = $respuesta["transactionID"]; //  Identificador de prueba
$resultado_transaccion = $servicios->informacion_transaccion($id_transaccion, $usar_servicio);

/* Crear instancia de TransactionInformation con lo obtenido de la llamada al servicio web para procesar */
$transactionInformation = new TransactionInformation();

$transactionInformation->setTransactionid( $resultado_transaccion['transactionID'] );
$transactionInformation->setTransactionstate( $resultado_transaccion['transactionState'] );

/* En caso de alg�n error en la respuesta, se deber� crear un mecanismo para validar esta situaci�n por parte del desarrollador */
if( $resultado_transaccion===null ):
	print "Se ha producido un error al procesar su transacci�n<BR>";
	return;
endif;

/* Verificar estado de la transacci�n y mostrar mensaje de la respuesta al comprador */
if( $transactionInformation->getTransactionstate() == "OK" ):
	// Transacci�n autorizada
	print "Su transacci�n, con identificador <strong>{$transactionInformation->getTransactionid()}</strong> ha sido realizada con exito, gracias por su compra, en breve nos comunicaremos para informar sobre el proceso de env�o de su producto";
	
elseif( $transactionInformation->getTransactionstate() == "PENDING" ):
	// Transacci�n sin respuesta del banco
	print "Su transacci�n, con identificador <strong>{$transactionInformation->getTransactionid()}</strong> se encuentra pendiente de aprobaci�n por parte de la entidad financiera, en cuanto obtengamos la respuesta del pago, le informaremos el proceso a seguir";
elseif( $transactionInformation->getTransactionstate() == "NOT_AUTHORIZED" ):
	// Transacci�n sin respuesta del banco
	print "Su transacci�n, con identificador <strong>{$transactionInformation->getTransactionid()}</strong> no ha sido autorizada por parte de la entidad financiera";
elseif( $transactionInformation->getTransactionstate() == "FAILED" ):
	// Transacci�n sin respuesta del banco
	print "Ocuri� un error al procesar su transacci�n con identificador <strong>{$transactionInformation->getTransactionid()}</strong>, por favor verifique los datos de pago y realice nuevament el proceso";
endif;

/* En este punto la respuesta es mostrada al usuario, en caso de que se encuentre con estado 'PENDING' se har� uso de un cron job 
para verificar en un intervalo de tiempo definido para obtener respuesta definitiva del estado de la transacci�n */

/* Se crea una funci�n que agregue la transacci�n sin respuesta o pendiente, a la lista de transacciones que se monitorear�n cada intervalo de tiempo definido
Para este se plantean dos funciones: una para revisar las solicitudes que no han sido completadas luego de m�nimo 7 minutos (se definir� un tiempo de 10 minutos).
La segunda para aquellas transacciones que estan con estado 'PENDING', se repetir� cada 15 minutos */

/*En el archivo "crons.php" en la ruta principal del proyecto se encuentra la informaci�n de los Cron jobs planteados para ejecutar*/
	
?>



