<div class="container">
  <h1 class="home_title">Rechercher un itinéraire</h1>
  <form class="col-lg-6 form-horizontal">
    <fieldset>
      <legend>Trajet</legend>
      <div class="form-group">
        <label for="inputStart" class="col-lg-2 control-label">Départ</label>
        <div class="col-lg-10">
          <input class="form-control" id="inputStart" placeholder="Je vous conduis ?" type="text">
        </div>
      </div>

      <div class="form-group">
        <label for="inputFinish" class="col-lg-2 control-label">Arrivée</label>
        <div class="col-lg-10">
          <input class="form-control" id="inputFinish" placeholder="Je n’ai jamais pu refuser quoi que ce soit d’une brune aux yeux marrons." type="text">
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
    <div class="panel panel-default">
      <div class="panel-heading">Route #1</div>
      <div class="panel-body">
        Prendre la route #1 dans la ville de Paris<br>
        Rouler pendant 212km<br>
        Prendre la sortie #12 direction route #3
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">Route #3</div>
      <div class="panel-body">
        Rouler pendant 212km<br>
        Prendre la sortie #2 direction Mareseille
      </div>
    </div>


    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Vous êtes arrivé !</h3>
      </div>
      <div class="panel-body">
        Nombre de km de cet itinéraire : 424
      </div>
    </div>
  </div>

</div>
