<?php
session_start();
include "../classes/Dbh.class.php";
require "../classes/Models/Register.model.php";
require "../classes/Controllers/Register.controller.php";
require "../classes/Views/Register.view.php";


if (isset($_POST['firstname'])) {
  $firstname = ucwords(htmlspecialchars($_POST['firstname']));
  $lastname = ucwords(htmlspecialchars($_POST['lastname']));
  $email = strtolower(htmlspecialchars($_POST['email']));
  $password = htmlspecialchars($_POST['password']);
  $pwdRepeat = htmlspecialchars($_POST['confirmpassword']);

  $regUser = new registerController($firstname, $lastname, $email, $password, $pwdRepeat);
  $regView = new registerView($email);

  // Validating data on server side 
  if ($regUser->validateName() === true) {
    if ($regUser->validateEmail() === true) {
      if ($regUser->validatePassword() === true) {
        if ($regUser->validateFileUpload() === true) {
          if ($regView->checkEmailAvailability() === true) {
            // Insert user ,  set sessions
            $code = $regUser->generateRegisterCode();
            if ($regUser->setUser($code) == true) {
              // Fetch user_id of inserted user
              $user_id = $regView->fetchUser();

              if ($user_id != "An error occurred") {
                // Workngn with profile picture 
                $profile = $_FILES['profile'];
                $tmp = $profile['tmp_name'];
                $ext = explode(".", $profile['name']);
                $ext = $ext[count($ext) - 1];
                $name = "profile" . $user_id . "." . $ext;
                if ($regUser->storeUploadedFile($tmp, $name)) {
                  // Set sessions
                  $_SESSION['email'] = $email;
                  echo "success";
                } else {
                  echo "error";
                }
              } else {
                echo $user_id;
              }
            }
          } else {
            echo $regView->checkEmailAvailability();
          }
        } else {
          echo $regUser->validateFileUpload();
        }
      } else {
        echo $regUser->validatePassword();
      }
    } else {
      echo $regUser->validateEmail();
    }
  } else {
    echo $this->validateName;
  }
}

if (isset($_POST['verifyEmail'])) {
  $code = htmlspecialchars($_POST['code']);
  $email = htmlspecialchars($_SESSION['email']);
  $regView = new registerView($email);
  $regUser = new registerController("", "", $email, "", "");

  $status = $regView->matchEmailCode($code);
  if ($status === true) {
    // Update email status
    $regUser->setEmailStatus($code);
    echo "success";

    unset($_SESSION['email']);
    return;
  }
  echo $regView->matchEmailCode($code);
  return;
}

if (isset($_POST['resendCode'])) {
  $email = htmlspecialchars($_SESSION['email']);

  $regUser = new registerController("", "", $email, "", "");
  $code = $regUser->generateRegisterCode();

  // Update register code 
  $regUser->setEmailConfirmationCode($code);
  echo "resent";
}
