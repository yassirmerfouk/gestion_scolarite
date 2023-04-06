<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $newPassword = $_POST['newPassword'];
    $id = $_POST['id'];
    if (empty($email) || empty($password)) {
        header('location: ../admin/profile.php?erreur=1');
    } else {
        include '../connect/metiers.php';
        $admin = new admin();
        $admin->setInfos($id, $email, $password);
        if (!$admin->identiqueMotDePasseAdmin()) {
            header('location: ../admin/profile.php?erreur=2');
        } else {
            $admin->password = $newPassword;
            $admin->modifierInfosAdmin();
            session_start();
            $_SESSION['nomUtilisateur'] = $email;
            header('location: ../admin/profile.php?validation=1');
        }
    }
}
