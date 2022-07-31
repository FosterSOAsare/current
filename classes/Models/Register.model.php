<?php
class Register extends Dbh
{
  protected function matchUserEmail($email)
  {
    $sql = "SELECT email FROM users WHERE email = ?";
    $stmt = $this->connect()->prepare($sql);
    $exec = $stmt->execute([$email]);
    if ($exec) {
      if ($stmt->rowCount() >= 1) {
        return "Email has already been used";
      }
      return true;
    }
    return "An error occurred";
  }
  protected function insertUser($email, $firstname, $lastname, $password, $timestamp, $email_ref)
  {
    $sql = "INSERT INTO users (email , firstname , lastname , password , timestamp, email_ref) 
    VALUES (? , ? , ? , ? , ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $exec = $stmt->execute([$email, $firstname, $lastname, $password, $timestamp, $email_ref]);
    if ($exec) {
      return true;
    }
    return false;
  }

  protected function getUserWithEmail($email)
  {
    $sql = "SELECT user_id FROM users WHERE email = ?";
    $stmt = $this->connect()->prepare($sql);
    $exec = $stmt->execute([$email]);
    if ($exec) {
      if ($stmt->rowCount() == 1) {
        return $stmt->fetch()['user_id'];
      }
      return "An error occurred";
    }
    return "An error occurred";
  }

  protected function getCodeStatus($email, $ref)
  {
    $sql = "SELECT user_id FROM users WHERE email = ? && email_ref = ?";
    $stmt = $this->connect()->prepare($sql);
    $exec = $stmt->execute([$email, $ref]);
    if ($exec) {
      if ($stmt->rowCount() == 1) {
        return true;
      }
      return "Invalid code ";
    }
    return "An error occurred ";
  }

  protected function updateEmailStatus($email)
  {
    $sql = "UPDATE users SET status = '1' , email_ref = NULL WHERE email = ? ";
    $stmt = $this->connect()->prepare($sql);
    $exec = $stmt->execute([$email]);
    if ($exec) {
      return true;
    }
    return false;
  }

  protected function updateEmailConfimationCode($email, $code)
  {
    $sql = "UPDATE users SET email_ref = ? WHERE email = ? ";
    $stmt = $this->connect()->prepare($sql);
    $exec = $stmt->execute([$code, $email]);
    if ($exec) {
      return true;
    }
    return false;
  }
}
