<?php

  // Login Controller
  $page = "login";

  // Change page if user is online
  if(isset($_SESSION["online"])) header("Location: index.php");

  // Detect login submition
  if(isset($_POST["pseudo"]) && isset($_POST["pass"])) {
    $_SESSION["user"] = userLogin($_POST["pseudo"], $_POST["pass"], $db);
    if(!empty($_SESSION["user"])) {
      $_SESSION["online"] = true;
      header("Location: index.php");
    }
    else $error = 1;
  }
