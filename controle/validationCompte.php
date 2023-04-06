<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cne = $_POST['cne'];
    $email = $_POST['email'];
    $email2 = $_POST['email2'];
    $date = $_POST['date'];
    if (empty($cne) || empty($email) || empty($email2) || empty($date)) {
        header('location: ../creationCompte.php?erreur=1');
    } else {
        if (strcmp($email, $email2) != 0) {
            header('location: ../creationCompte.php?erreur=2');
        } else {
            include '../connect/metiers.php';
            $etudiant = new etudiant();
            $etudiant->cne = $cne;
            if (!$etudiant->estEtudiant()) {
                header('location: ../creationCompte.php?erreur=3');
            } else {
                if ($etudiant->estEtudiantAvecCompte()) {
                    header('location: ../creationCompte.php?erreur=4');
                } else {
                    $etudiant->email = $email;
                    if ($etudiant->estEtudiantEmail()) {
                        header('location: ../creationCompte.php?erreur=5');
                    } else {
                        $infos = $etudiant->rechercheDansListeEtudiant();
                        $etudiant->nom = $infos['NOM'];
                        $etudiant->prenom = $infos['PRENOM'];
                        $password = $cne;
                        $etudiant->email = $email;
                        $etudiant->dateNaissance = $date;
                        $etudiant->password = $password;
                        // recherche dans table classe sur id classe :
                        $classe = new classe();
                        $classe->nomClasse = $infos['NOMCLASSE'];
                        $classe = $classe->rechercheClasseAvecNom();
                        $etudiant->idClasse = $classe->idClasse;
                        $etudiant->insererInfosEtudiantCreation();
                        // code send mail
                        $toEmail = $etudiant->email;
                        $subject = "Informations de connexion";
                        $body = "Vous pouvez utilisé vos information pour se connecter:
                        Nom Utilisateur : " . $etudiant->cne
                            . " 
                        Mot de passe : " . $etudiant->password;
                        $headers = "From: scolariteestsafi20212021@gmail.com";
                        mail($toEmail, $subject, $body, $headers);
                        //
                        header('location: ../creationCompte.php?validation=1');
                    }
                }
            }
        }
    }
} else {
    header('location: creationCompte.php');
}
