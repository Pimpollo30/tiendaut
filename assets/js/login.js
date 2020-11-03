$(document).ready(function() {
	$("#btnLogin").click(function(e){
		e.preventDefault();
		mostrarDato();
	});

	async function mostrarDato() {
		const data = new FormData(document.getElementById("formulario"));
		await fetch("assets/data/login.php",{
			method:"POST",
			body: data,
		}).then(response => response.json()
		).then(response => {
			console.log(response);
			if (response.datos == "ok"){
				location.href="principal.php";
			}else {
				alert("Datos incorrectos");
			}
		}).catch(err => {
			console.log(err);
		});
	}

});