<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fichier = $_FILES['fichier']['name'];
    if (empty($fichier)) {
        header('location: ../admin/ajouterEtudiants.php?erreur=1');
    } else {
        $testeType = new SplFileInfo($fichier);
        if ($testeType->getExtension() != "xlsx") {
            header('location: ../admin/ajouterEtudiants.php?erreur=2');
        } else {
            $fichierTempo = $_FILES['fichier']['tmp_name'];
            move_uploaded_file($fichierTempo, '../admin/listeEtudiants/' . $fichier);
            require_once "../PHPExcel/Classes/PHPExcel.php";
            include '../connect/DAO.php';
            $fichier = '../admin/listeEtudiants/' . $fichier;
            $dao = new DAO();
            $dao->insererDansListeEtudiant($fichier);
            header('location: ../admin/ajouterEtudiants.php?validation=1');
        }
    }
} else {
    header('location: ../admin/ajouterEtudiants.php');
}
