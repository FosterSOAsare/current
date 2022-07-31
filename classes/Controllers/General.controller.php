<?php
class generalController extends General
{
  private $email;
  private $user_id;
  public function __construct($email, $user_id)
  {
    $this->email = $email;
    $this->user_id = $user_id;
  }
}
