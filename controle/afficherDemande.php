<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
    $typeDemande = $_POST['typedemande'];
    $idEtudiant = $_POST['id'];
 	if(empty($typeDemande)){
 		header('location: ../etudiant/listedemande.php?erreur=1');
 	}
 	else{
 		include '../connect/metiers.php';
 		$demande = new demande();
 		$demande->listeDemande();
 		header('location: ../etudiant/listedemande.php?validation=1');
 	}
 }
 else{
 	header('location: ../etudiant/afficherdemande.php');
 }
?>