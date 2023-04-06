<?php

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $nomUtilisateur = $_POST['nomUtilisateur'];
        $password = $_POST['password'];
        if(empty($nomUtilisateur) || empty($password)){
            header('location: ../connexion.php?erreur=1');
        }
        else{
            include '../connect/metiers.php';
            $etudiant = new etudiant();
            $admin = new admin();
            $etudiant->cne = $nomUtilisateur;
            $etudiant->password = $password;
            $admin->email = $nomUtilisateur;
            $admin->password = $password;
            if(!$admin->estAdmin() && !$etudiant->estEtudiantAvecCompte()){
                header('location: ../connexion.php?erreur=2');
            }
            else{
                if(!$admin->connexionAdmin() && !$etudiant->connexionEtudiant()){
                    header('location: ../connexion.php?erreur=3');
                }
                else{
                    if($etudiant->connexionEtudiant()){
                        session_start();
                        $_SESSION['nomUtilisateur'] = $nomUtilisateur;
                        header('location: ../etudiant/index.php');
                    }
                    if($admin->connexionAdmin())
                    {
                        session_start();
                        $_SESSION['nomUtilisateur'] = $nomUtilisateur;
                        header('location: ../admin/index.php');
                    }
                }
            }
            
        }
    }
    else{
        header('location: ../connexion.php');
    }
?>