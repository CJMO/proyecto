<?php

require_once("entidades/Authentication.php");
require_once("entidades/Bank.php");

class consumoServicios{
	
	private $url_servicio;
	private $auth;
	private $lista_bancos = array();
	private $cliente;
	
	function __construct($usuario, $clave, $opciones_ad){
		$this->url_servicio = "https://test.placetopay.com/soap/pse?wsdl";
		$this->auth = new Authentication($usuario, $clave, $opciones_ad);
		$this->cliente = new SoapClient($this->url_servicio);
	}
	
	/* Generar lista de bancos a partir de uso de servicio web */
	public function generar_lista_bancos($usar_servicio){
		
		$archivo = "./cache/a898ery574.txt";
		$recurso = fopen($archivo, "w+")or die("No se puede abrir el archivo");
		
		if( $usar_servicio == 1 ): // si se habilita consumo de servicio web
			
			$param = array("auth" => $this->auth);
			//$cliente = new SoapClient($this->url_servicio);
			$respuesta = $this->cliente->__soapCall('getBankList', array($param));
			
			/* Asignar lista de bancos */
			foreach($respuesta as $banco){
				fwrite($recurso, $banco["bankCode"].";".$banco["bankName"]."\r\n");
				//$nuevo_banco = new Bank($banco["bankCode"], $banco["bankName"]);				
				//$this->lista_bancos[] = $nuevo_banco;				
			}
		else: /* Simular el uso de servicio web por medio de base de datos de bancos local */
			// cargar entity manager
			require "./bootstrap.php";

			$repositorio_bancos = $entityManager->getRepository('BankDB');
			$bancos = $repositorio_bancos->findAll();
			
			foreach ($bancos as $nuevo_banco) {
				$this->lista_bancos[] = $nuevo_banco;
				//echo sprintf("-%s\n", $nuevo_banco->getBankcode());
				fwrite($recurso, $nuevo_banco->getBankcode().";".$nuevo_banco->getBankName()."\r\n");				
			}		
		endif;
		
		fclose($recurso); /*Cerrar fichero*/
	}
	
	/* Obtener lista de bancos en cache, o generar una nueva versión si esta vencida.
	NOTA: para realziar el consumo del mismo una vez al día, se creará un cron job para vaciar el contenido del archivo 'a898ery574.txt'
	Esta se realizará en un horario cercano a la media noche (se proponen: 11:55 pm o 12:05 am).
	Al realizar esto, se obliga a consumir el servicio web, ya que siempre se valida que el archivo tenga contenido*/
	public function obtener_lista_bancos($usar_servicio){
		try{
			$lista_bancos = array();
			/*Leer archivo cache de lista de bancos*/
			$archivo = "./cache/a898ery574.txt";
			if( file_exists($archivo) ):
				// leer cache
				if( filesize($archivo) > 0 ):
				/* Procesar contenido de archivo */
				$recurso = fopen($archivo, "r+")or die("No se puede abrir el archivo");
				if ($recurso) {
					$datos = explode("\n", fread($recurso, filesize($archivo) ) );
					$total_lineas = count($datos);
					for($i=0; $i<$total_lineas; ++$i){
						$datos_banco = explode(";", $datos[$i] );				
						//print_r($datos_blog);
						if($datos_banco[0]){
							$banco = new Bank($datos_banco[0], $datos_banco[1]);						
							$lista_bancos[] = $banco;
						}
					}
				}
				
				fclose($recurso); /*Cerrar fichero*/
				return $lista_bancos;
					
				else:
					/* Actualizar lista de bancos ya que no hay contenido en el archivo*/
					$this->generar_lista_bancos($usar_servicio);
				endif;
			else:
				$this->generar_lista_bancos($usar_servicio);
			endif;
			
		}catch(Exception $excepcion){
			/*Generar nuevamente lista de bancos*/
			$this->generar_lista_bancos($usar_servicio);
			/*Generar mensaje de error*/
			return "No se pudo obtener la lista de Entidades Financieras, por favor intente más tarde"; 
		}
		
	}
	
	/* Generar la transacción antes de ingresar a la pasarela de pagos */
	public function generar_transaccion($PseTransactionRequest, $usar_servicio){
		if( $usar_servicio == 1 ): // si se habilita consumo de servicio web
			$param = array("auth" => $this->auth, "transaction"=>$PseTransactionRequest);
			$respuesta = $this->cliente->__soapCall('createTransaction', array($param));
			/* Retornar PseTransactionResponse */
			return $respuesta;
		else:
			return array(
			"transactionID" => $PseTransactionRequest->getReference(),
			"sessionID" => "2Thf0noUkR4BdDVMaWbzEgqKCyF8OvZl",
			"returnCode" => "SUCCESS",
			"trazabilityCode" => "asasas48494844784848sas",
			"transactionCycle" => "219875",
			"bankCurrency" => "COP",
			"bankFactor" => "0.0",
			"bankURL" => "https://gateway.test.placetopay.com",
			"responseCode" => "1",
			"responseReasonCode" => "015",
			"responseReasonText" => "Transacción Aprobada"	);
		endif;
	}
	
	/* Obtener respuesta de transacción luego de salir la pasarela de pagos */
	/* Se usará unicamente para la operación createTransaction , no así para createTransactionMultiCredit para efecto de pruebas sobre el proyecto */
	/* En una función padre, se creará un cronJob para ejecutarse cada 15 minutos para transacciones PENDING o que hayan pasado al menos 7 minutos de ingreso al banco (1 o 2 crons) */
	public function informacion_transaccion($id_transaccion, $usar_servicio){
		if( $usar_servicio == 1 ): // si se habilita consumo de servicio web
			$param = array("auth" => $this->auth, "transactionID"=>$id_transaccion);
			$respuesta = $this->cliente->__soapCall('getTransactionInformation', array($param));
			/* Retornar TransactionInformation */
			return $respuesta;
		else:
			return array(
			"transactionID" => $id_transaccion,
			"sessionID" => "2Thf0noUkR4BdDVMaWbzEgqKCyF8OvZl",
			"reference" => "85Thf0noUkRwBjDVMaWbzEgqKCyF8O04",
			"requestDate" => date('c'),
			"bankProcessDate" => date('c', time() + 65),
			"onTest" => "1",
			"returnCode" => "SUCCESS",
			"trazabilityCode" => "asasas48494844784848sas",
			"transactionCycle" => "219875",
			"transactionState" => "PENDING",
			"responseCode" => "1",
			"responseReasonCode" => "016",
			"responseReasonText" => "Transacción pendiente"	);
		endif;
	}
}
?>