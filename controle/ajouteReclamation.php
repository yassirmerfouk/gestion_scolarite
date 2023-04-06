<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$idEtudiant = $_POST['id'];
	$texteReclamation = $_POST['reclamation'];
	if (empty($texteReclamation)) {
		header('location: ../etudiant/ajoutreclamation.php?erreur=1');
	} else {
		include '../connect/metiers.php';
		$date = date('Y-m-d');
		$reclamation = new reclamation();
		$reclamation->setInfos($idEtudiant, $texteReclamation, $date, 0);
		$reclamation->insererReclamation();
		header('location: ../etudiant/reclamations.php?validation=1');
	}
} else {
	header('location: ../etudiant/AjoutReclamation.php');
}
