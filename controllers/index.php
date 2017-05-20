<?php

  require_once('controllers/dijkstra.php');

  // Index Controller
  $page = "index";

  // Check if itinetarty has been ask :
  if(isset($_POST['inputStart']) && isset($_POST['inputFinish']) && !empty($_POST['inputStart']) && !empty($_POST['inputFinish'])) {

    $graph = getGraph($db);

    //$itinetarty = new Dijkstra($graph);
  }
