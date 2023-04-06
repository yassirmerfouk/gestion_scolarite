<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    echo $id;
    include('../connect/metiers.php');
    $reclamation = new reclamation;
    $reclamation->idReclamation = $id;
    $reclamation->deleteEtudiantReclamtion();
    header('location: ../etudiant/reclamations.php?validation=3');
} else {
    header('location: ../etudiant/reclamations.php');
}
