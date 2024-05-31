<?php

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form | Ikigai</title>
  <link rel="stylesheet" href="login.css">
  <link rel="icon" type="image/png" href="images/icone_ikigai-removebg-preview.png">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <div class="wrapper">
    <form action="registration.php" method="post">
      <h2>Créer un compte</h2>
      <div class="input-field">
        <input type="text" name="nom" required>
        <label>Entrer votre nom</label>
      </div>
      <div class="input-field">
        <input type="text" name="prenom" required>
        <label>Entrer votre prenom</label>
      </div>
      <div class="input-field">
        <input type="email" name="email" required>
        <label>Entrer votre email</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" name="password" required>
        <label>Entrer votre passe</label>
        <i id="togglePassword" class="fas fa-eye-slash" onclick="showPassword()"></i>
      </div>
      <div class="input-field">
        <input type="password" id="confirm-password" required>
        <label>Confirmer le passe</label>
    </div>
    <span id="password-error" class="error-message"></span>
      <button type="submit">Register</button>
      <div class="register">
        <p>Vous avez déjà un compte? <a href="login.php">Se connecter</a></p>
      </div>
    </form>
  </div>

  <script>
    function showPassword() {
    var passwordInput = document.getElementById('password');
    var toggleIcon = document.getElementById('togglePassword');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    }
    }



  document.addEventListener('DOMContentLoaded', function () {
    var password = document.getElementById('password');
    var confirmPassword = document.getElementById('confirm-password');
    var passwordError = document.getElementById('password-error');

    confirmPassword.addEventListener('input', function () {
      if (password.value !== confirmPassword.value) {
        passwordError.textContent = 'Passwords do not match';
      } else {
        passwordError.textContent = '';
      }
    });
  });

  </script>
</body>
</html>
