<?php
$nomPage = "Editer la réclamation";
include 'header.php';
?>
<div class="container">
    <div class="main-body">
        <div class="card">
            <div class="card-header">
                <strong>éditer votre réclamtion</strong>
            </div>
            <div class="card-body card-block">
                <?php
                if (!isset($_GET['id']) || $_GET['id'] == 0) {
                    header('location: ../error404.php');
                }
                $etudiant = new etudiant();
                $etudiant->cne = $_SESSION['nomUtilisateur'];
                $etudiant = $etudiant->rechercheEtudiantAvecCne();
                $reclamation = new reclamation();
                $reclamation->idReclamation = $_GET['id'];
                if (!$reclamation->estReclamationById()) {
                    header('location: ../error404.php');
                }
                $reclamation = $reclamation->getEtudiantReclamtion();
                if ($reclamation->idEtudiant != $etudiant->idEtudiant) {
                    header('location: ../error404.php');
                }
                ?>
                <?php
                if (isset($_GET['erreur']) && $_GET['erreur'] == 1) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        Vouz devez remplire le champ de réclamation
                    </div>
                <?php
                }
                ?>
                <?php
                if ($reclamation->etat != 1) {
                ?>
                    <form action="../controle/editReclamation.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $reclamation->idReclamation; ?>">
                        <input type="hidden" name="idetudiant" value="<?php echo $etudiant->idEtudiant; ?>">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Vous pouvez édité votre réclamation ici</label>
                            <textarea class="form-control" rows="3" name="reclamation"><?php echo $reclamation->reclamation; ?></textarea>
                        </div>
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i></i>Editer
                            </button>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <div class="alert alert-danger" role="alert">
                        Vouz ne pouvez pas modifier votre réclamtion maintenant
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>