<?php

  require_once('controllers/dijkstra.php');

  // Index Controller
  $page = "index";

  // Function who generate the solution
  function getSolution($path, $db) {
    $i = -1;
    foreach ($path as $value) {
      if(substr( $value, 0, 5 ) == "exit_") {
        $i++;
        $exit = getExit($value, $db);
        $solution[$i]["city"] = $exit["Nom"];
        $solution[$i]["numero"] = $exit["Numero"];
        $solution[$i]["label"] = $exit["Libelle"];
        $solution[$i]["route"] = $exit["CodA"];
        $solution[$i]["distance"] = 0;
      } else {
        $solution[$i]["distance"] += getDistance($value, $db);
      }
    }

    return $solution;
  }

  // Check if itinetarty has been ask :
  if(isset($_POST['inputStart']) && isset($_POST['inputFinish']) && !empty($_POST['inputStart']) && !empty($_POST['inputFinish'])) {

    $start = getPoint($_POST['inputStart'], $db);
    $stop = getPoint($_POST['inputFinish'], $db);

    if($start != null && $stop != null) {

      $graph = getGraph($db);
      $itinetarty = new Dijkstra($graph);

      $path = $itinetarty->shortestPaths($start[0], $stop[0]);

      if(!empty($path[0]))
        $solution = getSolution($path[0], $db);
      else
        $error = 2;

    } else $error = 1;
}
