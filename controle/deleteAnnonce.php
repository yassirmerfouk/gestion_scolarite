<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    include('../connect/metiers.php');
    $annonce = new annonce();
    $annonce->idAnnonce = $id;
    $annonce->deleteAnnonce();
    header('location: ../admin/annonces.php?validation=3');
} else {
    header('location: ../admin/annonces.php');
}
