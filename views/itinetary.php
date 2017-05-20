<div class="container">
  <h1 class="home_title">Rechercher un itinéraire</h1>
  <form class="col-lg-6 form-horizontal" method="post" action="index.php">
    <fieldset>
      <legend>Trajet</legend>
      <div class="form-group">
        <label for="inputStart" class="col-lg-2 control-label">Départ</label>
        <div class="col-lg-10">
          <input class="form-control" id="inputStart" name="inputStart" placeholder="Je vous conduis ?" type="text">
        </div>
      </div>

      <div class="form-group">
        <label for="inputFinish" class="col-lg-2 control-label">Arrivée</label>
        <div class="col-lg-10">
          <input class="form-control" id="inputFinish" name="inputFinish" placeholder="Je n’ai jamais pu refuser quoi que ce soit d’une brune aux yeux marrons." type="text">
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
        Ville de départ ou d'arrivée incorrecte !
      </div>
    <?php } else if(isset($solution)) {
        sort($solution);
        foreach ($solution as $key => $value) {
          if($key != count($solution) - 1) { ?>

            <div class="panel panel-default">
              <div class="panel-heading">Route <?php echo($value["numero"]); ?></div>
              <div class="panel-body">
                Prendre la route #<?php echo($value["numero"]); ?> via <?php echo($value["label"]); ?> dans la ville de <?php echo($value["city"]); ?><br>
                Rouler pendant <?php echo($value["distance"]); ?>km<br>
              </div>
            </div>

          <?php } else { ?>

            <div class="panel panel-success">
              <div class="panel-heading">Vous êtes arrivé</div>
              <div class="panel-body">
                Prendre la sortie <?php echo($value["label"]); ?><br>
                Vous êtes arrivé à <?php echo($value["city"]); ?> !<br>
                Trajet total : km
              </div>
            </div>

          <?php }
        }
    } ?>
  </div>
</div>
