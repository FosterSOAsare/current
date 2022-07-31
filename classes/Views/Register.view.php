<?php

class registerView extends Register
{
  private $email;
  public function __construct($email)
  {
    $this->email  = $email;
  }

  public function checkEmailAvailability()
  {
    return $this->matchUserEmail($this->email);
  }

  function fetchUser()
  {
    return $this->getUserWithEmail($this->email);
  }

  function matchEmailCode($code)
  {
    return $this->getCodeStatus($this->email, $code);
  }
}
