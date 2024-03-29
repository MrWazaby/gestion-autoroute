<div class="container">
  <h1 class="home_title">Rechercher un itinéraire</h1>
  <form class="col-lg-6 form-horizontal" method="post" action="index.php">
    <fieldset>
      <legend>Trajet</legend>
      <div class="form-group">
        <label for="inputStart" class="col-lg-2 control-label">Départ</label>
        <div class="col-lg-10">
          <input class="form-control" id="inputStart" name="inputStart" placeholder="Je vous conduis ?" type="text" value="<?php if(isset($_POST['inputStart'])) echo($_POST['inputStart']); ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="inputFinish" class="col-lg-2 control-label">Arrivée</label>
        <div class="col-lg-10">
          <input class="form-control" id="inputFinish" name="inputFinish" placeholder="Je n’ai jamais pu refuser quoi que ce soit d’une brune aux yeux marrons." type="text" value="<?php if(isset($_POST['inputFinish'])) echo($_POST['inputFinish']); ?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="submit" class="btn btn-primary">Chercher mon trajet</button>
        </div>
      </div>
    </fieldset>
  </form>

  <div class="col-lg-6">
    <legend>Meilleur parcours</legend>
    <?php if(isset($error)) { ?>
      <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php if($error == 1) { ?>
          Ville de départ ou d'arrivée est incorrecte !
        <?php } else { ?>
          Il n y a pas encore de trajet possible pour cet itiniéraire !
        <?php } ?>
      </div>
    <?php } else if(isset($solution)) {
        //print_r($solution);
        foreach ($solution as $key => $value) {
          if($key != count($solution) - 1) { ?>

            <div class="panel panel-default">
              <div class="panel-heading">Route <?php echo($value["numero"]); ?></div>
              <div class="panel-body">
                <?php if($value["distance"] == 0) { ?>
                  Prendre la sortie #<?php echo($value["numero"]); ?> (<?php echo($value["label"]); ?>) pour arriver dans la ville de <?php echo($value["city"]); ?><br>
                <?php } else { ?>
                  Prendre la route #<?php echo($value["route"]); ?> via <?php echo($value["label"]); ?> dans la ville de <?php echo($value["city"]); ?><br>
                  Rouler pendant <?php echo($value["distance"]); ?>km<br>
                <?php } ?>
              </div>
            </div>

          <?php } else { ?>

            <div class="panel panel-success">
              <div class="panel-heading">Vous êtes arrivé</div>
              <div class="panel-body">
                Prendre la sortie <?php echo($value["label"]); ?><br>
                Vous êtes arrivé à <?php echo($value["city"]); ?> !<br>
                Trajet total : <?php echo($lowest_weight); ?>km<br>
                Prix du trajet : <?php echo($price); ?>€
              </div>
            </div>

            <?php if(isset($_SESSION['online'])) { ?><a href="save.php?start=<?php echo($_POST['inputStart']); ?>&amp;end=<?php echo($_POST['inputFinish']); ?>" class="btn btn-primary btn-xs">Sauvegarder mon trajet</a><br><?php } ?>
            <br>

          <?php }
        }
    } else { ?>
      Un petit gif au hasard en attendant votre itinéraire ?<br>
      <br>
      <img id="gif" src="" alt="gif"><br>
      <br>
    <?php } ?>
  </div>
</div>
