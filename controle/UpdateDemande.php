<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
 	$idDemande = $_POST['id'];
	 
 	$EtatDemande = $_POST['etat'];
 	if(empty($EtatDemande)){
 		header('location: ../admin/EditeDemande.php?erreur=1');
 	}
 	else{
	
 		include '../connect/metiers.php';
 		$demande = new demande();
 		$demande->UpdateDemande($EtatDemande,$idDemande);
 		header('location: ../admin/demande.php?validation=1');
 	}
 }
 else{
 	header('location: ../admin/EditeDemande.php');
 }
?>