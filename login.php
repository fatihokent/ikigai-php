<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | Ikigai</title>
  <link rel="stylesheet" href="login.css">
  <link rel="icon" type="image/png" href="images/icone_ikigai-removebg-preview.png">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <div class="wrapper">
    <form action="check_login.php" method="post">
        <h2>Login</h2>
        <div class="input-field">
          <input type="text" name="name" required>
          <label>Entrer votre email ou nom</label>
        </div>
        <div class="input-field">
          <input type="password" name="pass" id="password" required>
          <label>Entrer votre mot de passe</label>
          <i id="togglePassword" class="fas fa-eye-slash" onclick="showPassword()"></i>
        </div>
        <button type="submit">Se connecter</button>
        <div class="register">
          <p>Vous n'avez pas de compte? <a href="register.php">S'enregistrer</a></p>
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
  </script>
</body>
</html>