<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $annonceTexte = $_POST['annonce'];
    $idAnnonce = $_POST['idannonce'];
    if (empty($annonceTexte) || !isset($_POST['classes_id'])) {
        header('location: ../admin/editAnnonce.php?id=' . $idAnnonce . '&erreur=1');
    } else {
        $classes_id = $_POST['classes_id'];
        include '../connect/metiers.php';
        foreach ($classes_id as $classe_id) {
            $classe = new classe();
            $classe->idClasse = $classe_id;
            if (!$classe->isClasseById()) {
                header('location: ../admin/editAnnonce.php?id=' . $idAnnonce . '&erreur=2');
                return;
            }
        }
        $annonce = new annonce();
        $annonce->idAnnonce = $idAnnonce;
        $annonce->annonce = $annonceTexte;
        $annonce->modifierAnnonce($classes_id);

        header('location: ../admin/annonces.php?validation=2');
    }
} else {
    header('location: ../admin/annonces.php');
}
