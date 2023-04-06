<?php
$nomPage = "Accueil";
include 'header.php';
?>

<div class="col-sm-12 mb-4">
    <div class="card-group">
        <div class="card col-md-6 no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fas fa-folder"></i>
                </div>

                <div class="h4 mb-0">
                    <span class="count">2</span>
                </div>

                <small class="text-muted text-uppercase font-weight-bold">Mes demandes</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
            </div>
        </div>
        <div class="card col-md-6 no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-inbox"></i>
                </div>
                <div class="h4 mb-0">
                    <span class="count">4</span>
                </div>
                <small class="text-muted text-uppercase font-weight-bold">Mes réclamations</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
            </div>
        </div>
        <div class="card col-md-6 no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fas fa-file-pdf"></i>
                </div>
                <div class="h4 mb-0">
                    <span class="count">1</span>
                </div>
                <small class="text-muted text-uppercase font-weight-bold">Mes documents</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>