<?php
session_start();
if (isset($_POST["nombre"]) && isset($_POST["img"])) {
	$_SESSION["nombre"] = $_POST["nombre"];
	$_SESSION["img"] = $_POST["img"];
	echo true;
}
?>