<?php

  require_once('controllers/dijkstra.php');

  // Index Controller
  $page = "index";

  // Check if itinetarty has been ask :
  if(isset($_POST['inputStart']) && isset($_POST['inputFinish']) && !empty($_POST['inputStart']) && !empty($_POST['inputFinish'])) {

    $start = getPoint($_POST['inputStart'], $db);
    $stop = getPoint($_POST['inputFinish'], $db);

    if($start != null && $stop != null) {

      $graph = getGraph($db);
      $itinetarty = new Dijkstra($graph);

      $path = $itinetarty->shortestPaths($start[0], $stop[0]);

      //$solution = getSolution($path);

      //print_r($solution);

    } else $error = 1;
}
