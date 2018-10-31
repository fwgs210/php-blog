<?php

require 'user_controller.php';

$controller = new user_controller;
// Then we will use a switch statement to check the value of the "action" key
// and call the corresponding method in response
$action = $_GET['action'];

switch ($action) {
  case 'add_user':
    $controller->create_user($_POST);
    break;
  case 'user_login':
    $controller->login($_POST);
    break;
  case 'delete':
    $controller->delete($_POST);
    break;
  // If the key does not match any of the methods then the file will just
  // required back the View page
  default:
    header('Location: ../index.php');
    exit();
}