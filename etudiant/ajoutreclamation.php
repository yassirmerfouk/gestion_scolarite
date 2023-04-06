<?php
$nomPage = "ajouter une réclamation";
include 'header.php';
?>
<?php
$etudiant = new etudiant();
$etudiant->cne = $_SESSION['nomUtilisateur'];
$etudiant = $etudiant->rechercheEtudiantAvecCne();
?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Réclamation</strong>
    </div>
    <div class="card-body card-block">
      <?php
      if (isset($_GET['erreur']) && $_GET['erreur'] == 1) {
      ?>
        <div class="alert alert-danger" role="alert">
          Vouz devez ajouter une réclamation
        </div>
      <?php
      }
      ?>
      <form action="../controle/ajouteReclamation.php" method="POST" enctype="multipart/form-data">
        <input class="form-control" type="hidden" name="id" value="<?php echo $etudiant->idEtudiant; ?>">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Vous pouvez ajouté votre réclamation ici</label>
          <textarea class="form-control" rows="3" name="reclamation"></textarea>
        </div>
        <div class="col-8">
          <button type="submit" class="btn btn-primary btn-sm">
            <i></i> Envoyer
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
include 'footer.php';
?>