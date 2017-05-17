<h3>Gestion des tronçons</h3>
<h4>Liste des tronçons</h4>
<br>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>Du km</th>
      <th>Au km</th>
      <th>Autoroute associé</th>
      <th>Supprimer le tronçon</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sections as $section) { ?>
      <tr>
        <td><?php echo($section["CodT"]) ?></td>
        <td><?php echo($section["DuKm"]) ?></td>
        <td><?php echo($section["AuKm"]) ?></td>
        <td><?php echo($section["CodA"]) ?></td>
        <td><a href="admin.php?deleteSection=<?php echo($section["CodT"]) ?>&amp;page=sections"><p class="text-danger">Supprimer le tronçon</p></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<br>
<h4>Ajouter/modifier un tronçon</h4>
<form class="form-horizontal" method="post" action="admin.php?page=sections">
  <fieldset>
    <div class="form-group">
      <label for="inputCodT" class="col-lg-2 control-label">Code du tronçon</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="1" type="text" name="sectionCodT">
      </div>
    </div>
    <div class="form-group">
      <label for="inputCodT" class="col-lg-2 control-label">Du KM</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="1" type="text" name="sectionDuKm">
      </div>
    </div>
    <div class="form-group">
      <label for="inputCodT" class="col-lg-2 control-label">Au KM</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="1" type="text" name="sectionAuKm">
      </div>
    </div>
    <div class="form-group">
      <label for="inputCodT" class="col-lg-2 control-label">ID de l'autoroute associé</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="1" type="text" name="sectionCodA">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Ajouter/modifier le tronçon</button>
      </div>
    </div>
  </fieldset>
</form>
