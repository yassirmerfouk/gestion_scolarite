<?php
$nomPage = "ajout document";
include 'headerAdmin.php';
?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Doument</strong>
    </div>
    <div class="card-body card-block">
      <?php
      if (isset($_GET['erreur']) && $_GET['erreur'] == 1) {
      ?>
        <div class="alert alert-danger" role="alert">
          Vouz devez ajouter un document
        </div>
      <?php
      }
      
      if (isset($_GET['erreur']) && $_GET['erreur'] == 2) {
      ?>
        <div class="alert alert-danger" role="alert">
            Seules les fichiers PDF sont autorisés
        </div>
      <?php
      }
      if (isset($_GET['validation']) && $_GET['validation'] == 1) {
      ?>
        <div class="alert alert-success" role="alert">
          Vouz avez ajouter le document avec succès
        </div>
      <?php
      }
      ?>
      <form action="../controle/ajouteDocument.php" method="POST" enctype="multipart/form-data">
        <input  type="hidden" name="id" value="<?php echo $_GET['id']?>">
        <div class="form-group">
          <input class="form-control" type="file" name="file"  required>
        </div>
        <div class="col-8">
          <button type="submit" class="btn btn-primary btn-sm">
            <i></i> Envoyer le fichier
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
include 'footerAdmin.php';
?>