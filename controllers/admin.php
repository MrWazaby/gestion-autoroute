<?php

    // Check if user is offline
    if(!isset($_SESSION['online'])) {
      header("Location: index.php");
      die();
    }

    // Check if user is admin
    if($_SESSION['user']['role'] != "admin") {
      header("Location: index.php");
      die();
    }

    $page = "admin";

    // Handle the citys
    if(isset($_POST["cityCode"]) && isset($_POST["cityName"]) && !empty($_POST["cityCode"]) &&!empty($_POST["cityName"])) {
      addModifyCity($_POST["cityCode"], $_POST["cityName"], $db);
    }
    if(isset($_GET["deleteCity"]) && !empty($_GET["deleteCity"])) {
      deleteCity($_GET["deleteCity"], $db);
    }
    $citys = getCitys($db);
