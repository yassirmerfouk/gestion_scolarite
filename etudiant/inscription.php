<?php
$nomPage = "Inscription";
include 'header.php';
?>
<?php
$etudiant = new etudiant();
$etudiant->cne = $_SESSION['nomUtilisateur'];
$etudiant = $etudiant->rechercheEtudiantAvecCne();
$classe = new classe();
$classe->idClasse = $etudiant->idClasse;
$classe = $classe->rechercheClasseAvecId();
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Inscription</strong>
        </div>
        <form action="../controle/validationInscription.php" method="POST" enctype="multipart/form-data">
            <div class="card-body card-block">
                <?php
                if ($etudiant->estInscrit()) {
                ?>
                    <div class="alert alert-success" role="alert">
                        Vouz avez terminé votre inscription
                    </div>
                    <?php
                } else {
                    if (isset($_GET['erreur'])) {
                        if ($_GET['erreur'] == 1) {
                    ?>
                            <div class="alert alert-danger" role="alert">
                                Vous devez remplire les champs (*)
                            </div>
                        <?php
                        }
                        if ($_GET['erreur'] == 2) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Vous devez ajouter une image
                            </div>
                        <?php
                        }
                        if ($_GET['erreur'] == 3) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Seul les pdf sont autorisé pour les champs de la copie de BAC et la copie de CIN
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <input class="form-control" type="hidden" name="id" value="<?php echo $etudiant->idEtudiant; ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Nom</label>
                            <input type="text" class="form-control" name="nom" value="<?php echo $etudiant->nom; ?>" readOnly="readOnly">
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Prenom</label>
                            <input type="text" class="form-control" name="prenom" value="<?php echo $etudiant->prenom; ?>" readOnly="readOnly">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">CNE</label>
                            <input type="text" class="form-control" name="cne" value="<?php echo $etudiant->cne; ?>" readOnly="readOnly">
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">CIN *</label>
                            <input type="text" placeholder="Entrer CIN" class="form-control" value="<?php echo $etudiant->cin; ?>" name="cin">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class=" form-control-label">Email</label>
                            <input type="text" placeholder="Entrer Email" class="form-control" name="email" value="<?php echo $etudiant->email; ?>" readOnly="readOnly">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Classe</label>
                            <input type="text" class="form-control" name="classe" value="<?php echo $classe->nomClasse; ?>" readOnly="readOnly">
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Telephone *</label>
                            <input type="text" placeholder="Entrer Telephone" class="form-control" value="<?php echo $etudiant->telephone; ?>" name="telephone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Image *</label>
                            <div class="border p-1">
                                <input type="file" class="form-control-file" name="image">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Date de naissance</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="date" value="<?php echo $etudiant->dateNaissance; ?>" readOnly="readOnly">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Nom arabe *</label>
                            <input type="text" placeholder="أدخل الاسم" class="form-control" value="<?php echo $etudiant->nomAr; ?>" name="nomAr">
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Prenom arabe *</label>
                            <input type="text" placeholder="أدخل النسب" class="form-control" value="<?php echo $etudiant->prenomAr; ?>" name="prenomAr">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Bac Année *</label>
                            <select class="form-select form-control" name="bacAnnee">
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Bac Filière *</label>
                            <select class="form-select form-control" name="bacFiliere">
                                <option value="Sciences Physiques et Chimiques">Sciences Physiques et Chimiques</option>
                                <option value="Sciences Maths A">Sciences Maths A</option>
                                <option value="Sciences Maths B">Sciences Maths B</option>
                                <option value="Sciences et Technologies Electriques">Sciences et Technologies Electriques</option>
                                <option value="Sciences et Technologies Mécaniques">Sciences et Technologies Mécaniques</option>
                                <option value="Sciences Economiques">Sciences Economiques</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Bac mention *</label>
                            <input type="number" step="any" placeholder="Entrer une mention" class="form-control" value="<?php echo $etudiant->bacMention; ?>" name="bacMention">
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Ville origine *</label>
                            <input type="text" placeholder="Entrer votre ville d'origine" class="form-control" value="<?php echo $etudiant->villeOrigine; ?>" name="villeOrigine">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Ville Actuelle *</label>
                            <input type="text" placeholder="Entrer votre ville actuelle" class="form-control" value="<?php echo $etudiant->villeActuel; ?>" name="villeActuelle">
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Adresse *</label>
                            <input type="text" placeholder="Entrer votre adresse" class="form-control" value="<?php echo $etudiant->adresse; ?>" name="adresse">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Copie de BAC *</label>
                            <div class="border p-1">
                                <input type="file" class="form-control-file" name="baccopy">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" form-control-label">Copie de CIN *</label>
                            <div class="border p-1">
                                <input type="file" class="form-control-file" name="cincopy">
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i></i> Inscription
                        </button>
                    </div>
        </form>
    <?php
                }
    ?>
    </div>
</div>

<?php
include 'footer.php';
?>