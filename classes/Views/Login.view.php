<?php
class loginView extends Login
{
  private $email;
  private $password;
  function __construct($email, $password)
  {
    $this->email = $email;
    $this->password = $password;
  }
  function fetchMatchStatus()
  {
    return $this->matchUser($this->email, md5($this->password));
  }
}
