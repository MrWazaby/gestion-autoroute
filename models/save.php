<?php

  // Save model

  // Function to save the intinetary
  function saveItinetary($id, $start, $end, $db) {
    $query = $db->prepare("INSERT INTO Trajet (IDUser, Debut, Fin) VALUES (:id, :start, :theEnd)");
    $query->bindParam(":id", $id);
    $query->bindParam(":start", $start);
    $query->bindParam(":theEnd", $end);
    $query->execute();
  }

  // Function to get the list of all saved values
  function getList($id, $db) {
    $query = $db->prepare("SELECT * FROM Trajet WHERE IDUser = :id");
    $query->bindParam(":id", $id);
    $query->execute();
    $i = 0;
    $list = array();
    while($data = $query->fetch()) {
      $list[$i] = $data;
      $i++;
    }
    return $list;
  }
