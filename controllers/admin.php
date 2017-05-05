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
    // Choose the page
    function getPageExp($page) {
        if(!isset($_GET['page']) && $page == "citys")  return "aria-expanded='true'";
        if(isset($_GET['page']) && $_GET['page'] == $page) return "aria-expanded='true'";
        return "aria-expanded='false'";
    }

    function getPageAct($page) {
        if(!isset($_GET['page']) && $page == "citys")  return "active";
        if(isset($_GET['page']) && $_GET['page'] == $page) return "active";
        return "";
    }

    function getPagePane($page) {
      if(!isset($_GET['page']) && $page == "citys")  return " active in";
      if(isset($_GET['page']) && $_GET['page'] == $page) return " active in";
      return "";
    }

    // Handle the citys
    if(isset($_POST["cityCode"]) && isset($_POST["cityName"]) && !empty($_POST["cityCode"]) &&!empty($_POST["cityName"])) {
      addModifyCity($_POST["cityCode"], $_POST["cityName"], $db);
    }
    if(isset($_GET["deleteCity"]) && !empty($_GET["deleteCity"])) {
      deleteCity($_GET["deleteCity"], $db);
    }
    $citys = getCitys($db);

    // Handle the autoroutes
    if(isset($_POST["routeCode"]) && !empty($_POST["routeCode"])) {
      addRoute($_POST["routeCode"], $db);
    }
    if(isset($_GET["deleteRoute"]) && !empty($_GET["deleteRoute"])) {
      deleteRoute($_GET["deleteRoute"], $db);
    }
    $routes = getRoutes($db);
