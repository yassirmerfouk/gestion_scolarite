<?php
$nomPage = "Annonce";
include 'header.php';
?>
<div class="container">
    <div class="main-body">
        <div class="card">
            <div class="card-header">
                <strong>Annonce</strong>
            </div>
            <div class="card-body card-block">
                <?php
                if (!isset($_GET['id']) || $_GET['id'] == 0) {
                    header('location: ../error404.php');
                }
                $annonce = new annonce();
                $annonce->idAnnonce = $_GET['id'];
                if (!$annonce->isAnnonceById()) {
                    header('location: ../error404.php');
                }
                $annonce = $annonce->searchAnnonceById();
                $etudiant = new etudiant();
                $etudiant->cne = $_SESSION['nomUtilisateur'];
                $etudiant = $etudiant->rechercheEtudiantAvecCne();
                if (!$annonce->isauthorizedToShowAnnonce($annonce->idAnnonce, $etudiant->idClasse)) {
                    header('location: ../error404.php');
                }
                ?>
                <h5 class="float-right"><?php echo $annonce->dateAnnonce; ?></h5><br>
                <h5>Annonce :</h5><br>
                <div>
                    <p class="text-dark font-weight-normal"><?php echo $annonce->annonce; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>