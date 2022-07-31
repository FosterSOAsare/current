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
  }

  public function createProfileName($profile)
  {
    $name = explode(".", $profile['name']);
    $ext = $name[count($name) - 1];
    $name = $this->firstname . $this->lastname . time() . "." . $ext;
    return $name;
  }

  public function storeUploadedFile($tmp, $name)
  {
    $path = "C:xampp/htdocs/current/assets/profiles/" . strtolower($name);
    if (move_uploaded_file($tmp, $path)) {
      return true;
    };
    return false;
  }

  public function compareEmail()
  {
  }
}
