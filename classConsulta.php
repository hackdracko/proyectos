<?php
class Consulta{
	public function select($campos, $tabla, $condicion) {
		$stmt = conexionDB :: conecta();
		try {
			////////////////Crea Query////////////////
			$sql = "SELECT $campos FROM $tabla WHERE 1 $condicion;";
			///////////////Ejecuta Query//////////////
		    $result = $stmt->query($sql);
		    /////Muestra los resultados del Query/////
		    $resultado = $result->fetchAll();
		    ////////Cierra conexion de la BD//////////
		    $stmt = null;
		    /////////////Regresa el resultado/////////
			return $resultado;
		} catch (Exception $e) {
		    print "¡Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
	public function selectCompleto($query) {
		$stmt = conexionDB :: conecta();
		try {
			////////////////Crea Query////////////////
			$sql = $query;
			///////////////Ejecuta Query//////////////
		    $result = $stmt->query($sql);
		    /////Muestra los resultados del Query/////
		    $resultado = $result->fetchAll();
		    ////////Cierra conexion de la BD//////////
		    $stmt = null;
		    /////////////Regresa el resultado/////////
			return $resultado;
		} catch (Exception $e) {
		    print "¡Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}	
	public function insert($tabla, $campos, $datos, $array) {
		$stmt = conexionDB :: conecta();
		try {
			$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			/* Begin a transaction, turning off autocommit */
			$stmt->beginTransaction();
			$sql = "INSERT INTO $tabla $campos VALUES $datos;";
			$prepare = $stmt->prepare($sql);
			$prepare->execute($array);
			$lastId = $stmt->lastInsertId();
			$stmt->commit();
			$stmt = null;
			return $lastId;
		  
		} catch (Exception $e) {
			$stmt->rollBack();
			echo "Fallo: " . $e->getMessage();
		}

	}
}
?>		    