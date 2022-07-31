<?php
class Login extends Dbh
{
  protected function matchUser($email, $password)
  {
    $sql = "SELECT * FROM users WHERE email = ? && password = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$email, $password]);
    if ($stmt->rowCount() == 1) {
      return true;
    }
    return false;
  }

  protected function updateCookie($cookie, $email)
  {
    $sql = "UPDATE users SET cookie = ?  WHERE email = ? ";
    $stmt = $this->connect()->prepare($sql);
    $exec = $stmt->execute([$cookie, $email]);
    if ($exec) {
      return true;
    }
    return false;
  }

  protected function getEmailStatus($email)
  {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $this->connect()->prepare($sql);
    $exec = $stmt->execute([$email]);
    if ($exec) {
      return $stmt->fetch()['status'];
    }
    return false;
  }
}
