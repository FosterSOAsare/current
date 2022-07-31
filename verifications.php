<?php

include "functions/general.func.php";
if (!isset($_SESSION['email'])) {
  // header("Location: ./register");
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
  <title>Trolopee - Verifications</title>
  <link rel="stylesheet" href="./assets/css/includes.css">
  <link rel="stylesheet" href="./assets/css/verifications.css">
</head>

<body>

  <?php if (isset($_GET['id'])) { ?>
    <main id='verifications'>
      <h3 class="intro">Verifiy email</h3>
      <form action="" method="post">
        <h3>An email with verification code has been sent to <span><?php echo $_SESSION['email'] ?></span></h3>
        <p>Please enter code below </p>
        <input type="text" placeholder="Enter code here" name="code">
        <p class="err">Dead</p>
        <button class='submit'>Submit</button>

        <button class="resendCode">
          Resend Code
        </button>
      </form>
    </main>
  <?php } else {
  }
  ?>
  <script src="./assets/js/imports/jquery.js"></script>
  <script src="./assets/js/verifications.js"></script>
</body>

</html>