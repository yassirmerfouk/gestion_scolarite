<?php
$nomPage = "ajout message";
include 'headerAdmin.php';
?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
$id_reg= $_GET['idEtudiant'];
?>

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Ajouter un message</strong>
    </div>
    <div class="card-body card-block">
      <div class="container spacer col-md-6 col-xs-12 col-md-offset-3">

        <div class="panel panel-default">
          <div class="panel-heading">boite message</div>
          <div class="panel-body">
            <form method="post" action="../controle/ajoutMessage.php?idEtudiant=<?php echo $id_reg ?>" enctype="multipart/form-data">




              <div class="form-group">
                <label class="control-label">veuillez tapes votre message ici</label>
                <textarea class="form-control" rows="3" name="message"></textarea>
              </div>
              <div>
                <button type="submit" class="btn btn-primary btn-sm">envoyer</button>
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