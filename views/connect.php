<h3>Gestion des connexions entre les villes et les sorties</h3>
<h4>Liste des connexions</h4>
<br>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Code postal</th>
      <th>ID Sortie</th>
      <th>Supprimer la connexion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($connects as $connect) { ?>
      <tr>
        <td><?php echo($connect["CodP"]) ?></td>
        <td><?php echo($connect["IDSortie"]) ?></td>
        <td><a href="admin.php?deleteConnect=<?php echo($connect["CodP"]) ?>&amp;deleteConnect2=<?php echo($connect["IdSortie"]) ?>&amp;page=connect"><p class="text-danger">Supprimer la connexion</p></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<br>
<h4>Ajouter une connexion</h4>
<form class="form-horizontal" method="post" action="admin.php?page=connect">
  <fieldset>
    <div class="form-group">
      <label for="inputPostC" class="col-lg-2 control-label">Code postal</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="75000" type="text" name="connectCodP">
      </div>
    </div>
    <div class="form-group">
      <label for="inputName" class="col-lg-2 control-label">ID de la sortie</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputName" placeholder="1" type="text" name="connectIdSortie">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Ajouter la connexion</button>
      </div>
    </div>
  </fieldset>
</form>
