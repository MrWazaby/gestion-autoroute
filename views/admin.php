<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a aria-expanded="true" href="#citys" data-toggle="tab">Ville</a></li>
    <li class=""><a aria-expanded="false" href="#routes" data-toggle="tab">Autoroutes</a></li>
    <li class=""><a aria-expanded="false" href="#exits" data-toggle="tab">Sorties</a></li>
    <li class=""><a aria-expanded="false" href="#sections" data-toggle="tab">Troncons</a></li>
    <li class=""><a aria-expanded="false" href="#register" data-toggle="tab">Registre</a></li>
    <li class=""><a aria-expanded="false" href="#tolls" data-toggle="tab">Péages</a></li>
    <li class=""><a aria-expanded="false" href="#compagnys" data-toggle="tab">Entreprises</a></li>
  </ul>

  <div id="myTabContent" class="tab-content">
    <div class="tab-pane fade active in" id="citys">
      <?php include("views/citys.php"); ?>
    </div>
    <div class="tab-pane fade" id="routes">
      Autoroutes
    </div>
    <div class="tab-pane fade" id="exits">
      Sorties
    </div>
    <div class="tab-pane fade" id="sections">
      Troncons
    </div>
    <div class="tab-pane fade" id="register">
      Registre
    </div>
    <div class="tab-pane fade" id="tolls">
      Péages
    </div>
    <div class="tab-pane fade" id="compagnys">
      Entreprises
    </div>
  </div>
</div>
