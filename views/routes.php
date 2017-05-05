<h3>Gestion des autoroutes</h3>
<h4>Liste des autoroutes</h4>
<br>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>Supprimer l'autoroute</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($routes as $route) { ?>
      <tr>
        <td><?php echo($route["CodA"]) ?></td>
        <td><a href="admin.php?deleteRoute=<?php echo($route["CodA"]) ?>&amp;page=routes"><p class="text-danger">Supprimer l'autoroute</p></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<br>
<h4>Ajouter une autoroute</h4>
<form class="form-horizontal" method="post" action="admin.php?page=routes">
  <fieldset>
    <div class="form-group">
      <label for="inputRouteCode" class="col-lg-2 control-label">Code autoroute</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputRouteCode" placeholder="Code Autoroute" type="text" name="routeCode">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Ajouter autoroute</button>
      </div>
    </div>
  </fieldset>
</form>
