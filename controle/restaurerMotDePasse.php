<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	if (empty($email)) {
		header('location: ../forgotPassword.php?erreur=1');
	} else {
		include '../connect/metiers.php';
		$etudiant = new etudiant();
		$admin = new admin();
		$etudiant->email = $email;
		$admin->email = $email;
		if (!$etudiant->estEtudiantEmail() && !$admin->estAdmin()) {
			header('location: ../forgotPassword.php?erreur=2');
		} else {
			$subject = "Nouveau mot de passe";
			$headers = "From: scolariteestsafi20212021@gmail.com";
			if ($etudiant->estEtudiantEmail()) {
				$password = $etudiant->restaurerMotDePassseEtudiant();
				$toEmail = $etudiant->email;
				$body = "Votre nouveau mot de passe est : " . $password;
				mail($toEmail, $subject, $body, $headers);
			}
			if ($admin->estAdmin()) {
				$password = $admin->restaurerMotDePassseAdmin();
				$toEmail = $admin->email;
				$body = "Votre nouveau mot de passe est : " . $password;
				mail($toEmail, $subject, $body, $headers);
			}
			header('location: ../forgotPassword.php?validation=1');
		}
	}
} else {
	header('location: ../forgotPassword.php');
}
