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

    // Handle the exits
    if(isset($_POST["exitCodT"]) && isset($_POST["exitId"]) && isset($_POST["exitLabel"]) && isset($_POST["exitNumero"]) && !empty($_POST["exitCodT"]) && !empty($_POST["exitId"]) && !empty($_POST["exitLabel"]) && !empty($_POST["exitNumero"])) {
      addModifyExits($_POST["exitCodT"], $_POST["exitId"], $_POST["exitLabel"], $_POST["exitNumero"], $db);
    }
    if(isset($_GET["deleteExit"]) && !empty($_GET["deleteExit"])) {
      deleteExit($_GET["deleteExit"], $db);
    }
    $exits = getExits($db);

    // Handle the sections
    if(isset($_POST["sectionCodT"]) && isset($_POST["sectionDuKm"]) && isset($_POST["sectionAuKm"]) && isset($_POST["sectionIDPeage"]) && isset($_POST["sectionCodA"]) && !empty($_POST["sectionCodT"]) && !empty($_POST["sectionDuKm"]) && !empty($_POST["sectionAuKm"]) && !empty($_POST["sectionCodA"])) {
      addModifySection($_POST["sectionCodT"], $_POST["sectionDuKm"], $_POST["sectionAuKm"], $_POST["sectionIDPeage"], $_POST["sectionCodA"], $db);
    }
    if(isset($_GET["deleteSection"]) && !empty($_GET["deleteSection"])) {
      deleteSection($_GET["deleteSection"], $db);
    }
    $sections = getSections($db);

    // Handle the register
    if(isset($_POST["registerNumE"]) && isset($_POST["registerDescription"]) && isset($_POST["registerDateDebut"]) && isset($_POST["registerDateFin"]) && isset($_POST["registerCodT"]) && !empty($_POST["registerNumE"]) && !empty($_POST["registerDescription"]) && !empty($_POST["registerDateDebut"]) && !empty($_POST["registerDateFin"]) && !empty($_POST["registerCodT"])) {
      addModifyRegister($_POST["registerNumE"], $_POST["registerDescription"], $_POST["registerDateDebut"], $_POST["registerDateFin"], $_POST["registerCodT"], $db);
    }
    if(isset($_GET["deleteRegister"]) && !empty($_GET["deleteRegister"])) {
      deleteRegister($_GET["deleteRegister"], $db);
    }
    $registers = getRegister($db);
