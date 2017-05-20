<?php

    $page = "save";

    // Check if user is offline
    if(!isset($_SESSION['online'])) {
      header("Location: index.php");
      die();
    }

    if(isset($_GET["start"]) && isset($_GET["end"])) {
      saveItinetary($_SESSION["user"]["IDUser"], $_GET["start"], $_GET["end"], $db);
    }

    $itinetarys = getList($_SESSION["user"]["IDUser"], $db);
