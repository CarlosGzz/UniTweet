
$(document).ready(function() {
     $('#envia').on('keypress click',function(e){
      var userx = $('#user').val();
      var passx = $('#pass').val();
        if(userx != '' && passx != ''){
          $.ajax({
       		url: '../../Controlador/login.php',
            method: 'POST',
            data: {user: userx, pass: passx},
            success: function(msg){
              if(msg=='1'){
                $('#mensaje').show(),
                $('#mensaje').html('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Usuario o Contraseña Incorrectas');
              }else{
                window.location = "../../index.php";
              }
          }
        });
       } else{
        $('#mensaje').show();
        $('#mensaje').html('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Ingrese los datos');
      }
  });
});
