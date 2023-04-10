function checkPasswordsMatch() {
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    var message = document.getElementById("confirmMessage");
    const registerButton = document.getElementById("buttonRegister");
  if (password1.value == password2.value) {
    password1.style.border = "";
    password2.style.border = "";
    message.innerHTML = "";
    registerButton.disabled = false;
  } else {
    password1.style.border = "1px solid red";
    password2.style.border = "1px solid red";
    message.style.color = "red";
    message.innerHTML = "Passwords do not match!";
    registerButton.disabled = true;
  }
}


function checkPasswordsMatch2() {
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    var message = document.getElementById("confirmMessage");
    const buttonUpdate = document.getElementById("buttonUpdate");
  if (password1.value == password2.value) {
    password1.style.border = "";
    password2.style.border = "";
    message.innerHTML = "";
    buttonUpdate.disabled = false;
  } else {
    password1.style.border = "1px solid red";
    password2.style.border = "1px solid red";
    message.style.color = "red";
    message.innerHTML = "Passwords do not match!";
    buttonUpdate.disabled = true;
  }
}


function checkEmail() {
    
    var email = $('#inputEmail4').val();
    $.ajax({
        type: 'POST',
        url: 'PHP/verificar_email.php',
        data: {'email': email},
        success: function(response) {
            if (response == 'existe') {
                $('#inputEmail4').css('border', '2px solid red');
                $('#buttonRegister').prop('disabled', true);
                $('#confirmMessageEmail').css('color', 'red');
                $('#confirmMessageEmail').css('display', 'flex');
                $('#confirmMessageEmail').text('Email already exists');
            } else {
                $('#inputEmail4').css('border', '');
                $('#buttonRegister').prop('disabled', true);
                $('#confirmMessageEmail').text('');
                $('#confirmMessageEmail').css('display', 'none');
            }
        }
      });
      
}







function checkUserName() {
    var username = $('#inputUserName').val();
    $.ajax({
        type: 'POST',
        url: 'PHP/verificar_username.php',
        data: {'username': username},
        success: function(response) {
            if (response == 'existe') {
                $('#inputUserName').css('border', '2px solid red');
                $('#buttonRegister').prop('disabled', true);
                $('#confirmUserName').css('color', 'red');
                $('#confirmUserName').css('display', 'flex');
                $('#confirmUserName').text('Username already exists');
            } else {
                $('#inputUserName').css('border', '');
                $('#buttonRegister').prop('disabled', false);
                $('#confirmUserName').text('');
                $('#confirmUserName').css('display', 'none');
            }
            
        }
      });
      
}




