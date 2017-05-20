<?php

  // Register model

  // Try to log in an user
  function userLogin($pseudo, $pass, $db) {
    $query = $db->prepare("SELECT * FROM User WHERE pseudo = :pseudo");
    $query->bindParam(":pseudo", $pseudo);
    $query->execute();
    $user = $query->fetch();
    if(password_verify($pass, $user["Pass"])) {
      $data["pseudo"] = $user["Pseudo"];
      $data["role"] = $user["Role"];
      $data["IDUser"] = $user["IDUser"];
      return $data;
    }

    return null;
  }
