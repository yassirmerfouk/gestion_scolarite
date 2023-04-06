<?php
$nomPage = "Reclamtions";
include 'header.php';
?>
<?php
$etudiant = new etudiant();
$etudiant->cne = $_SESSION['nomUtilisateur'];
$etudiant = $etudiant->rechercheEtudiantAvecCne();
?>
<div class="container">
    <div class="main-body">
        <div class="card">
            <div class="card-header">
                <strong>Liste de mes réclamations</strong>
            </div>
            <div class="card-body card-block">
                <?php if (isset($_GET['validation']) && $_GET['validation'] == 1) {
                ?>
                    <div class="alert alert-success" role="alert">
                        Vouz avez ajouter la réclamation avec succès
                    </div>
                <?php
                }
                if (isset($_GET['validation']) && $_GET['validation'] == 2) {
                ?>
                    <div class="alert alert-success" role="alert">
                        Vouz avez éditer votre réclamation avec succès
                    </div>
                <?php
                }
                if (isset($_GET['validation']) && $_GET['validation'] == 3) {
                ?>
                    <div class="alert alert-success" role="alert">
                        Vouz avez supprimer votre réclamation avec succès
                    </div>
                <?php
                }

                ?>
                <?php
                $reclamations = new reclamation();
                $reclamations->idEtudiant = $etudiant->idEtudiant;
                $reclamations = $reclamations->getAllReclamationEtudiant();
                rsort($reclamations);
                ?>
                <div class="respensive-table">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Date de réclamtion</th>
                                <th class="text-center">Réclamation</th>
                                <th class="text-center">Etat</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($reclamations as $reclamation) {
                                ++$i;
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $i ?></td>
                                    <td class="text-center"><?php echo $reclamation->dateReclamation ?></td>
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
                                        <?php
                                        if ($reclamation->etat != 1) {
                                        ?>
                                            <a href="editReclamation.php?id=<?php echo $reclamation->idReclamation; ?>"><button class="btn btn-warning btn-sm mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></button></a>
                                        <?php
                                        }
                                        ?>
                                        <a href="reclamation.php?id=<?php echo $reclamation->idReclamation; ?>"><button class="btn btn-info btn-sm mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></button></a>
                                        <?php
                                        if ($reclamation->etat != 1) {
                                        ?>
                                            <form action="../controle/deleteReclamationFromEtudiant.php" method="POST" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo $reclamation->idReclamation ?>">
                                                <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger btn-sm mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash-alt"></i></button>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>