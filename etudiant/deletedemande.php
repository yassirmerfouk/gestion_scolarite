<?php
  $id=$_GET['id'];
 $pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
 

 $ps=$pdo->prepare("DELETE  FROM demandes WHERE  IDDEMANDE=$id");
  
 $ps->execute();
  header("location:listedemande.php"); 
?>