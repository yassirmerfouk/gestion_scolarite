<?php
$nomPage = "Annonces";
include 'headerAdmin.php';
?>
<div class="container">
    <div class="main-body">
        <div class="card">
            <div class="card-header">
                <strong>Liste des annonces</strong>
            </div>
            <div class="card-body card-block">
                <?php if (isset($_GET['validation']) && $_GET['validation'] == 1) {
                ?>
                    <div class="alert alert-success" role="alert">
                        Vouz avez ajouter l'annonce avec succès
                    </div>
                <?php
                } ?>
                <?php if (isset($_GET['validation']) && $_GET['validation'] == 2) {
                ?>
                    <div class="alert alert-success" role="alert">
                        Vouz avez modifier l'annonce avec succès
                    </div>
                <?php
                } ?>
                <?php if (isset($_GET['validation']) && $_GET['validation'] == 3) {
                ?>
                    <div class="alert alert-success" role="alert">
                        Vouz avez supprimer l'annonce avec succès
                    </div>
                <?php
                } ?>
                <?php
                $annonces = new annonce();
                $annonces = $annonces->getAllAnnonce();
                rsort($annonces);
                ?>
                <div class="respensive-table">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Annonce</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($annonces as $annonce) {
                                ++$i;
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $i ?></td>
                                    <td style="word-break: break-all;"><?php echo $annonce->annonce; ?></td>
                                    <td class="text-center">
                                        <a href="editAnnonce.php?id=<?php echo $annonce->idAnnonce; ?>"><button class="btn btn-warning btn-sm mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></button></a>
                                        <a href="annonce.php?id=<?php echo $annonce->idAnnonce ?>"><button class="btn btn-info btn-sm mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></button></a>
                                        <form action="../controle/deleteAnnonce.php" method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?php echo $annonce->idAnnonce ?>">
                                            <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger btn-sm mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash-alt"></i></button>
                                        </form>
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
</div>
<?php
include 'footerAdmin.php';
?>