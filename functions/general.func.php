<?php
session_start();
require "./classes/Dbh.class.php";
require "./classes/Models/General.model.php";
require "./classes/Controllers/General.controller.php";
require "./classes/Views/General.view.php";

if (isset($_COOKIE[md5('current')])) {

  $generalView  =  new generalView();
  $loggedInfo = $generalView->fetchUserFromCookie($_COOKIE[md5('current')]);
  if (!$loggedInfo) {
    header("Location: ./login");
    $cookiename = md5('current');
    setcookie($cookiename, $logControl->cookie, time() - (3600 * 24 * 30), "/");
  }

  $generalView->setCredentials($loggedInfo['email'], $loggedInfo['user_id']);
  $generalController = new generalController($loggedInfo['email'], $loggedInfo['user_id']);
}
