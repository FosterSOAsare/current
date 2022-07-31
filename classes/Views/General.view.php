<?php
class generalView extends General
{
  private $email;
  private $user_id;
  public function fetchUserFromCookie($cookie)
  {
    return $this->getUserFromCookie($cookie);
  }
  public function setCredentials($email, $user_id)
  {
    $this->user_id = $user_id;
    $this->email = $email;
  }
}
