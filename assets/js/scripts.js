	 function checkSubmit() {
		document.getElementById("boton_submit").value = "Enviando...";
		document.getElementById("boton_submit").disabled = true;
		return true;
	}


		
    $(document).ready(function () {

	setTimeout(function() {
        $(".alert").fadeOut(1000);
    },3000);

	});
