
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
              var pass = document.getElementById('validaPass');
              var usr = document.getElementById('user');
              if(pass.value.length<1 && usr.value.length<1){
                console.log('menos de 8');
                var error=document.getElementById('error');
                error.innerHTML='<div id="error" class="alert alert-danger mt-2" role="alert">Llena todos los campos</div>';
                event.preventDefault();
                event.stopPropagation();
                return false;
              }
              if(usr.value.length<1){
                var error=document.getElementById('error');
                error.innerHTML='<div id="error" class="alert alert-danger mt-2" role="alert">Ingresa un correo valido</div>'; 
                console.log('campo requerido');
                event.preventDefault();
                event.stopPropagation();
                return false;
              }else if (form.checkValidity() === false ) {
                //alert(forms2.value.length);
                event.preventDefault();
                event.stopPropagation();
              }
              if(pass.value.length<8){
                console.log('menos de 8');
                var error=document.getElementById('error');
                error.innerHTML='<div id="error" class="alert alert-danger mt-2" role="alert">La contraseña requiere 8 caracteres</div>';
                event.preventDefault();
                event.stopPropagation();
                return false;
              }
              
              form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
  
  