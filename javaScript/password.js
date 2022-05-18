var password = document.getElementById("contrasena")
      , confirm_password = document.getElementById("confirm_password");
    
function validatePassword(){
    confirm_password.setCustomValidity( password.value != 
    confirm_password.value ? "Las contraseñas no son idénticas." : '');
    if( password.value != 
    confirm_password.value ? $(this).css('background-color','#FAA0A0') : $(this).css('background-color','#77DD77'));
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

$(document).ready(function(){
  $('#contrasena').change(function(){

  var count = 0;
  var pass = $(this).val();
  const pwdFilter = /(?=^.{8,40}$)(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[^A-Za-z0-9]).*/;
  if (!pwdFilter.test(pass)) {
    // Show error that password has to be adjusted to match criteria
    $(this).css('background-color','#FAA0A0');
  }else{
    $(this).css('background-color','#77DD77');
  }
  });
});