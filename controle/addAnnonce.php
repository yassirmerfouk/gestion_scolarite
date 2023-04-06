<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $annonceTexte = $_POST['annonce'];
    if (empty($annonceTexte) || !isset($_POST['classes_id'])) {
        header('location: ../admin/ajoutAnnonce.php?erreur=1');
    } else {
        $classes_id = $_POST['classes_id'];
        include '../connect/metiers.php';
        foreach ($classes_id as $classe_id) {
            $classe = new classe();
            $classe->idClasse = $classe_id;
            if (!$classe->isClasseById()) {
                header('location: ../admin/ajoutAnnonce.php?erreur=2');
                return;
            }
        }
        $date = date('Y-m-d');
        $annonce = new annonce();
        $annonce->annonce = $annonceTexte;
        $annonce->dateAnnonce = $date;
        $annonce->ajouteAnnonce($classes_id);
        header('location: ../admin/annonces.php?validation=1');
    }
} else {
    header('location: ../admin/ajoutAnnonce.php');
}
