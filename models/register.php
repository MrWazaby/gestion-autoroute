<?php

  // Register model

  // Check if a pseudo already exist
  function checkPseudo($pseudo, $db) {
    $query = $db->prepare("SELECT pseudo FROM User WHERE pseudo = :pseudo");
    $query->bindParam(":pseudo", $pseudo);
    $query->execute();
    $user = $query->fetch();
    if(empty($user)) return true;
    return false;
  }

  // Create a new user
  function createNewUser($pseudo, $pass, $db) {
    $query = $db->prepare("INSERT INTO User (pseudo, pass, role) VALUES (:pseudo, :pass, 'user')");
    $query->bindParam(":pseudo", $pseudo);
    $query->bindParam(":pass", $pass);
    $query->execute();
  }
