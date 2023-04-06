<?php
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');

    $typeDemande = $_GET['type'];
    $idEtudiant = $_GET['id'];
    
 	if(empty($typeDemande)){
 		header('location: ../etudiant/demande2.php?erreur=1');
 	}
 	else{
 		include '../connect/metiers.php';
 		$date = date('Y-m-d');
		$etatDemande="En attente";
		$st = $pdo -> query("SELECT FILE_URL FROM documents WHERE IDETUDIANT =$idEtudiant AND TYPEDOC = '$typeDemande' ");
		$data = $st->fetch();
 		$demande = new demande();
 		if (sizeof($data) == 0){
 			$demande->setInfos($typeDemande,$etatDemande,$date,$idEtudiant,"");
 		}else{
 			$demande->setInfos($typeDemande,$etatDemande,$date,$idEtudiant,$data[0]);
 		}

 		$demande->insererDemande();
 		header('location: ../etudiant/demande2.php?validation=1');
 	}
 

?>