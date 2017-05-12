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
    $register = $query->fetch();
    if(empty($register)) {
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

  // Functions for tools
  function getTools($db) {
    $query = $db->prepare("SELECT * FROM Peage");
    $query->execute();
    $i = 0;
    $tools = [];
    while($data = $query->fetch()) {
      $tools[$i] = $data;
      $i++;
    }
    return $tools;
  }

  function addModifyTool($toolPrix, $toolIDPeage, $tollCodT, $toolCode, $db) {
    $query = $db->prepare("SELECT IDPeage FROM Peage WHERE IDPeage = :toolIDPeage");
    $query->bindParam(":toolIDPeage", $toolIDPeage);
    $query->execute();
    $tool = $query->fetch();
    if(empty($tool)) {
      $query = $db->prepare("INSERT INTO Peage (Prix, IDPeage, CodT, Code) VALUES (:toolPrix, :toolIDPeage, :tollCodT, :toolCode)");
      $query->bindParam(":toolPrix", $toolPrix);
      $query->bindParam(":toolIDPeage", $toolIDPeage);
      $query->bindParam(":toolCodT", $toolCodT);
      $query->bindParam(":toolCode", $toolCode);
      $query->execute();
    } else {
      $query = $db->prepare("UPDATE Peage SET Prix = :toolPrix, CodT = :tollCodT, Code = :toolCode WHERE IDPeage = :toolIDPeage");
      $query->bindParam(":toolPrix", $toolPrix);
      $query->bindParam(":toolIDPeage", $toolIDPeage);
      $query->bindParam(":toolCodT", $toolCodT);
      $query->bindParam(":toolCode", $toolCode);
      $query->execute();
    }
  }

  function deleteTool($toolIDPeage, $db) {
    $query = $db->prepare("DELETE FROM Peage WHERE IDPeage = :toolIDPeage");
    $query->bindParam(":toolIDPeage", $toolIDPeage);
    $query->execute();
  }

  // Functions for citys
  function getCompanies($db) {
    $query = $db->prepare("SELECT * FROM Entreprise");
    $query->execute();
    $i = 0;
    $companies = [];
    while($data = $query->fetch()) {
      $companies[$i] = $data;
      $i++;
    }
    return $companies;
  }

  function addModifyCompany($companyCode, $companyNom, $companyCA, $companyDateContrat, $db) {
    $query = $db->prepare("SELECT Code FROM Entreprise WHERE Code = :companyCode");
    $query->bindParam(":companyCode", $companyCode);
    $query->execute();
    $company = $query->fetch();
    if(empty($company)) {
      $query = $db->prepare("INSERT INTO Entreprise (Code, Nom, CA, DateContrat) VALUES (:companyCode, :companyNom, :companyCA, :companyDateContrat)");
      $query->bindParam(":companyCode", $companyCode);
      $query->bindParam(":companyNom", $companyNom);
      $query->bindParam(":companyCA", $companyCA);
      $query->bindParam(":companyDateContrat", $companyDateContrat);
      $query->execute();
    } else {
      $query = $db->prepare("UPDATE Entreprise SET Nom = :companyNom, CA = :compagnyCA, DateContrat = :companyDateContrat WHERE Code = :companyCode");
      $query->bindParam(":companyCode", $companyCode);
      $query->bindParam(":companyNom", $companyNom);
      $query->bindParam(":companyCA", $companyCA);
      $query->bindParam(":companyDateContrat", $companyDateContrat);
      $query->execute();
    }
  }

  function deleteCompany($companyCode, $db) {
    $query = $db->prepare("DELETE FROM Entreprise WHERE Code = :companyCode");
    $query->bindParam(":companyCode", $companyCode);
    $query->execute();
  }

  // Functions for citys
  function getConnect($db) {
    $query = $db->prepare("SELECT * FROM joindre");
    $query->execute();
    $i = 0;
    $connect = [];
    while($data = $query->fetch()) {
      $connect[$i] = $data;
      $i++;
    }
    return $connect;
  }

  function addModifyConnect($connectCodP, $connectIdSortie, $db) {
    $query = $db->prepare("INSERT INTO joindre (CodP, IdSortie) VALUES (:connectCodP, :connectIdSortie)");
    $query->bindParam(":connectCodP", $connectCodP);
    $query->bindParam(":connectIdSortie", $connectIdSortie);
    $query->execute();
  }

  function deleteConnect($connectDelete1, $connectDelete2, $db) {
    $query = $db->prepare("DELETE FROM joindre WHERE CodP = :connectCodP AND IdSortie = :connectIdSortie");
    $query->bindParam(":connectCodP", $connectCodP);
    $query->bindParam(":connectIdSortie", $connectIdSortie);
    $query->execute();
  }
