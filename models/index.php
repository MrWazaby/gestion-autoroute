<?php

  // Index model

  // Get point id
  function getPoint($point, $db) {
    $query = $db->prepare("SELECT IDSortie FROM joindre WHERE CodP IN (SELECT CodP FROM Ville WHERE Nom LIKE :point)");
    $query->bindParam(":point", $point);
    $query->execute();
    $i = 0;
    $points = null;
    while($data = $query->fetch()) {
      $points[$i] = 'exit_'.$data["IDSortie"];
      $i++;
    }
    return $points;
  }

  // Generate the graph
  function getGraph($db) {
    $query = $db->query("SELECT * FROM Troncon WHERE Troncon.CodT NOT IN (SELECT CodT FROM Registre WHERE NOW() >= Registre.DateDebut AND NOW() <= Registre.DateFin)");
    $query->execute();

    while($data = $query->fetch()) {
      $routes[$data["CodA"]][$data["CodT"]][$data["DuKm"]] = $data["AuKm"] - $data["DuKm"];
      sort($routes[$data["CodA"]][$data["CodT"]]);
      $sections[$data["CodT"]] = $data["AuKm"] - $data["DuKm"];
    }

    $query = $db->query("SELECT * FROM Sortie");
    $query->execute();

    while($data = $query->fetch()) {
      $exits[$data["IDSortie"]] = $data["CodT"];
    }

    foreach ($exits as $keyExit => $exit) {
      $graph["exit_".$keyExit] = array();
    }

    foreach ($sections as $keySection => $section) {
      $graph["section_".$keySection] = array();
    }

    foreach ($exits as $keyExit => $exit) {
      $graph["exit_".$keyExit]["section_".$exit] = $sections[$exit];
      $graph["section_".$exit]["exit_".$keyExit] = $sections[$exit];
    }

    foreach ($routes as $Subroutes) {
      foreach ($Subroutes as $keyRoute => $route) {
        foreach ($Subroutes as $keyRoute2 => $route2) {
          if($keyRoute != $keyRoute2) $graph["section_".$keyRoute]["section_".$keyRoute2] = $route[0];
        }
      }
    }

    return $graph;
  }
