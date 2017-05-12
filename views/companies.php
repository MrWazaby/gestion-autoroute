<h3>Gestion des entreprises</h3>
<h4>Liste des entreprises</h4>
<br>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>Nom de l'entreprise</th>
      <th>Chiffre d'affaire</th>
      <th>Date de fin du contrat</th>
      <th>Supprimer l'entreprise</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($companies as $company) { ?>
      <tr>
        <td><?php echo($company["Code"]) ?></td>
        <td><?php echo($company["Nom"]) ?></td>
        <td><?php echo($company["CA"]) ?></td>
        <td><?php echo($company["DateContrat"]) ?></td>
        <td><a href="admin.php?deleteCompany=<?php echo($company["Code"]) ?>&amp;page=companies"><p class="text-danger">Supprimer l'entreprise</p></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<br>
<h4>Ajouter/modifier une entreprise</h4>
<form class="form-horizontal" method="post" action="admin.php?page=companies">
  <fieldset>
    <div class="form-group">
      <label for="inputName" class="col-lg-2 control-label">Code de l'entreprise</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputName" placeholder="1" type="text" name="companyCode">
      </div>
    </div>
    <div class="form-group">
      <label for="inputName" class="col-lg-2 control-label">Nom de l'entrerise</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputName" placeholder="Vinci" type="text" name="companyNom">
      </div>
    </div>
    <div class="form-group">
      <label for="inputName" class="col-lg-2 control-label">Chiffre d'affaire</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputName" placeholder="2000000" type="text" name="companyCA">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPostC" class="col-lg-2 control-label">Date de fin de contrat</label>
      <div class="col-lg-10">
        <div class="input-group date" data-provide="datepicker">
          <input type="text" class="form-control" name="companyDateContrat">
          <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Ajouter/modifier l'entreprise</button>
      </div>
    </div>
  </fieldset>
</form>
