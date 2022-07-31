<?php
class General extends Dbh
{
  protected function getUserFromCookie($cookie)
  {
    $sql = "SELECT user_id, firstname , lastname , email FROM users WHERE cookie = ? ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$cookie]);
    if ($stmt->rowCount() == 1) {
      $result = $stmt->fetch();
      return $result;
    }
    return false;
  }
}
