<?php

include "../classes/Dbh.class.php";
require "../classes/Models/Register.model.php";
require "../classes/Controllers/Register.controller.php";


if (isset($_POST['firstname'])) {
  $firstname = ucwords(htmlspecialchars($_POST['firstname']));
  $lastname = ucwords(htmlspecialchars($_POST['lastname']));
  $email = strtolower(htmlspecialchars($_POST['email']));
  $password = htmlspecialchars($_POST['password']);
  $pwdRepeat = htmlspecialchars($_POST['confirmpassword']);


  $profile = $_FILES['profile'];
  $tmp = $profile['tmp_name'];

  $regUser = new registerController($firstname, $lastname, $email, $password, $pwdRepeat);
  $name = $regUser->createProfileName($profile);

  if ($regUser->storeUploadedFile($tmp, $name)) {
    echo "picture saved";
  } else {
    echo "error";
  }
}
