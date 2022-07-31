<?php
class Dbh
{
  protected function connect()
  {
    try {
      $username = 'root';
      $password = 'Asare4ster...';
      $dbn = new PDO("mysql:host=localhost;dbname=current", $username, $password);
      return $dbn;
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
