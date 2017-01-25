<?php
session_start();

if (filter_input(INPUT_POST, 'action')){
   $action = filter_input(INPUT_POST, 'action');
}else{
   $action = filter_input(INPUT_GET, 'action');
}

// start the decision tree
switch ($action) {
  case 'login':

  $username = htmlspecialchars($_POST["username"]);
  $_SESSION["user"] = $username;
  header('Location: view/products.php');
  exit;

  break;

  case 'logout':
  session_destroy();
  header('Location: view/login.php');
  exit;

  break;

  case 'add_to_cart':

  if (!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = array();
  }

  $products = $_POST["products"];

  foreach ($products as $product) {
  array_push($_SESSION["cart"], $product);
  }

  header("Location: view/cart.php");
  exit;

  break;

  default:

    header('Location: view/login.php');
    exit;
    break;
}
