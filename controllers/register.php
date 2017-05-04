<?php

  // Register Controller
  $page = "register";

  $errorMessage[0] = "Votre compte a été créé, vous pouvez maintenant vous connecter";
  $errorMessage[1] = "Les deux mot de passe ne correspondent pas";
  $errorMessage[2] = "Votre mot de passe doit faire au moins 5 caractères";
  $errorMessage[3] = "Votre pseudo doit faire au moins 5 caractère ou est déjà utilisé";
  $errorMessage[4] = "Vous devez remplir tous les champs";

  // Detect form submition
  if(isset($_POST["pseudo"])) {
    if(!empty($_POST["pseudo"]) && !empty($_POST["pass"]) && !empty($_POST["pass2"])) {
      if(strlen($_POST["pseudo"]) >= 5 && checkPseudo($_POST["pseudo"], $db)) {
        if(strlen($_POST["pass"]) >= 5) {
          if($_POST["pass"] == $_POST["pass2"]) {
            $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
            createNewUser($_POST["pseudo"], $pass, $db);
            $error = 0;
          } else $error = 1;
        } else $error = 2;
      } else $error = 3;
    } else $error = 4;
  }
