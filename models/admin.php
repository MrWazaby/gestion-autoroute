<?php

  // Register model

  // Functions for citys
  function getCitys($db) {
    $query = $db->prepare("SELECT * FROM Ville");
    $query->execute();
    $i = 0;
    $citys = [];
    while($data = $query->fetch()) {
      $citys[$i] = $data;
      $i++;
    }
    return $citys;
  }

  function addModifyCity($cityCode, $cityName, $db) {
    $query = $db->prepare("SELECT CodP FROM Ville WHERE CodP = :cityCode");
    $query->bindParam(":cityCode", $cityCode);
    $query->execute();
    $city = $query->fetch();
    if(empty($city)) {
      $query = $db->prepare("INSERT INTO Ville (CodP, Nom) VALUES (:cityCode, :cityName)");
      $query->bindParam(":cityCode", $cityCode);
      $query->bindParam(":cityName", $cityName);
      $query->execute();
    } else {
      $query = $db->prepare("UPDATE Ville SET Nom = :cityName WHERE CodP = :cityCode");
      $query->bindParam(":cityCode", $cityCode);
      $query->bindParam(":cityName", $cityName);
      $query->execute();
    }
  }

  function deleteCity($cityCode, $db) {
    $query = $db->prepare("DELETE FROM Ville WHERE CodP = :cityCode");
    $query->bindParam(":cityCode", $cityCode);
    $query->execute();
  }

  // Functions for routes
  function getRoutes($db) {
    $query = $db->prepare("SELECT * FROM Autoroute");
    $query->execute();
    $i = 0;
    $routes = [];
    while($data = $query->fetch()) {
      $routes[$i] = $data;
      $i++;
    }
    return $routes;
  }

  function addRoute($routeCode, $db) {
    $query = $db->prepare("INSERT INTO Autoroute (CodA) VALUES (:routeCode)");
    $query->bindParam(":routeCode", $routeCode);
    $query->execute();
  }

  function deleteRoute($routeCode, $db) {
    $query = $db->prepare("DELETE FROM Autoroute WHERE CodA = :routeCode");
    $query->bindParam(":routeCode", $routeCode);
    $query->execute();
  }

  // Functions for exits
  function getExits($db) {
    $query = $db->prepare("SELECT * FROM Sortie");
    $query->execute();
    $i = 0;
    $exits = [];
    while($data = $query->fetch()) {
      $exits[$i] = $data;
      $i++;
    }
    return $exits;
  }

  function addModifyExits($exitCodA, $exitId, $exitLabel, $exitNumero, $db) {
    $query = $db->prepare("SELECT IDSortie FROM Sortie WHERE IDSortie = :exitId");
    $query->bindParam(":exitId", $exitId);
    $query->execute();
    $exit = $query->fetch();
    if(empty($exit)) {
      $query = $db->prepare("INSERT INTO Sortie (Libelle, Numero, IDSortie, CodA) VALUES (:exitLabel, :exitNumero, :exitId, :exitCodA)");
      $query->bindParam(":exitLabel", $exitLabel);
      $query->bindParam(":exitNumero", $exitNumero);
      $query->bindParam(":exitId", $exitId);
      $query->bindParam(":exitCodA", $exitCodA);
      $query->execute();
    } else {
      $query = $db->prepare("UPDATE Sortie SET Libelle = :exitLabel, Numero = :exitNumero, CodA = :exitCodA WHERE IDSortie = :exitId");
      $query->bindParam(":exitLabel", $exitLabel);
      $query->bindParam(":exitNumero", $exitNumero);
      $query->bindParam(":exitId", $exitId);
      $query->bindParam(":exitCodA", $exitCodA);
      $query->execute();
    }
  }

  function deleteExit($exitId, $db) {
    $query = $db->prepare("DELETE FROM Sortie WHERE IDSortie = :exitId");
    $query->bindParam(":exitId", $exitId);
    $query->execute();
  }
