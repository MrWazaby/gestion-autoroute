<h3>Gestion des villes</h3>
<h4>Liste des villes</h4>
<br>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>Nom de la ville</th>
      <th>Supprimer la ville</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($citys as $city) { ?>
      <tr>
        <td><?php echo($city["CodP"]) ?></td>
        <td><?php echo($city["Nom"]) ?></td>
        <td><a href="admin.php?deleteCity=<?php echo($city["CodP"]) ?>&amp;page=citys"><p class="text-danger">Supprimer la ville</p></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<br>
<h4>Ajouter/modifier une ville</h4>
<form class="form-horizontal" method="post" action="admin.php?page=citys">
  <fieldset>
    <div class="form-group">
      <label for="inputPostC" class="col-lg-2 control-label">Code postal</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="Code postal" type="text" name="cityCode">
      </div>
    </div>
    <div class="form-group">
      <label for="inputName" class="col-lg-2 control-label">Nom de la ville</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputName" placeholder="Paris" type="text" name="cityName">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Ajouter/modifier la ville</button>
      </div>
    </div>
  </fieldset>
</form>
