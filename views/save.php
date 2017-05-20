<div class="container">
  <h3>Liste de vos itinéraires</h3>
  <br>
  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th>Départ</th>
        <th>Arrivée</th>
        <th>Lien du trajet</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($itinetarys as $itinetary) { ?>
        <tr>
          <td><?php echo($itinetary["Debut"]) ?></td>
          <td><?php echo($itinetary["Fin"]) ?></td>
          <td>
            <form method="post" action="index.php">
              <input type="hidden" value="<?php echo($itinetary["Debut"]) ?>" name="inputStart">
              <input type="hidden" value="<?php echo($itinetary["Fin"]) ?>" name="inputFinish">
              <button type="submit" class="btn btn-default btn-xs">Voir mon intinéraire</button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <br>
</div>
