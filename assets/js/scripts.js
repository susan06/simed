	 function checkSubmit(form) {
		 if( $("#"+form).validate() == true) {
		document.getElementById("boton_submit").value = "Enviando...";
		document.getElementById("boton_submit").disabled = true;
		return true;
		}
	}


		
    $(document).ready(function () {

	setTimeout(function() {
        $(".alert").fadeOut(1000);
    },3000);
	
		// ========================================================================
        //	boton scroll up
        // ========================================================================
		
	$('.ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	});
 
	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('.ir-arriba').slideDown(300);
		} else {
			$('.ir-arriba').slideUp(300);
		}
	});
	
		// ========================================================================
        //	Full screen Toggle
        // ========================================================================

        $('#toggle-fullscreen').click(function () {
           
		   var docElm = document.documentElement;
			if (docElm.requestFullscreen) {
				docElm.requestFullscreen();
			}
			else if (docElm.mozRequestFullScreen) {
				docElm.mozRequestFullScreen();
			}
			else if (docElm.webkitRequestFullScreen) {
				docElm.webkitRequestFullScreen();
			}
			
        });
		
		
	});
