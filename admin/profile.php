<?php
$nomPage = "profile";
include 'headerAdmin.php';
?>

<div class="container">
  <div class="main-body">

    <div aria-label="breadcrumb" class="main-breadcrumb">
      <div class="breadcrumb">
        Profile Admin
      </div>
    </div>
    <?php
    $admin = new admin();
    $admin->email = $_SESSION['nomUtilisateur'];
    $admin = $admin->rechercheAdminAvecEmail();
    ?>
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
              Vérifiez votre mot de passe
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
        <form action="../controle/modifierAdmin.php" method="POST" class="">
          <input class="form-control" type="hidden" name="id" value="<?php echo $admin->idAdmin; ?>">
          <div class="form-group">
            <label for="nf-email" class=" form-control-label">Adresse Email *</label>
            <input type="email" id="nf-email" name="email" placeholder="Entrer Email.." value="<?php echo $admin->email; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="nf-password" class=" form-control-label">Mot De Passe *</label>
            <input type="password" id="nf-password" name="password" placeholder="Entrer Password.." class="form-control">
          </div>
          <div class="form-group">
            <label for="nf-password" class=" form-control-label">Nouveau Mot De Passe</label>
            <input type="password" id="nf-password" name="newPassword" placeholder="Entrer Password.." class="form-control">
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
include 'footerAdmin.php';
?>