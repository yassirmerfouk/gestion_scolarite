<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $idEtudiant = $_POST['idetudiant'];
    if (empty($_POST['reclamation'])) {
        header('location: ../etudiant/editReclamation.php?id=' . $id . '&erreur=1');
    } else {
        include('../connect/metiers.php');
        $reclamation = new reclamation;
        $reclamation->idReclamation = $id;
        $reclamation->idEtudiant = $idEtudiant;
        $reclamation->reclamation = $_POST['reclamation'];
        $reclamation->editReclamation();
        header('location: ../etudiant/reclamations.php?validation=2');
    }
} else {
    header('location: ../etudiant/reclamations.php');
}
