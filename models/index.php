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

    $query = $db->query("SELECT * FROM Sortie WHERE Sortie.CodT NOT IN (SELECT CodT FROM Registre WHERE NOW() >= Registre.DateDebut AND NOW() <= Registre.DateFin)");
    $query->execute();

    while($data = $query->fetch()) {
      $exits[$data["IDSortie"]] = $data["CodT"];
    }

    $query = $db->query("SELECT * FROM joindre");
    $query->execute();

    while($data = $query->fetch()) {
      $joindre[$data["IDSortie"]] = $data["CodP"];
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

    foreach ($joindre as $key => $value) {
      foreach ($joindre as $key2 => $value2) {
        if($value == $value2 && $key != $key2) {
          $graph["exit_".$key]["exit_".$key2] = 1;
        }
      }
    }

    return $graph;
  }

  function getExit($value, $db) {
    $value = substr($value, strlen("exit_"));

    $query = $db->prepare("
      SELECT
        Ville.Nom,
        Sortie.Numero,
        Sortie.Libelle,
        Troncon.CodA
      FROM
        Ville,
        Sortie,
        Troncon,
        joindre
      WHERE
        Sortie.IDSortie = :exit && joindre.IDSortie = Sortie.IDSortie && Troncon.CodT = Sortie.CodT && Ville.CodP = joindre.CodP
    ");
    $query->bindParam(':exit', $value);
    $query->execute();

    return $query->fetch();
  }

  function getDistance($value, $db) {
    $value = substr($value, strlen("section_"));

    $query = $db->prepare("SELECT * FROM Troncon WHERE CodT = :section");
    $query->bindParam(":section", $value);
    $query->execute();
    $data = $query->fetch();

    return $data["AuKm"] - $data["DuKm"];
  }

  function getTotal($path, $db) {
    $total = 0;
    foreach ($path as $key => $value) {
      if(substr( $value, 0, 8 ) == "section_") {
        $query = $db->prepare("SELECT * FROM Troncon WHERE CodT = :id");
        $id = substr($value, strlen("section_"));
        $query->bindParam(":id", $id);
        $query->execute();
        $data = $query->fetch();
        $total += abs($data["AuKm"] - $data["DuKm"]);
      } else {
        $total += 1;
      }
    }

    return $total;
  }

  function getPrice($path, $db) {
    $total = 0;
    foreach ($path as $key => $value) {
      if(substr( $value, 0, 8 ) == "section_") {
        $query = $db->prepare("SELECT Prix FROM Peage WHERE CodT = :id");
        $id = substr($value, strlen("section_"));
        $query->bindParam(":id", $id);
        $query->execute();
        while($data = $query->fetch()) $total += $data["Prix"];
      }
    }

    return $total;
  }
