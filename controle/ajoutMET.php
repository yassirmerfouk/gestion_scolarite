<?php
session_start();
   if($_SERVER['REQUEST_METHOD']=='POST'){
    $textmsg= $_POST['message'];


    $refu = $_SESSION['nomUtilisateur'];
	$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
    $stmt = $pdo->prepare('SELECT * FROM etudiant WHERE CNE=?');
    $stmt->execute(array($refu));
    $etudiant = $stmt->fetch();

    
	$refuserdest = $_POST['admin'];

 	if(empty($textmsg)){
 		header('location: ../etudiant/message.php?erreur=1');
 	}
 	else{
 		include '../connect/metiers.php';
 		$date = date('Y-m-d');
 		$message = new message();
 		$message->setInfos($etudiant['IDETUDIANT'], $refuserdest,$textmsg,$date);
 		$message->insert();
 		header('location: ../etudiant/liste.php?idAdmin='.$refuserdest.'&validation=1');
 	}
 }
 else{
 	header('location: ..etudiant/message.php');
 }
?>