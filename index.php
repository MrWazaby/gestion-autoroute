<?php
  // Config
  session_start();
  ob_start();
  require_once("config/db.php");

  // Models
  require_once("models/index.php");

  // Controllers
  require_once("controllers/index.php");

  // Views
  include_once("views/head.php");
  include_once("views/header.php");
  include_once("views/slider.php");
  include_once("views/itinetary.php");
  include_once("views/footer.php");

  // Close
  ob_flush();
