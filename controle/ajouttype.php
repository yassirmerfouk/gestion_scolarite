<?php
    $pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $type= $_POST['type'];
    echo ($type);
 	if(empty($type)){
 	header('location: ../admin/type.php?erreur=1');
 	}
 	else{
 		// include '../connect/metiers.php';
 		// $type = new type();
 		// $type->insererType($type);
        $stmt = $pdo->prepare("INSERT INTO  typedoc(TYPEDOC) VALUES('$type')");
        $stmt->execute();
 		header('location: ../admin/type.php?validation=1');
 	    }
 }
 else{
 	header('location: ../etudiant/type.php');
 }
?>