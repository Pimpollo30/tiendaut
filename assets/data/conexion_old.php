<?php
try {
	$con = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8",'root','');
	echo "Conectado a la base de datos<br></br>";
	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	// $stmt = $con->prepare("SELECT nombre FROM usuario WHERE nombre");
	// $stmt->execute();
	// while ($datos = $stmt->fetch()) {
	// 	echo "Nombre : ".$datos[0]."</br>";
	// }

	// $user = "Pimpollo";
	// $stmt = $con->prepare("SELECT nombre,correo_e FROM usuario WHERE nombre_usu = :usuario");
	// $stmt->bindParam(":usuario",$user,PDO::PARAM_STR);
	// // $stmt->execute(array(':usuario'=>$user));
	// $stmt->execute();
	// while ($datos = $stmt->fetch()) {
	// 	echo "Nombre : ".$datos[0]."</br>Correo: ".$datos[1]."<br></br>";
	// }

	// $user = "linkk";
	// $pass = "ok";
	// $nombre = "Federico";
	// $ap = "Martinez";
	// $am = "Teran";
	// $correo = "noob@gmail.com";

	// $stmt = $con->prepare("INSERT INTO usuario VALUES (3,:nombre,:ap,:am,:pass,:correo,:user,'X','0','X','00000','X','XXXXXX','00000000',CURRENT_TIMESTAMP())");
	// $stmt->bindParam(":nombre",$nombre,PDO::PARAM_STR);
	// $stmt->bindParam(":ap",$ap,PDO::PARAM_STR);
	// $stmt->bindParam(":am",$am,PDO::PARAM_STR);
	// $stmt->bindParam(":pass",$pass,PDO::PARAM_STR);
	// $stmt->bindParam(":correo",$correo,PDO::PARAM_STR);
	// $stmt->bindParam(":user",$user,PDO::PARAM_STR);
	// $rows = $stmt->execute();

	// if ($rows == 1) {
	// 	echo "Inserción correcta";
	// }

	$user = "fede";
	$nombre = "Federico";
	// $stmt = $con->prepare("UPDATE usuario SET nombre_usu = :user WHERE nombre = :nom");
	// $rows = $stmt->execute(array(":user"=>$user,":nom"=>$nombre));
	// if ($rows > 0) {
	// 	echo "Modificación correcta";
	// }

	$stmt = $con->prepare("DELETE FROM usuario WHERE nombre_usu = :user");
	$stmt->bindParam(":user",$user,PDO::PARAM_STR);
	$rows = $stmt->execute();
	if ($rows > 0) {
	 	echo "Borrado correcto";
	}

}catch (PDOException $e) {
	echo "Error conectando con la base de datos: ".$e->getMessage();
}
?>