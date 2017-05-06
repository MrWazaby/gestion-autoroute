<h3>Gestion du regsitre</h3>
<h4>Liste des entrées</h4>
<br>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>Description</th>
      <th>Date début</th>
      <th>Date fin</th>
      <th>Tronçon associé</th>
      <th>Supprimer l'entrée</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($registers as $register) { ?>
      <tr>
        <td><?php echo($register["NumE"]) ?></td>
        <td><?php echo($register["Description"]) ?></td>
        <td><?php echo($register["DateDebut"]) ?></td>
        <td><?php echo($register["DateFin"]) ?></td>
        <td><?php echo($register["CodT"]) ?></td>
        <td><a href="admin.php?deleteRegister=<?php echo($register["NumE"]) ?>&amp;page=register"><p class="text-danger">Supprimer l'entrée</p></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<br>
<h4>Ajouter/modifier une entrée</h4>
<form class="form-horizontal" method="post" action="admin.php?page=register">
  <fieldset>
    <div class="form-group">
      <label for="inputPostC" class="col-lg-2 control-label">Numéro de l'entrée</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="1" type="text" name="registerNumE">
      </div>
    </div><div class="form-group">
      <label for="inputPostC" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="Traveaux..." type="text" name="registerDescription">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPostC" class="col-lg-2 control-label">Date de début</label>
      <div class="col-lg-10">
        <div class="input-group date" data-provide="datepicker">
          <input type="text" class="form-control" name="registerDateDebut">
          <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPostC" class="col-lg-2 control-label">Date de fin</label>
      <div class="col-lg-10">
        <div class="input-group date" data-provide="datepicker">
          <input type="text" class="form-control" name="registerDateFin">
          <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPostC" class="col-lg-2 control-label">Tronçon associé</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPostc" placeholder="1" type="text" name="registerCodT">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Ajouter/modifier l'entrée</button>
      </div>
    </div>
  </fieldset>
</form>
