<?php
$nomPage = "Accueil";
include 'headerAdmin.php';
?>
<div class="col-sm-12 mb-4">
    <div class="card-group">
        <div class="card col-md-6 no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-users"></i>
                </div>

                <div class="h4 mb-0">
                    <span class="count"><?php echo etudiant::compteurEtudiantsAdmis(); ?></span>
                </div>

                <small class="text-muted text-uppercase font-weight-bold">Etudiants Admis</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
            </div>
        </div>
        <div class="card col-md-6 no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-user-plus"></i>
                </div>
                <div class="h4 mb-0">
                    <span class="count"><?php echo etudiant::compteurEtudiantsInscrit(); ?></span>
                </div>
                <small class="text-muted text-uppercase font-weight-bold">Etudiants Inscrits</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
            </div>
        </div>
        <div class="card col-md-6 no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-folder-open-o"></i>
                </div>
                <div class="h4 mb-0">
                    <span class="count">30</span>
                </div>
                <small class="text-muted text-uppercase font-weight-bold">Demandes en attentes</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
            </div>
        </div>
        <div class="card col-md-6 no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-inbox"></i>
                </div>
                <div class="h4 mb-0">
                    <span class="count"><?php echo reclamation::compteurReclamationsNonTraite() ?></span>
                </div>
                <small class="text-muted text-uppercase font-weight-bold">Réclamations non traitées</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
            </div>
        </div>
    </div>
</div>


<?php
include 'footerAdmin.php';
?>