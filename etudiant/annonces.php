<?php
$nomPage = "Annonces";
include 'header.php';
?>
<div class="container">
    <div class="main-body">
        <div class="card">
            <div class="card-header">
                <strong>Liste des annonces</strong>
            </div>
            <div class="card-body card-block">
                <?php
                $etudiant = new etudiant();
                $etudiant->cne = $_SESSION['nomUtilisateur'];
                $etudiant = $etudiant->rechercheEtudiantAvecCne();
                $annonces = new annonce();
                $annonces = $annonces->getAllAnnonceClasse($etudiant->idClasse);
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
                                $i++;
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td style="word-break: break-all;"><?php echo $annonce->annonce; ?></td>
                                    <td class="text-center">
                                        <a href="annonce.php?id=<?php echo $annonce->idAnnonce; ?>"><button class="btn btn-info btn-sm mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></button></a>
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
include 'footer.php';
?>