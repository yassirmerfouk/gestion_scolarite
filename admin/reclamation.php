<?php
$nomPage = "Réclamtion";
include 'headerAdmin.php';
?>
<div class="container">
    <div class="main-body">
        <div class="card">
            <div class="card-header">
                <strong>Réclamtion</strong>
            </div>
            <div class="card-body card-block">
                <?php
                if (!isset($_GET['id']) || $_GET['id'] == 0) {
                    header('location: ../error404.php');
                }
                $reclamation = new reclamation();
                $reclamation->idReclamation = $_GET['id'];
                if (!$reclamation->estReclamationById()) {
                    header('location: ../error404.php');
                }
                ?>
                <?php
                $reclamation = $reclamation->getEtudiantReclamtion();
                ?>
                <h5 class="float-right"><?php echo $reclamation->dateReclamation; ?></h5><br>
                <?php
                $etudiant = new Etudiant();
                $etudiant->idEtudiant = $reclamation->idEtudiant;
                $etudiant = $etudiant->rechercheEtudiantAvecId();
                ?>
                <h5>Etudiant : <?php echo $etudiant->prenom . " " . $etudiant->nom; ?></h5><br>
                <h5>Réclamation :</h5><br>
                <div>
                    <p class="text-dark font-weight-normal"><?php echo $reclamation->reclamation; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footerAdmin.php';
?>