<?php
	class Conexion {
		function conectar() {
			$conn = null;
			try {
				$conn = new PDO("mysql:host=localhost;dbname=tienda",'root','');
				$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				return $conn;
			}catch (PDOException $e) {
				echo "Error conectando con la base de datos: ".$e->getMessage();
			}
			return $conn;
		}

		function buscarUsuario($user,$pass) {
			$con = $this->conectar();
			$stmt = $con->prepare("SELECT * FROM usuario WHERE nombre_usu = :user AND contrasena = :pass");
			$stmt->bindParam(":user",$user,PDO::PARAM_STR);
			$stmt->bindParam(":pass",$pass,PDO::PARAM_STR);
			$stmt->execute();
			$registro = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$numRegistros = count($registro);
			return $numRegistros;
		}

		function registrarUsuario($user, $name, $lastname, $lastname2, $pass, $email, $street, $no, $cp, $city, $state, $rfc, $phone) {
			$estado = false;
			$con = $this->conectar();
			$stmt = $con->prepare("INSERT INTO usuario (nombre_usu,nombre,ap_paterno,ap_materno,contrasena,correo_e,calle,numero,codigo_postal,ciudad,estado,rfc,tel,fecha_reg) VALUES (:user,:name,:ap_p,:ap_m,:pass,:email,:street,:no,:cp,:city,:state,:rfc,:phone,CURRENT_TIMESTAMP())");
			$stmt->bindParam(":user",$user,PDO::PARAM_STR);
			$stmt->bindParam(":name",$name,PDO::PARAM_STR);
			$stmt->bindParam(":ap_p",$lastname,PDO::PARAM_STR);
			$stmt->bindParam(":ap_m",$lastname2,PDO::PARAM_STR);
			$stmt->bindParam(":pass",$pass,PDO::PARAM_STR);
			$stmt->bindParam(":email",$email,PDO::PARAM_STR);
			$stmt->bindParam(":street",$street,PDO::PARAM_STR);
			$stmt->bindParam(":no",$no,PDO::PARAM_STR);
			$stmt->bindParam(":cp",$cp,PDO::PARAM_STR);
			$stmt->bindParam(":city",$city,PDO::PARAM_STR);
			$stmt->bindParam(":state",$state,PDO::PARAM_STR);
			$stmt->bindParam(":rfc",$rfc,PDO::PARAM_STR);
			$stmt->bindParam(":phone",$phone,PDO::PARAM_STR);
			if ($stmt->execute()) {
				$estado = true;
			}
			return $estado;
		}
	}

?>