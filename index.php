<?php
if (!isset($loggedInfo)) {
  header("Location: ./login");
}
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
  <title>Trolopee - Index</title>
  <link rel="stylesheet" href="./assets/css/includes.css">
</head>

<body>

</body>

</html>