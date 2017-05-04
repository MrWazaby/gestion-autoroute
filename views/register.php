<div class="col-lg-6 col-lg-offset-3">
  <form class="form-horizontal" method="post" action="register.php">
  <fieldset>
    <legend>Inscription</legend>
    <?php
      if(isset($error)) {
        ?>
        <div class="alert alert-dismissible <?php if($error == 0) echo "alert-success"; else echo "alert-danger"; ?>">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <?php echo $errorMessage[$error]; ?>
        </div>
        <?php
      }
    ?>
    <div class="form-group">
      <label for="inputPseudo" class="col-lg-2 control-label">Pseudo</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPseudo" placeholder="Pseudo" type="text" name="pseudo">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Mot de passe</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPassword" placeholder="Password" type="password" name="pass">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword2" class="col-lg-2 control-label">Comfirmer mot de passe</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPassword2" placeholder="Password" type="password" name="pass2">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Inscription</button>
      </div>
    </div>
  </fieldset>
</form>
</div>
