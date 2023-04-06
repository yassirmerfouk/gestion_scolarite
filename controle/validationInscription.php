<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $cin = $_POST['cin'];
    $telephone = $_POST['telephone'];
    $image = $_FILES['image']['name'];
    $nomAr = $_POST['nomAr'];
    $prenomAr = $_POST['prenomAr'];
    $bacAnnee = $_POST['bacAnnee'];
    $bacFilire = $_POST['bacFiliere'];
    $bacMention = $_POST['bacMention'];
    $villeOrigine = $_POST['villeOrigine'];
    $villeActuelle = $_POST['villeActuelle'];
    $adresse = $_POST['adresse'];
    $copyBac = $_FILES['baccopy']['name'];
    $copyCin = $_FILES['cincopy']['name'];

    if (empty($cin) || empty($telephone) || empty($image) || empty($nomAr) || empty($prenomAr) || $bacAnnee <= 0 || empty($bacFilire) || empty($bacMention) || empty($villeOrigine) || empty($villeActuelle) || empty($adresse) || empty($copyBac) || empty($copyCin)) {
        header('location: ../etudiant/inscription.php?erreur=1');
    } else {
        $image_extensions = ['jpg', 'JPG', 'jpeg', 'JPEJ', 'png', 'PNG'];
        $image_infos = new SplFileInfo($image);
        if (!in_array($image_infos->getExtension(), $image_extensions)) {
            header('location: ../etudiant/inscription.php?erreur=2');
        } else {
            $copy_bac_infos = new SplFileInfo($copyBac);
            $copy_cin_infos = new SplFileInfo($copyCin);
            if ($copy_bac_infos->getExtension() != 'pdf' || $copy_cin_infos->getExtension() != 'pdf') {
                header('location: ../etudiant/inscription.php?erreur=3');
            } else {

                include '../connect/metiers.php';
                $etudiant = new etudiant();
                $etudiant->idEtudiant = $id;
                // --------------------------------------------------
                $etudiant = $etudiant->rechercheEtudiantAvecId();
                $cne = $etudiant->cne;
                $etudiant = new etudiant();
                $etudiant->idEtudiant = $id;
                // --------------------------------------------------


                $fichierTempo = $_FILES['image']['tmp_name'];
                $image = $cne . "." . $image_infos->getExtension();
                move_uploaded_file($fichierTempo, '../admin/imagesEtudiants/' . $image);

                // **************
                $fichierTempo = $_FILES['baccopy']['tmp_name'];
                $copyBac = $cne . "." . $copy_bac_infos->getExtension();
                move_uploaded_file($fichierTempo, '../admin/copyBac/' . $copyBac);

                // **************
                $fichierTempo = $_FILES['cincopy']['tmp_name'];
                $copyCin = $cne . "." . $copy_cin_infos->getExtension();
                move_uploaded_file($fichierTempo, '../admin/copyCin/' . $copyCin);



                $etudiant->cin = $cin;
                $etudiant->telephone = $telephone;
                $etudiant->image = $image;
                $etudiant->nomAr = $nomAr;
                $etudiant->prenomAr = $prenomAr;
                $etudiant->bacAnnee = $bacAnnee;
                $etudiant->bacFiliere = $bacFilire;
                $etudiant->bacMention = $bacMention;
                $etudiant->villeOrigine = $villeOrigine;
                $etudiant->villeActuel = $villeActuelle;
                $etudiant->adresse = $adresse;
                $etudiant->copyBac = $copyBac;
                $etudiant->copyCin = $copyCin;
                $etudiant->inscriptionEtudiant();
                header('location: ../etudiant/inscription.php?validation=1');
            }
        }
    }
} else {
    header('location: ../etudiant/inscription.php');
}
