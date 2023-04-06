<?php
$nomPage = "Reclamtion";
include 'header.php';
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

                <h5 class="float-right"><?php echo $reclamation->dateReclamation; ?></h5><br>
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
include 'footer.php';
?>