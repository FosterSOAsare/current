<?php
session_start();
require "../classes/Dbh.class.php";
require "../classes/Models/Login.model.php";
require "../classes/Controllers/Login.controller.php";
require "../classes/Views/Login.view.php";

if (isset($_POST['password']) && isset($_POST['email'])) {
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  $logControl = new loginController($email);
  $logView = new loginView($email, $password);

  if ($logControl->validateEmail()) {
    if ($logView->fetchMatchStatus()) {
      // Check email Status
      $status = $logView->fetchEmailStatus();
      // Set new cookie 
      if ($status) {
        $cookie = $logControl->setCookie();
        if ($cookie) {
          $cookiename = md5('current');
          setcookie($cookiename, $logControl->cookie, time() + (3600 * 24 * 30), "/");
          echo "success";
        }
      } else {
        $_SESSION['email'] = $email;
        echo "verify";
      }
    } else {
      echo "Invalid login credentials";
    }
  } else {
    echo "Invalid email address";
  }
}
