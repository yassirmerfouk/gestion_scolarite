<?php
$nomPage = "Edit demande";
include 'headerAdmin.php';
?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
$stmt = $pdo->prepare('SELECT * FROM demandes WHERE IDDEMANDE=?');
$stmt->execute(array($_GET['id']));
$demande = $stmt->fetch();

?>

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>EDITE DEMANDE</strong>
    </div>
    <div class="card-body card-block">
      <div class="container spacer col-md-6 col-xs-12 col-md-offset-3">

        <div class="panel panel-default">
          <div class="panel-heading">Edite etat de demande</div>
          <div class="panel-body">
            <form method="post" action="../controle/UpdateDemande.php" enctype="multipart/form-data">


              <input type="hidden" name="id" value="<?php echo ($demande['IDDEMANDE']) ?>" class="form-control" />

              <div class="form-group">
                <label class="control-label">Etat:</label>
                <select class="form-control" name="etat">
                  <option <?php if ($demande['ETATDEMANDE'] == 'En attente') { ?> selected <?php } ?>value="En attente">en attente</option>
                  <option <?php if ($demande['ETATDEMANDE'] == 'valide') { ?> selected <?php } ?>value="validé">validé</option>

                </select>
              </div>


              <div>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
              </div>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

</body>

</html>
<?php
include 'footerAdmin.php';
?>