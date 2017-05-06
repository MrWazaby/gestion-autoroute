<div class="container">
  <ul class="nav nav-tabs">
    <li class="<?php echo getPageAct('citys'); ?>"><a <?php echo getPageExp('citys'); ?> href="#citys" data-toggle="tab">Ville</a></li>
    <li class="<?php echo getPageAct('routes'); ?>"><a <?php echo getPageExp('routes'); ?> href="#routes" data-toggle="tab">Autoroutes</a></li>
    <li class="<?php echo getPageAct('exits'); ?>"><a <?php echo getPageExp('exits'); ?> href="#exits" data-toggle="tab">Sorties</a></li>
    <li class="<?php echo getPageAct('sections'); ?>"><a <?php echo getPageExp('sections'); ?> href="#sections" data-toggle="tab">Troncons</a></li>
    <li class="<?php echo getPageAct('register'); ?>"><a <?php echo getPageExp('register'); ?> href="#register" data-toggle="tab">Registre</a></li>
    <li class="<?php echo getPageAct('tolls'); ?>"><a <?php echo getPageExp('tolls'); ?> href="#tolls" data-toggle="tab">Péages</a></li>
    <li class="<?php echo getPageAct('compagnys'); ?>"><a <?php echo getPageExp('compagnys'); ?> href="#compagnys" data-toggle="tab">Entreprises</a></li>
  </ul>

  <div id="myTabContent" class="tab-content">
    <div class="tab-pane fade<?php echo getPagePane('citys'); ?>" id="citys">
      <?php include("views/citys.php"); ?>
    </div>
    <div class="tab-pane fade<?php echo getPagePane('routes'); ?>" id="routes">
      <?php include("views/routes.php"); ?>
    </div>
    <div class="tab-pane fade<?php echo getPagePane('exits'); ?>" id="exits">
      <?php include("views/exits.php"); ?>
    </div>
    <div class="tab-pane fade<?php echo getPagePane('sections'); ?>" id="sections">
      <?php include("views/sections.php"); ?>
    </div>
    <div class="tab-pane fade<?php echo getPagePane('register'); ?>" id="register">
      <?php include("views/aregister.php"); ?>
    </div>
    <div class="tab-pane fade<?php echo getPagePane('tolls'); ?>" id="tolls">
      <?php include("views/tools.php"); ?>
    </div>
    <div class="tab-pane fade<?php echo getPagePane('compagnys'); ?>" id="compagnys">
      Entreprises
    </div>
  </div>
</div>
