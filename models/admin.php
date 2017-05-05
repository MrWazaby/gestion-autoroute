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
