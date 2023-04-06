<?php
$nomPage = "Liste etudiants";
include 'headerAdmin.php';
?>

<div class="container">
    <div class="main-body">
        <div class="card">
            <?php
            $classe = new classe();
            $classe->idClasse = $_GET['id'];
            if (!isset($_GET['id']) || $_GET['id'] == 0) {
                header('location: ../error404.php');
            }
            if (!$classe->isClasseById()) {
                header('location: ../error404.php');
            }
            $classe = $classe->rechercheClasseAvecId();
            $etudiants = $classe->getEtudiantsByClasseId();
            ?>
            <div class="card-header">
                <strong>Liste d'étudiants <?php echo $classe->nomClasse; ?></strong>
            </div>
            <div class="card-body card-block">

                <div class="respensive-table">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">NOM ET PRENOM</th>
                                <th class="text-center">CLASSE</th>
                                <th class="text-center">CNE</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($etudiants as $etudiant) {
                                $i++;
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td class="text-center"><?php echo $etudiant->nom . ' ' . $etudiant->prenom; ?></td>

                                    <td class="text-center"><?php echo $classe->nomClasse; ?></td>
                                    <td class="text-center" style="word-break: break-all;"><?php echo $etudiant->cne; ?></td>
                                    <td class="text-center"><?php echo $etudiant->email; ?></td>
                                    <td class="text-center">
                                        <a href="etudiant.php?id=<?php echo $etudiant->idEtudiant; ?>"><button class="btn btn-info btn-sm mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></button></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footerAdmin.php';
?>