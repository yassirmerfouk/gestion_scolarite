<?php
$nomPage = "Etudiant";
include 'headerAdmin.php';
?>
<div class="container">
    <?php
    if (!isset($_GET['id']) || $_GET['id'] == 0) {
        header('location: ../error404.php');
    }
    $etudiant = new etudiant();
    $etudiant->idEtudiant = $_GET['id'];
    if (!$etudiant->isEtudiantById()) {
        header('location: ../error404.php');
    }
    $etudiant = $etudiant->rechercheEtudiantAvecId();
    ?>
    <div class="main-body">

        <div aria-label="breadcrumb" class="main-breadcrumb">
            <div class="breadcrumb">
                Profile etudiant
            </div>
        </div>
        <?php
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
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Copie de BAC</h6>
                            </div>
                            <?php
                            if (!empty($etudiant->copyBac)) {
                            ?>
                                <div class="col-sm-9 text-secondary">
                                    <a href="../admin/copyBac/<?php echo $etudiant->copyBac; ?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;<?php echo $etudiant->copyBac; ?></a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Copie de CIN</h6>
                            </div>
                            <?php
                            if (!empty($etudiant->copyCin)) {
                            ?>
                                <div class="col-sm-9 text-secondary">
                                    <a href="../admin/copyCin/<?php echo $etudiant->copyCin; ?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;<?php echo $etudiant->copyCin; ?></a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footerAdmin.php';
?>