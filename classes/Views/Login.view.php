<?php
class loginView extends Login
{
  private $email;
  private $password;
  public function __construct($email, $password)
  {
    $this->email = $email;
    $this->password = $password;
  }
  public function fetchMatchStatus()
  {
    return $this->matchUser($this->email, md5($this->password));
  }

  public  function fetchEmailStatus()
  {
    $status = $this->getEmailStatus($this->email);
    if ($status == 1) {
      return true;
    }
    return false;
  }
}
