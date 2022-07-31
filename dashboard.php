<?php
include "functions/general.func.php";
// Redirect to login page if user is not logged in
if (!isset($loggedInfo)) {
  header("Location: ./login");
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
  <title>Trolopee - Dashboard</title>
  <link rel="stylesheet" href="./assets/css/includes.css">
</head>

<body>
  <?php include "includes/header.inc.php" ?>
  <?php include "includes/menu.inc.php" ?>
  <main></main>

  <script src="./assets/js/imports/jquery.js"></script>
  <script src="./assets/js/dashboard.js" type="module"></script>
</body>

</html>