$(document).ready(function() {
	$("#btnRegister").click(function(e){
		e.preventDefault();
		registrar();
	});

		async function registrar() {
		const data = new FormData(document.getElementById("registro"));
		await fetch("assets/data/register.php",{
			method:"POST",
			body: data,
		}).then(response => response.json()
		).then(response => {
			console.log(response);
			if (response.datos == "ok"){
				location.href="index.html";
			}else {
				alert(response.datos);
			}
		}).catch(err => {
			console.log(err);
		});
	}
});