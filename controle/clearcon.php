<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $idetudiant = $_GET['id'];
    $refu = $_SESSION['nomUtilisateur'];
	$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
    $stmt = $pdo->prepare('SELECT * FROM admin WHERE EMAIL=?');
    $stmt->execute(array($refu));
    $admin = $stmt->fetch();
    $idadmin = $admin['IDETUDIANT'];
    echo "$idadmin";
    echo "$idetudiant";
    $src=$idadmin;
    $des=$idetudiant;
    $pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
    $stmt = $pdo->prepare('DELETE * FROM message WHERE refusersrc=? AND refuserdest?');
    $stmt->execute(array($src,$des));
    // include('../connect/metiers.php');
    // $message = new message();
    // $message->refusersrc = $idadmin;
    // $message->refuserdst = $idetudiant;
    // $annonce->deleteMessage($idadmin,$idetudiant);
    header('location: ../admin/affichemsg.php?idEtudiant='.$idetudiant.'&validation=2');
} else {
    header('location: ../admin/affichemsg.php');
}
?>