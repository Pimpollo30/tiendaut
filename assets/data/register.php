<?php
include("conexion.php");
if (!(empty($_POST["inputUser"]) && empty($_POST["inputName"]) && empty($_POST["inputLastname"]) && empty($_POST["inputPassword"]) && empty($_POST["inputRepeatPassword"]) && empty($_POST["inputEmail"]) && empty($_POST["inputStreet"]) && empty($_POST["inputNo"]) && empty($_POST["inputCP"]) && empty($_POST["inputCity"]) && empty($_POST["inputState"]) && empty($_POST["inputPhone"]))) {
	$obj = new Conexion();

	$user = $_POST["inputUser"];
	$name = $_POST["inputName"];
	$lastname = $_POST["inputLastname"];
	$lastname2 = $_POST["inputLastname2"];
	$pass = $_POST["inputPassword"];
	$repeatPass = $_POST["inputRepeatPassword"];
	$email = $_POST["inputEmail"];
	$street = $_POST["inputStreet"];
	$no = $_POST["inputNo"];
	$cp = $_POST["inputCP"];
	$city = $_POST["inputCity"];
	$state = $_POST["inputState"];
	$rfc = $_POST["inputRFC"];
	$phone = $_POST["inputPhone"];

	if ($pass != $repeatPass) {
		$datos = array('datos' => 'Las contraseñas NO coinciden');
		echo json_encode($datos,JSON_FORCE_OBJECT);
		return;
	}
	$ins = $obj->registrarUsuario($user, $name, $lastname, $lastname2, $pass, $email, $street, $no, $cp, $city, $state, $rfc, $phone);
	if ($ins) {
		$datos = array('datos' => 'ok');
	}else {
		$datos = array('datos' => 'Hubo un inconveniente al tratar de registrar');
	}
}else {
	$datos = array('datos' => 'No rellenaste todos los campos');
}
	echo json_encode($datos,JSON_FORCE_OBJECT);
?>