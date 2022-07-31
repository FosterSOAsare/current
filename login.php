<?php
include "functions/general.func.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" value='no-cache no-store must-revalidate'>
  <meta http-equiv="Pragma" value='no-cache'>
  <meta http-equiv="Expire" value='0'>
  <title>Trolopee - Login</title>
  <link rel="stylesheet" href="./assets/css/includes.css">
  <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
  <?php include "includes/header.inc.php"; ?>
  <main id="login">
    <h3>Login</h3>
    <section class="container">
      <div class="image">
        <img src="./images/properties/Bridge_1/IMG_5535.JPG" alt="">
      </div>
      <section id="form_section">
        <form action="" method="POST">
          <h3>Sign in to your account</h3>
          <input type="text" placeholder="Enter email address" name='email' aria-label="Email address">
          <input type="password" placeholder="Password" name='password' aria-label="Email address">
          <button>Sign In</button>
          <p>
            Don't have an account? <a href="./register">Register here</a>
          </p>

          <p>Terms of use . <a href="">Privacy policy</a></p>
        </form>
      </section>
    </section>

  </main>

</body>

</html>