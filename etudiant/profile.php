<?php
$nomPage = "profile";
include 'header.php';
?>

<div class="container">
  <div class="main-body">

    <div aria-label="breadcrumb" class="main-breadcrumb">
      <div class="breadcrumb">
        Profile etudiant
      </div>
    </div>
    <?php
    $etudiant = new etudiant();
    $etudiant->cne = $_SESSION['nomUtilisateur'];
    $etudiant = $etudiant->rechercheEtudiantAvecCne();
    $classe = new classe();
    $classe->idClasse = $etudiant->idClasse;
    $classe = $classe->rechercheClasseAvecId();
    ?>
    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="../admin/imagesEtudiants/<?php if (empty($etudiant->image)) {
                                                    echo "none.png";
                                                  } else {
                                                    echo $etudiant->image;
                                                  } ?>" alt="etudiant" class="rounded-circle" width="200">
              <div class="mt-3">
                <h4><?php echo $etudiant->nom . " " . $etudiant->prenom; ?></h4>
                <p class="text-secondary mb-1"><?php echo $etudiant->email; ?></p>
                <p class="text-muted font-size-sm"><?php echo $etudiant->adresse; ?></p>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Nom et Prenom</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $etudiant->nom . " " . $etudiant->prenom; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Classe</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $classe->nomClasse; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">CNE</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $etudiant->cne; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Adresse Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $etudiant->email; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Telephone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $etudiant->telephone; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Adresse</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $etudiant->adresse; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <strong>Modifier vos informations</strong>
      </div>
      <div class="card-body card-block">
        <?php
        if (isset($_GET['erreur'])) {
          if ($_GET['erreur'] == 1) {
        ?>
            <div class="alert alert-danger" role="alert">
              Vous devez remplire les champs (*)
            </div>
          <?php
          }
          if ($_GET['erreur'] == 2) {
          ?>
            <div class="alert alert-danger" role="alert">
              Vérifier votre mot de passe
            </div>
          <?php
          }
          if ($_GET['erreur'] == 3) {
          ?>
            <div class="alert alert-danger" role="alert">
              Vouz devez utiliser un autre email
            </div>
          <?php
          }
          if ($_GET['erreur'] == 4) {
          ?>
            <div class="alert alert-danger" role="alert">
              Vouz devez ajouter une image
            </div>
          <?php
          }
        }
        if (isset($_GET['validation'])) {
          if ($_GET['validation'] == 1) {
          ?>
            <div class="alert alert-success" role="alert">
              Vous avez changer vos informations avec succès
            </div>
        <?php
          }
        }
        ?>
        <form action="../controle/modifierEtudiant.php" method="POST" enctype="multipart/form-data">
          <input class="form-control" type="hidden" name="id" value="<?php echo $etudiant->idEtudiant; ?>">
          <div class="form-group">
            <label for="nf-email" class=" form-control-label">Adresse Email *</label>
            <input type="email" name="email" placeholder="Entrer adresse email" value="<?php echo $etudiant->email; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="nf-password" class=" form-control-label">Mot De Passe *</label>
            <input type="password" name="password" placeholder="Entrer le mot de passe.." class="form-control">
          </div>
          <div class="form-group">
            <label for="nf-password" class=" form-control-label">Nouveau Mot De Passe</label>
            <input type="password" name="nouveauPassword" placeholder="Entrer le nouveau mot de passe.." class="form-control">
          </div>
          <div class="form-group">
            <label for="nf-password" class=" form-control-label">Telephone *</label>
            <input type="text" name="telephone" placeholder="Entrer Numero Telephone.." value="<?php echo $etudiant->telephone; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="nf-password" class=" form-control-label">Adresse *</label>
            <input type="text" name="adresse" placeholder="Entrer Adresse.." value="<?php echo $etudiant->adresse; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="nf-password" class=" form-control-label">Image</label>
            <div class="border">
              <input type="file" class="form-control-file m-1" name="image">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
              <i></i> Modifier
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php
include 'footer.php';
?>