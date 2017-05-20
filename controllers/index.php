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

    $starts = getPoint($_POST['inputStart'], $db);
    $stops = getPoint($_POST['inputFinish'], $db);

    if($starts != null && $stops != null) {

      $graph = getGraph($db);
      $itinetarty = new Dijkstra($graph);

      $i = 0;
      foreach ($starts as $key => $value) {
        foreach ($stops as $key2 => $value2) {
          $path[$i] = $itinetarty->shortestPaths($value, $value2);
          $i++;
        }
      }

      if(!empty($path)) {

        foreach ($path as $key => $value) {
          $total[$key] = getTotal($value[0], $db);
          $lowest_weight = $total[$key];
          $prices[$key] = getPrice($value[0], $db);
          $price = $prices[$key];
        }

        foreach ($total as $key => $value) {
          if($value < $lowest_weight) {
            $lowest_weight = $value;
            $price = $prices[$key];
          }
        }

        foreach ($total as $key => $value) {
          if($value == $lowest_weight) $goodPath = $path[$key];
        }

        $solution = getSolution($goodPath[0], $db);

      } else $error = 2;

    } else $error = 1;
}
