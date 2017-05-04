<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Gestion d'autoroute</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li <?php if($page == "index") echo 'class="active"'; ?>><a href="/">Trouver un trajet</a></li>
          <?php if(!isset($_SESSION["online"])) { ?>
            <li <?php if($page == "login") echo 'class="active"'; ?>><a href="login.php">Connexion</a></li>
            <li <?php if($page == "register") echo 'class="active"'; ?>><a href="register.php">Inscription</a></li>
          <?php } else { ?>
            <li <?php if($page == "save") echo 'class="active"'; ?>><a href="#">Mes trajets sauvegardés</a></li>
            <?php if($_SESSION["user"]["role"] == "admin") { ?>
              <li <?php if($page == "admin") echo 'class="active"'; ?>><a href="admin.php">Administration</a></li>
            <?php } ?>
          <?php } ?>
        </ul>
        <?php if(isset($_SESSION["online"])) { ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Déconnexion</a></li>
          </ul>
        <?php } ?>
      </div>
    </div>
  </nav>
