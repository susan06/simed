		
    $(document).ready(function () {

        // ========================================================================
        //	Forms
        // ========================================================================

            $("#form_login").validate({
                // Rules for form validation
                rules: {
                    nick: {
                        required: true
                    },
					clave: {
                        required: true,
                    },
                },

                // Messages for form validation
                messages: {
					nick: {
                        required: 'Por favor, ingrese su usuario'
                    },
                    clave: {
                        required: 'Por favor, ingrese su clave'
                    }
                },
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				success: function (element) {
					element.closest('.form-group').removeClass('has-error').addClass('has-success');
				}
                
            });

		$("#form_pass").validate({
                // Rules for form validation
                rules: {
                    clave: {
                        required: true,
						minlength: 5,
                        maxlength: 20
                    },
					clave2: {
                        required: true,
                        minlength: 5,
                        maxlength: 20,
                        equalTo: '#clave'
                    },
                },

                // Messages for form validation
                messages: {
					clave: {
                        required: 'Por favor, ingrese su contraseña',
						minlength: 'La logitud mínima es de 5 carácteres'
                    },
					 clave2: {
                        required: 'Ingrese su contraseña una vez más',
                        equalTo: 'Introduzca la misma contraseña que la anterior',
						minlength: 'La logitud mínima es de 5 carácteres'
                    },
                },
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				success: function (element) {
					element.closest('.form-group').removeClass('has-error').addClass('has-success');
				}
                
            });
			
      $("#form_usuario").validate({
                // Rules for form validation
                rules: {
                    nick: {
                        required: true
                    },
					pnombre: {
                        required: true
                    },
					papellido: {
                        required: true
                    },
					clave: {
                        required: true,
						minlength: 5,
                        maxlength: 20
                    },
					clave2: {
                        required: true,
                        minlength: 5,
                        maxlength: 20,
                        equalTo: '#clave'
                    },
					pregunta_secreta: {
                        required: true,
                    },
					respuesta_secreta: {
                        required: true,
                    },
					email: {
                        required: true,
						email:true
                    },
					rol: {
                        required: true,
                    },
					sexo: {
                        required: true,
                    },
					cedula:{
                        required: true,
						number:true
                    },
					rif: {
                        required: true
                    },
					mpps: {
                        required: true
                    }
                },

                // Messages for form validation
                messages: {
					nick: {
                        required: 'Por favor, ingrese su usuario'
                    },
                    clave: {
                        required: 'Por favor, ingrese su clave'
                    },
                    pnombre: {
                        required: 'Por favor, ingrese su nombre'
                    },
                    papellido: {
                        required: 'Por favor, ingrese su apellido'
                    },
					pregunta_secreta: {
                        required: 'Por favor, seleccione una pregunta'
                    },
                    respuesta_secreta: {
                        required: 'Por favor, ingrese su respuesta'
                    },
                    rol: {
                        required: 'Por favor, seleccione un rol'
                    },
					sexo: {
                        required: 'Por favor, seleccione su sexo'
                    },
                    email: {
                        required: 'Por favor, ingrese su email'
                    },
					clave: {
                        required: 'Por favor, ingrese su contraseña',
						minlength: 'La logitud mínima es de 5 carácteres'
                    },
					 clave2: {
                        required: 'Ingrese su contraseña una vez más',
                        equalTo: 'Introduzca la misma contraseña que la anterior',
						minlength: 'La logitud mínima es de 5 carácteres'
                    },
					cedula: {
                        required: 'Por favor, ingrese su cédula',
						number: 'Por favor, ingrese solo números'
                    },
					rif: {
                        required: 'Por favor, ingrese su rif'
                    },
					mpps: {
                        required: 'Por favor, ingrese su mpps'
                    }
                },
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				success: function (element) {
					element.closest('.form-group').removeClass('has-error').addClass('has-success');
				}
                
            });
	
 $("#form_clinica").validate({
                // Rules for form validation
                rules: {
                    nombre: {
                        required: true
                    },
					tlf: {
                        required: true
                    },
					rif: {
                        required: true
                    },
					estado: {
                        required: true
                    },
					ciudad: {
                        required: true
                    },
					direccion: {
                        required: true
                    },
					postal: {
                        required: true,
						number:true
                    }
                },

                // Messages for form validation
                messages: {
					nombre: {
                        required: 'Por favor, razón social'
                    },
                    tlf: {
                        required: 'Por favor, ingrese télefono'
                    },
                    rif: {
                        required: 'Por favor, ingrese RIF'
                    },
                    estado: {
                        required: 'Por favor, ingrese estado'
                    },
					ciudad: {
                        required: 'Por favor, ingrese ciudad'
                    },
                    direccion: {
                        required: 'Por favor, ingrese dirección'
                    },
                    postal: {
                        required: 'Por favor, ingrese zona postal',
						numbre:	  'Pro favor, solo ingrese números'
                    }
                },
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				success: function (element) {
					element.closest('.form-group').removeClass('has-error').addClass('has-success');
				}
                
            });		

			 $("#form_espec").validate({
                // Rules for form validation
                rules: {
                    nombre: {
                        required: true
                    }
                },

                // Messages for form validation
                messages: {
					nombre: {
                        required: 'Por favor, ingrese nombre de la especialidad'
                    }
                },
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				success: function (element) {
					element.closest('.form-group').removeClass('has-error').addClass('has-success');
				}
                
            });	

			  $("#form_paciente").validate({
                // Rules for form validation
                rules: {
					pnombre: {
                        required: true
                    },
					papellido: {
                        required: true
                    },
					fnacimiento: {
                        required: true,
                    },
					edad: {
                        required: true,
						number:true
                    },
					email: {
						email:true
                    },
					rol: {
                        required: true,
                    },
					sexo: {
                        required: true,
                    },
					cedula:{
						number:true
                    },
					rlegal: {
                        required: true
                    },
					p_rlegal: {
                        required: true
                    }
                },

                // Messages for form validation
                messages: {
                    pnombre: {
                        required: 'Por favor, ingrese su nombre'
                    },
                    papellido: {
                        required: 'Por favor, ingrese su apellido'
                    },
					fnacimiento: {
                        required: 'Por favor, ingrese fecha de nacimiento'
                    },
                    edad: {
                        required: 'Por favor, ingrese la edad',
						number: 'Por favor, ingrese solo números'
                    },
					sexo: {
                        required: 'Por favor, seleccione su sexo'
                    },
                    email: {
                        email: 'Por favor, ingrese un email válido'
                    },
					cedula: {
						number: 'Por favor, ingrese solo números'
                    },
                    rlegal: {
                        required: 'Por favor, ingrese nombre de representante'
                    },
                    p_rlegal: {
                        required: 'Por favor, ingrese parentesco del representante'
                    }
                },
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				success: function (element) {
					element.closest('.form-group').removeClass('has-error').addClass('has-success');
				}
                
            });
			
});
