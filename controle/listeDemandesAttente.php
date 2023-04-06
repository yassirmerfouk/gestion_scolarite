<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
    $typeDemande = $_POST['typedemande'];
    $idEtudiant = $_POST['id'];
 	if(empty($typeDemande)){
 		header('location: ../admin/demande.php?erreur=1');
 	}
 	else{
 		include '../connect/metiers.php';
 		$date = date('Y-m-d');
 		$demande = new demande();
 		$demande->listeDemandeAttente();
 		header('location: ../etudiant/demande.php?validation=1');
 	}
 }
 else{
 	header('location: ../etudiant/demande.php');
 }
?>