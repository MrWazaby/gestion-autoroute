<?php
  // Config
  session_start();
  ob_start();
  require_once("config/db.php");

  // Models
  require_once("models/save.php");

  // Controllers
  require_once("controllers/save.php");

  // Views
  include_once("views/head.php");
  include_once("views/header.php");
  include_once("views/save.php");
  include_once("views/footer.php");

  // Close
  ob_flush();
