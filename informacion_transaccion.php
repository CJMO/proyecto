<?php
/* Simular página de respuesta de la compañia, a la cual se redirige una vez finaliza la transacción en la pasarela de pagos, a continuación se procesan los resultados */

/* Obtener respuesta arrojada por el servicio web 'getTransactionInformation' */
//$id_transaccion = "2Thf0noUkR4BdDVMaWbzEgqKCyF8OvZl"; //  Identificador de prueba
$id_transaccion = $respuesta["transactionID"]; //  Identificador de prueba
$resultado_transaccion = $servicios->informacion_transaccion($id_transaccion, $usar_servicio);

/* Crear instancia de TransactionInformation con lo obtenido de la llamada al servicio web para procesar */
$transactionInformation = new TransactionInformation();

$transactionInformation->setTransactionid( $resultado_transaccion['transactionID'] );
$transactionInformation->setTransactionstate( $resultado_transaccion['transactionState'] );

/* En caso de algún error en la respuesta, se deberá crear un mecanismo para validar esta situación por parte del desarrollador */
if( $resultado_transaccion===null ):
	print "Se ha producido un error al procesar su transacción<BR>";
	return;
endif;

/* Verificar estado de la transacción y mostrar mensaje de la respuesta al comprador */
if( $transactionInformation->getTransactionstate() == "OK" ):
	// Transacción autorizada
	print "Su transacción, con identificador <strong>{$transactionInformation->getTransactionid()}</strong> ha sido realizada con exito, gracias por su compra, en breve nos comunicaremos para informar sobre el proceso de envío de su producto";
	
elseif( $transactionInformation->getTransactionstate() == "PENDING" ):
	// Transacción sin respuesta del banco
	print "Su transacción, con identificador <strong>{$transactionInformation->getTransactionid()}</strong> se encuentra pendiente de aprobación por parte de la entidad financiera, en cuanto obtengamos la respuesta del pago, le informaremos el proceso a seguir";
elseif( $transactionInformation->getTransactionstate() == "NOT_AUTHORIZED" ):
	// Transacción sin respuesta del banco
	print "Su transacción, con identificador <strong>{$transactionInformation->getTransactionid()}</strong> no ha sido autorizada por parte de la entidad financiera";
elseif( $transactionInformation->getTransactionstate() == "FAILED" ):
	// Transacción sin respuesta del banco
	print "Ocurió un error al procesar su transacción con identificador <strong>{$transactionInformation->getTransactionid()}</strong>, por favor verifique los datos de pago y realice nuevament el proceso";
endif;

/* En este punto la respuesta es mostrada al usuario, en caso de que se encuentre con estado 'PENDING' se hará uso de un cron job 
para verificar en un intervalo de tiempo definido para obtener respuesta definitiva del estado de la transacción */

/* Se crea una función que agregue la transacción sin respuesta o pendiente, a la lista de transacciones que se monitorearán cada intervalo de tiempo definido
Para este se plantean dos funciones: una para revisar las solicitudes que no han sido completadas luego de mínimo 7 minutos (se definirá un tiempo de 10 minutos).
La segunda para aquellas transacciones que estan con estado 'PENDING', se repetirá cada 15 minutos */

/*En el archivo "crons.php" en la ruta principal del proyecto se encuentra la información de los Cron jobs planteados para ejecutar*/
	
?>



