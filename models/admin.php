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

  function addModifyExits($exitCodT, $exitId, $exitLabel, $exitNumero, $db) {
    $query = $db->prepare("SELECT IDSortie FROM Sortie WHERE IDSortie = :exitId");
    $query->bindParam(":exitId", $exitId);
    $query->execute();
    $exit = $query->fetch();
    if(empty($exit)) {
      $query = $db->prepare("INSERT INTO Sortie (Libelle, Numero, IDSortie, CodT) VALUES (:exitLabel, :exitNumero, :exitId, :exitCodT)");
      $query->bindParam(":exitLabel", $exitLabel);
      $query->bindParam(":exitNumero", $exitNumero);
      $query->bindParam(":exitId", $exitId);
      $query->bindParam(":exitCodT", $exitCodT);
      $query->execute();
    } else {
      $query = $db->prepare("UPDATE Sortie SET Libelle = :exitLabel, Numero = :exitNumero, CodT = :exitCodT WHERE IDSortie = :exitId");
      $query->bindParam(":exitLabel", $exitLabel);
      $query->bindParam(":exitNumero", $exitNumero);
      $query->bindParam(":exitId", $exitId);
      $query->bindParam(":exitCodT", $exitCodT);
      $query->execute();
    }
  }

  function deleteExit($exitId, $db) {
    $query = $db->prepare("DELETE FROM Sortie WHERE IDSortie = :exitId");
    $query->bindParam(":exitId", $exitId);
    $query->execute();
  }

  // Functions for section
  function getSections($db) {
    $query = $db->prepare("SELECT * FROM Troncon");
    $query->execute();
    $i = 0;
    $sections = [];
    while($data = $query->fetch()) {
      $sections[$i] = $data;
      $i++;
    }
    return $sections;
  }

  function addModifySection($sectionCodT, $sectionDuKm, $sectionAuKm, $sectionIDPeage, $sectionCodA, $db) {
    $query = $db->prepare("SELECT CodT FROM Troncon WHERE CodT = :sectionCodT");
    $query->bindParam(":sectionCodT", $sectionCodT);
    $query->execute();
    $section = $query->fetch();
    if(empty($section)) {
      if(!empty($sectionIDPeage)) $query = $db->prepare("INSERT INTO Troncon (CodT, DuKm, AuKm, IDPeage, CodA) VALUES (:sectionCodT, :sectionDuKm, :sectionAuKm, :sectionIDPeage, :sectionCodA)");
      else $query = $db->prepare("INSERT INTO Troncon (CodT, DuKm, AuKm, CodA) VALUES (:sectionCodT, :sectionDuKm, :sectionAuKm, :sectionCodA)");
      $query->bindParam(":sectionCodT", $sectionCodT);
      $query->bindParam(":sectionDuKm", $sectionDuKm);
      $query->bindParam(":sectionAuKm", $sectionAuKm);
      if(!empty($sectionIDPeage)) $query->bindParam(":sectionIDPeage", $sectionIDPeage);
      $query->bindParam(":sectionCodA", $sectionCodA);
      $query->execute();
    } else {
      if(!empty($sectionIDPeage)) $query = $db->prepare("UPDATE Troncon SET DuKm = :sectionDuKm, AuKm = :sectionAuKm, IDPeage = :sectionIDPeage, CodA = :sectionCodA WHERE CodT = :sectionCodT");
      else $query = $db->prepare("UPDATE Troncon SET DuKm = :sectionDuKm, AuKm = :sectionAuKm, CodA = :sectionCodA WHERE CodT = :sectionCodT");
      $query->bindParam(":sectionCodT", $sectionCodT);
      $query->bindParam(":sectionDuKm", $sectionDuKm);
      $query->bindParam(":sectionAuKm", $sectionAuKm);
      if(!empty($sectionIDPeage)) $query->bindParam(":sectionIDPeage", $sectionIDPeage);
      $query->bindParam(":sectionCodA", $sectionCodA);
      $query->execute();
    }
  }

  function deleteSection($CodT, $db) {
    $query = $db->prepare("DELETE FROM Troncon WHERE CodT = :CodT");
    $query->bindParam(":CodT", $CodT);
    $query->execute();
  }

  // Functions for register
  function getRegister($db) {
    $query = $db->prepare("SELECT * FROM Registre");
    $query->execute();
    $i = 0;
    $register = [];
    while($data = $query->fetch()) {
      $register[$i] = $data;
      $i++;
    }
    return $register;
  }

  function addModifyRegister($registerNumE, $registerDescription, $registerDateDebut, $registerDateFin, $registerCodT, $db) {
    $query = $db->prepare("SELECT NumE FROM Registre WHERE NumE = :registerNumE");
    $query->bindParam(":registerNumE", $registerNumE);
    $query->execute();
    $section = $query->fetch();
    if(empty($section)) {
      $query = $db->prepare("INSERT INTO Registre (NumE, Description, DateDebut, DateFin, CodT) VALUES (:registerNumE, :registerDescription, :registerDateDebut, :registerDateFin, :registerCodT)");
      $query->bindParam(":registerNumE", $registerNumE);
      $query->bindParam(":registerDescription", $registerDescription);
      $query->bindParam(":registerDateDebut", $registerDateDebut);
      $query->bindParam(":registerDateFin", $registerDateFin);
      $query->bindParam(":registerCodT", $registerCodT);
      $query->execute();
    } else {
      $query = $db->prepare("UPDATE Registre SET Description = :registerDescription, DateDebut = :registerDateDebut, DateFin = :registerDateFin, CodT = :registerCodT WHERE NumE = :registerNumE");
      $query->bindParam(":registerNumE", $registerNumE);
      $query->bindParam(":registerDescription", $registerDescription);
      $query->bindParam(":registerDateDebut", $registerDateDebut);
      $query->bindParam(":registerDateFin", $registerDateFin);
      $query->bindParam(":registerCodT", $registerCodT);
      $query->execute();
    }
    print_r($query->errorInfo());
  }

  function deleteRegister($NumE, $db) {
    $query = $db->prepare("DELETE FROM Registre WHERE NumE = :NumE");
    $query->bindParam(":NumE", $NumE);
    $query->execute();
  }
