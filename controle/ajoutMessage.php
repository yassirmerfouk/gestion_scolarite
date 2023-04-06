<?php
    session_start();
    $var=$_GET['idEtudiant'];
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $textmsg= $_POST['message'];

    $refu = $_SESSION['nomUtilisateur'];
	$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
    $stmt = $pdo->prepare('SELECT * FROM admin WHERE EMAIL=?');
    $stmt->execute(array($refu));
    $admin = $stmt->fetch();
	$refuserdest = $var;
	

 	if(empty($textmsg)){
 	header('location: ../admin/envoi.php?erreur=1');
 	}
 	else{
 		include '../connect/metiers.php';
 		$date = date('Y-m-d');
 		$message = new message();
 		$message->setInfos($admin['IDADMIN'], $refuserdest,$textmsg,$date);
 		$message->insert();
 		header('location: ../admin/affichemsg.php?idEtudiant='.$var.'&validation=1');

 	    }
 }
 else{
 	header('location: ..admin/envoi.php');
 }
 
?>