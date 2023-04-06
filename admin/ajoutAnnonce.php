<?php
$nomPage = "ajouter une annonce";
include 'headerAdmin.php';
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Ajouter une annonce</strong>
        </div>
        <div class="card-body card-block">
            <?php
            if (isset($_GET['erreur']) && $_GET['erreur'] == 1) {
            ?>
                <div class="alert alert-danger" role="alert">
                    Vouz devez remplire les champs(*)
                </div>
            <?php
            }
            if (isset($_GET['erreur']) && $_GET['erreur'] == 2) {
            ?>
                <div class="alert alert-danger" role="alert">
                    Erreur vérifier les classes
                </div>
            <?php
            }
            ?>
            <form action="../controle/addAnnonce.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Vous pouvez ajouté votre annonce ici *</label>
                    <textarea class="form-control" rows="4" name="annonce"></textarea>
                </div>
                <div class="form-group">
                    <label for="" class="w-100">Classes *</label>
                    <select id="select" class="js-example-basic-multiple" name="classes_id[]" multiple="multiple">
                        <?php
                        $classes = new classe();
                        $classes = $classes->getAllClasses();
                        ?>
                        <?php
                        foreach ($classes as $classe) {
                        ?>
                            <option value="<?php echo $classe->idClasse; ?>"><?php echo $classe->nomClasse; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-8">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i></i> Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'footerAdmin.php';
?>