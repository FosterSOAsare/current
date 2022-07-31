<?php

class registerController extends Register
{
  private $password;
  private $firstname;
  private $lastname;
  private $email;
  private $pwdRepeat;

  public function __construct($firstname, $lastname, $email, $password, $pwdRepeat)
  {
    $this->password  = $password;
    $this->firstname  = $firstname;
    $this->lastname  = $lastname;
    $this->email  = $email;
    $this->pwdRepeat  = $pwdRepeat;
    $this->timestamp = gmdate("Y-m-d H:i:s");
  }

  public function createProfileName($profile)
  {
    $name = explode(".", $profile['name']);
    $ext = $name[count($name) - 1];
    $name = $this->firstname . $this->lastname . time() . "." . $ext;
    return $name;
  }

  public function validateName()
  {
    if (!preg_match("/^[A-Za-z]+$/", $this->firstname) || !preg_match("/^[A-Za-z]+$/", $this->lastname)) {
      return "Please enter valid name formats";
    }
    return true;
  }
  public function validateEmail()
  {
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      return "Please enter a valid email address";
    }
    return true;
  }

  public function validatePassword()
  {
    if (strlen($this->password) < 8) {
      return "Password is too short ";
    }
    if ($this->password != $this->pwdRepeat) {
      return "Passwords do not match ";
    }
    return true;
  }
  public function generateRegisterCode()
  {
    $num = '1234567890';
    $code = "";
    for ($i = 0; $i < 8; $i++) {
      $code .= $num[rand(0, strlen($num) - 1)];
    }
    return $code;
  }

  function setUser($code)
  {
    return $this->insertUser($this->email, $this->firstname, $this->lastname, md5($this->password), $this->timestamp, $code);
  }


  public function validateFileUpload()
  {
    if (!isset($_FILES['profile'])) {
      return "Please choose a profile picture  ";
    }
    return true;
  }

  public function storeUploadedFile($tmp, $name)
  {
    $path = "C:xampp/htdocs/current/assets/profiles/" . strtolower($name);
    if (move_uploaded_file($tmp, $path)) {
      return true;
    };
    return false;
  }

  public function setEmailStatus()
  {
    return $this->updateEmailStatus($this->email);
  }

  public function setEmailConfirmationCode($code)
  {
    return $this->updateEmailConfimationCode($this->email, $code);
  }
}
