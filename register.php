<?php
include "functions/general.func.php";
if (isset($loggedInfo)) {
  header("Location: ./dashboard");
}
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
  <title>Trolopee - Register</title>
  <link rel="stylesheet" href="./assets/css/includes.css">
  <link rel="stylesheet" href="./assets/css/register.css">
</head>

<body>
  <?php include "includes/header.inc.php"; ?>
  <?php include "includes/menu.inc.php"; ?>
  <main id="register">
    <h3>Register</h3>
    <section class="container">
      <div class="image">
        <img src="./images/properties/Bridge_1/IMG_5535.JPG" alt="">
      </div>
      <section id="form_section">
        <form action="" method="POST">
          <div class=" logo">
            <img src="./images/logo.png" alt="Logo">
          </div>
          <h3>Register an account</h3>
          <input type="text" placeholder="Firstname" name='firstname' aria-label="First name">
          <input type="text" placeholder="Last name" name='lastname' aria-label="Last name">
          <input type="text" placeholder="Enter email address" name='email' aria-label="Email address">
          <input type="password" placeholder="Password" name='password' aria-label="Password">
          <input type="password" placeholder="Confirm Password" name='confirmpassword' aria-label="Confirm password">
          <input type="file" placeholder="Confirm Password" name='profile' aria-label="Choose profile picture" accept="image/*">
          <p class="err">Dead</p>
          <button>Register</button>
          <p>
            Already have an account? <a href="./login">Login</a>
          </p>

          <p>Terms of use . <a href="">Privacy policy</a></p>
        </form>
      </section>
    </section>

  </main>
  <script src="./assets/js/imports/jquery.js"></script>
  <script src="./assets/js/register.js" type="module"></script>
</body>

</html>