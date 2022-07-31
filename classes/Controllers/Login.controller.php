<?php
class loginController extends Login
{
  private $email;
  public $cookie;
  public  function __construct($email)
  {
    $this->email = $email;
  }

  public function validateEmail()
  {
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      return false;
    }
    return true;
  }

  public function setCookie()
  {
    $cookie = md5(uniqid());
    $this->cookie = $cookie;
    return $this->updateCookie($cookie, $this->email);
  }
}
