<h3>Gestion des péages</h3>
<h4>Liste des péages</h4>
<br>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>Prix (€)</th>
      <th>Tronçon associé</th>
      <th>Entreprise associée</th>
      <th>Supprimer le péage</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tools as $tool) { ?>
      <tr>
        <td><?php echo($tool["IDPeage"]) ?></td>
        <td><?php echo($tool["Prix"]) ?></td>
        <td><?php echo($tool["CodT"]) ?></td>
        <td><?php echo($tool["Code"]) ?></td>
        <td><a href="admin.php?deleteTool=<?php echo($tool["IDPeage"]) ?>&amp;page=tools"><p class="text-danger">Supprimer le péages</p></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<br>
<h4>Ajouter/modifier un péage</h4>
<form class="form-horizontal" method="post" action="admin.php?page=tolls">
  <fieldset>
    <div class="form-group">
      <label for="inputPostC" class="col-lg-2 control-label">ID du péage</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="1" type="text" name="toolIDPeage">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPostC" class="col-lg-2 control-label">Prix (€)</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="1" type="text" name="toolPrix">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPostC" class="col-lg-2 control-label">Tronçon associé</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="1" type="text" name="toolCodT">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPostC" class="col-lg-2 control-label">Entreprise associée</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="1" type="text" name="toolCode">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Ajouter/modifier le péage</button>
      </div>
    </div>
  </fieldset>
</form>
