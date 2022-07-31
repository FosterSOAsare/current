<?php

if (isset($_POST['firstname'])) {
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $pwdRepeat = htmlspecialchars($_POST['confirmpassword']);
}
