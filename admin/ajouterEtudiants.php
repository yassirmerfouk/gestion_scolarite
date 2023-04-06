<?php
$nomPage = 'Ajouter étudiants';
include 'headerAdmin.php';
?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Ajouter des étudiants</strong>
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
          Vouz devez ajouter un document excel
        </div>
        <?php
      }
      if (isset($_GET['validation'])) {
        if ($_GET['validation'] == 1) {
        ?>
          <div class="alert alert-success" role="alert">
            Vouz avez ajouter la liste d'étudiants avec succès
          </div>
      <?php
        }
      }
      ?>
      <div class="card-body card-block">
        <form action="../controle/enregistrerEtudiants.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label class=" form-control-label"><strong>Vouz pouvez ajouter le document qui contient la liste d'étudiants admis ici</strong></label>
            <div class="border p-2">
              <input type="file" class="form-control-file" name="fichier">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-sm">
            <i></i> Enregistrer
          </button>
          <form>
      </div>
    </div>
  </div>
</div>
<?php
include 'footerAdmin.php';
?>