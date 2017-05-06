<h3>Gestion des sorties</h3>
<h4>Liste des sorties</h4>
<br>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>Libelle de la sortie</th>
      <th>Numero de la sortie</th>
      <th>Code tronçon associé</th>
      <th>Supprimer la sortie</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($exits as $exit) { ?>
      <tr>
        <td><?php echo($exit["idSortie"]) ?></td>
        <td><?php echo($exit["Libelle"]) ?></td>
        <td><?php echo($exit["Numero"]) ?></td>
        <td><?php echo($exit["CodT"]) ?></td>
        <td><a href="admin.php?deleteExit=<?php echo($exit["idSortie"]) ?>&amp;page=exits"><p class="text-danger">Supprimer la sortie</p></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<br>
<h4>Ajouter/modifier une sortie</h4>
<form class="form-horizontal" method="post" action="admin.php?page=exits">
  <fieldset>
    <div class="form-group">
      <label for="inputIds" class="col-lg-2 control-label">ID de la sortie</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputIds" placeholder="1" type="text" name="exitId">
      </div>
    </div>
    <div class="form-group">
      <label for="inputLibelle" class="col-lg-2 control-label">Libelle</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputLibelle" placeholder="libelle" type="text" name="exitLabel">
      </div>
    </div>
    <div class="form-group">
      <label for="inputNumero" class="col-lg-2 control-label">Numéro</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputNumero" placeholder="1" type="text" name="exitNumero">
      </div>
    </div>
    <div class="form-group">
      <label for="inputcodt" class="col-lg-2 control-label">Code tronçon associé</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputcodt" placeholder="1" type="text" name="exitCodT">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Ajouter/modifier la sortie</button>
      </div>
    </div>
  </fieldset>
</form>
