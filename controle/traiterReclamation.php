<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    include '../connect/metiers.php';
    $reclamation = new reclamation();
    $reclamation->idReclamation = $id;
    $reclamation->traiterReclamation();
    header('location: ../admin/reclamations.php?validation=1');
} else {
    header('location: ../admin/reclamations.php');
}
