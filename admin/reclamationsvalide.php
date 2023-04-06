<?php
$nomPage = "Réclamtions traitées";
include 'headerAdmin.php';
?>
<div class="container">
    <div class="main-body">
        <div class="card">
            <div class="card-header">
                <strong>Liste des réclamations traitées</strong>
            </div>
            <div class="card-body card-block">
                <?php if (isset($_GET['validation']) && $_GET['validation'] == 1) {
                ?>
                    <div class="alert alert-success" role="alert">
                        Vouz avez supprimer la réclamation avec succès
                    </div>
                <?php
                } ?>
                <?php
                $reclamations = new reclamation();
                $reclamations = $reclamations->getAllReclamation();
                rsort($reclamations);
                ?>
                <div class="respensive-table">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Date de réclamtion</th>
                                <th class="text-center">Etudiant</th>
                                <th class="text-center">Réclamation</th>
                                <th class="text-center">Etat</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($reclamations as $reclamation) {
                                if ($reclamation->etat == 1) {
                                    ++$i;
                            ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i ?></td>
                                        <td class="text-center"><?php echo $reclamation->dateReclamation ?></td>
                                        <?php $etudiant = new etudiant();
                                        $etudiant->idEtudiant = $reclamation->idEtudiant;
                                        $etudiant = $etudiant->rechercheEtudiantAvecId();
                                        ?>
                                        <td class="text-center"><?php echo $etudiant->prenom . " " . $etudiant->nom; ?></td>
                                        <td style="word-break: break-all;"><?php echo $reclamation->reclamation ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($reclamation->etat == 1) {
                                            ?>
                                                <span class="badge badge-success">Traitée</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge badge-danger">Non traitée</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="reclamation.php?id=<?php echo $reclamation->idReclamation; ?>"><button class="btn btn-info btn-sm mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></button></a>
                                            <form action="../controle/deleteReclamationFromAdmin.php" method="POST" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo $reclamation->idReclamation ?>">
                                                <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger btn-sm mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } ?>
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