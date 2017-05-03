<?php

  // DB configuration :
  $CONFIG['host'] = "localhost";
  $CONFIG['db'] = "autoroute";
  $CONFIG['user'] = "autoroute";
  $CONFIG['pass'] = "autoroot";

  // Dont change this:
	try {
	    $db = new PDO('mysql:host='.$CONFIG['host'].';dbname='.$CONFIG['db'].';',$CONFIG['user'], $CONFIG['pass']);
	}

  catch(Exception $error) {
	    die('Erreur :'.$error->getMessage());
	}


?>
