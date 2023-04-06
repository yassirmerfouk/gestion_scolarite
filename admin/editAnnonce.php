<?php
$nomPage = "éditer annonce";
include 'headerAdmin.php';
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Modifier annonce</strong>
        </div>
        <div class="card-body card-block">
            <?php
            if (!isset($_GET['id']) || $_GET['id'] == 0) {
                header('location: ../error404.php');
            }
            $annonce = new annonce();
            $annonce->idAnnonce = $_GET['id'];

            if (!$annonce->isAnnonceById()) {
                header('location: ../error404.php');
            }

            $annonce = $annonce->searchAnnonceById();
            ?>
            <form action="../controle/editAnnonce.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $annonce->idAnnonce ?>" name="idannonce">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Annonce *</label>
                    <textarea class="form-control" rows="4" name="annonce"><?php echo $annonce->annonce; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="" class="w-100">Classes *</label>
                    <?php
                    $classes = $annonce->getclasseAnnonce();
                    ?>
                    <select id="select" class="js-example-basic-multiple" name="classes_id[]" multiple="multiple">
                        <?php
                        foreach ($classes as $classe) {
                        ?>
                            <option value="<?php echo $classe->idClasse; ?>" selected><?php echo $classe->nomClasse; ?></option>
                        <?php
                        }
                        ?>
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