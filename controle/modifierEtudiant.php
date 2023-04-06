<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nouveauPassword = $_POST['nouveauPassword'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $image = $_FILES['image']['name'];
    if (empty($email) || empty($telephone) || empty($adresse) || empty($password)) {
        header('location: ../etudiant/profile.php?erreur=1');
    } else {
        include '../connect/metiers.php';
        $etudiant = new etudiant();
        $etudiant->idEtudiant = $id;
        $etudiant->password = $password;
        if (!$etudiant->identiqueMotDePasseEtudiant()) {
            header('location: ../etudiant/profile.php?erreur=2');
        } else {
            $etudiant->email = $email;
            if ($etudiant->estEtudiantEmail2()) {
                header('location: ../etudiant/profile.php?erreur=3');
            } else {
                if (!empty($image)) {
                    $image_extensions = ['jpg', 'JPG', 'jpeg', 'JPEJ', 'png', 'PNG'];
                    $image_infos = new SplFileInfo($image);
                    if (!in_array($image_infos->getExtension(), $image_extensions)) {
                        header('location: ../etudiant/profile.php?erreur=4');
                        return;
                    }
                    $etudiant = $etudiant->rechercheEtudiantAvecId();
                    $cne = $etudiant->cne;
                    $image = $cne . "." . $image_infos->getExtension();
                }

                $fichierTempo = $_FILES['image']['tmp_name'];
                move_uploaded_file($fichierTempo, '../admin/imagesEtudiants/' . $image);
                $etudiant->password = $nouveauPassword;
                $etudiant->email = $email;
                $etudiant->telephone = $telephone;
                $etudiant->adresse = $adresse;
                $etudiant->image = $image;
                $etudiant->modifierInfosEtudiant();
                header('location: ../etudiant/profile.php?validation=1');
            }
        }
    }
} else {
    header('location: ../etudiant/profile.php');
}
