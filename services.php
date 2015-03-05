<?php
require_once('loadFiles.php');
$consulta = new Consulta();
if(isset($_REQUEST["insertaTipo"])){
	$descTipo = $_REQUEST['tipo'];
	if(isset($descTipo)){
		$arrayInsert = array(':descripcion' => $descTipo);
		$consulta->insert("tipo_unidad", "(descripcion)", "(:descripcion)", $arrayInsert);
	}
	$selectTipo = Consulta :: select("*", "tipo_unidad", null);
	$resultado = array();
	foreach ($selectTipo as $value) {
	 	array_push($resultado, array("id" => $value["id_tipo_unidad"],
	 									"desc" => $value["descripcion"]
	 								));
	}
	//header("application/json utf6")
 	exit(json_encode($resultado));
}
if(isset($_REQUEST["insertaUnidad"])){
	$descUnidad = $_REQUEST['unidad'];
	if(isset($descUnidad)){
		$arrayInsert = array(':descripcion' => $descUnidad);
		$consulta->insert("unidad_medida", "(descripcion)", "(:descripcion)", $arrayInsert);
	}
	$selectMedida = Consulta :: select("*", "unidad_medida", null);
	$resultado = array();
	foreach ($selectMedida as $value) {
	 	array_push($resultado, array("id" => $value["id_unidad_medida"],
	 									"desc" => $value["descripcion"]
	 								));
	}
	echo json_encode($resultado);
}
if(isset($_REQUEST["insertaMedicamento"])){
	$tipo = $_REQUEST['tipo'];
	$cantidad = $_REQUEST['cantidad'];
	$unidad = $_REQUEST['unidad'];
	$medicamento = $_REQUEST['medicamento'];
	if(isset($tipo)){
		$arrayInsert = array(':id_tipo_unidad' => $tipo,
								':id_unidad_medida' => $unidad,
								':descripcion' => $medicamento,
								':cantidad' => $cantidad);
		$consulta->insert("medicamento", "(id_tipo_unidad, id_unidad_medida, descripcion, cantidad)", 
											"(:id_tipo_unidad, :id_unidad_medida, :descripcion, :cantidad)", $arrayInsert);
	}
	$sql = "SELECT
				m.id_medicamento AS id_medicamento,
				u.descripcion AS descU,
				um.descripcion AS descUM,
				m.cantidad AS cantidad,
				m.descripcion AS descM
			FROM medicamento m
			INNER JOIN tipo_unidad u ON m.id_tipo_unidad = u.id_tipo_unidad
			INNER JOIN unidad_medida um ON m.id_unidad_medida = um.id_unidad_medida;";
	$selectMedicamento = Consulta :: selectCompleto($sql);
	$resultado = array();
	foreach ($selectMedicamento as $value) {
	 	array_push($resultado, array("id_medicamento" => $value["id_medicamento"],
	 									"descU" => $value["descU"],
	 									"descUM" => $value["descUM"],
	 									"cantidad" => $value["cantidad"],
	 									"descM" => $value["descM"]
	 								));
	}
	echo json_encode($resultado);
}
if(isset($_REQUEST["insertaIngrediente"])){
	$tipo = $_REQUEST['tipo'];
	$cantidad = $_REQUEST['cantidad'];
	$unidad = $_REQUEST['unidad'];
	$ingrediente = $_REQUEST['ingrediente'];
	$idMedic = $_REQUEST['idMedic'];
	if(isset($tipo)){
		$arrayInsert = array(':id_tipo_unidad' => $tipo,
								':id_unidad_medida' => $unidad,
								':descripcion' => $ingrediente,
								':cantidad' => $cantidad);
		$lastIdIngrediente = $consulta->insert("ingrediente", "(id_tipo_unidad, id_unidad_medida, descripcion, cantidad)", 
											"(:id_tipo_unidad, :id_unidad_medida, :descripcion, :cantidad)", $arrayInsert);
		$arrayInsertRelacion = array(':id_medicamento' => $idMedic,
								':id_ingrediente' => $lastIdIngrediente);
		$lastIdIngrediente = $consulta->insert("medicamento_ingrediente", "(id_medicamento, id_ingrediente)", 
											"(:id_medicamento, :id_ingrediente)", $arrayInsertRelacion);		
	}
	$sql = "SELECT
				i.id_ingrediente AS id_ingrediente,
				u.descripcion AS descU,
				um.descripcion AS descUM,
				i.cantidad AS cantidad,
				i.descripcion AS descI
			FROM medicamento m
			INNER JOIN medicamento_ingrediente mi on m.id_medicamento = mi.id_medicamento
			INNER JOIN ingrediente i on i.id_ingrediente = mi.id_ingrediente
			INNER JOIN tipo_unidad u ON m.id_tipo_unidad = u.id_tipo_unidad
			INNER JOIN unidad_medida um ON m.id_unidad_medida = um.id_unidad_medida
			WHERE m.id_medicamento = ".$idMedic.";";
	$selectIngrediente = Consulta :: selectCompleto($sql);
	$resultado = array();
	foreach ($selectIngrediente as $value) {
	 	array_push($resultado, array("id_ingrediente" => $value["id_ingrediente"],
	 									"descU" => $value["descU"],
	 									"descUM" => $value["descUM"],
	 									"cantidad" => $value["cantidad"],
	 									"descI" => $value["descI"]
	 								));
	}
	echo json_encode($resultado);
}
/*$usuario = new Usuario();
$usuario->setNombre("test");
echo $usuario->getNombre();
//$s = Consulta :: select("*", "usuario", null);
//print_r($s);
$usuario = new Usuario();
$consulta = new Consulta();
$usuario->setNombre("test");

$arrayInsert = array(':nombre' => 'test2', ':app' => 'test2');
//$consulta->insert("usuario", "(nombre, app)", "(:nombre, :app)", $arrayInsert);

$select = $consulta->select("*", "usuario", "LIMIT 10");

foreach ($select as $value) {
	echo $value['app'];
	# code...
}*/
?>