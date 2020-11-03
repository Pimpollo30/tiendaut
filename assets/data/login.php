<?php
include("conexion.php");
	$obj = new Conexion();
	$usuario = $_POST["inputUser"];
	$password = $_POST["inputPassword"];
	$res = $obj->buscarUsuario($usuario,$password);
	if ($res == 1) {
		$datos = array('datos' => "ok");
	}else {
		$datos = array('datos' => "no");
	}
	echo json_encode($datos,JSON_FORCE_OBJECT);
?>