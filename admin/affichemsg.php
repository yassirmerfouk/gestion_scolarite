<?php

$nomPage = "liste messages";
include 'headerAdmin.php';
$var = $_GET['idEtudiant'];
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');

$stmt = $pdo->prepare('SELECT  * FROM admin WHERE EMAIL = ? ');
$stmt->execute(array($_SESSION['nomUtilisateur']));
$admin = $stmt->fetch();
$IDAdmin= $admin['IDADMIN'];
$stmtd = $pdo->prepare('SELECT * FROM message WHERE (refusersrc=? OR refuserdest=?) AND (refusersrc=? OR refuserdest=?)');
$stmtd->execute(array($IDAdmin,$IDAdmin,$var,$var));
$messages=$stmtd->fetchAll();

$request=$pdo->prepare('SELECT * FROM etudiant where IDETUDIANT =?');
$request->execute(array($var));
$etudiant=$request->fetch();
?>
<!DOCTYPE html>
<html>

<head>
   <title>Boîte de réception</title>
   <meta charset="utf-8" />
</head>


<body>
 <div class="pl-3">
   <a href="class.php">Nouveau message</a><br /><br /><br />
   <h3>Votre boîte de réception:</h3>
   <?php
   if (empty($messages)) {
      echo " Vous n'avez aucun message...";
   }
   else{
      foreach($messages as $m){
         if($m['refusersrc']==$var){
            ?>
             <span style="color :red;">
               <?php echo '<br>'. '------------------'.'<br>'?>
                <?php echo $etudiant['NOM'] . ' ' . $etudiant['PRENOM'];
                ?> vous a envoyé un message:
                <?php echo '<br>'?>
 
                <?php echo $m['message'] . '<br>';?>
             </span>
             <?php  
         }
         else{
            ?>
             <span style="color :blue;">
                <?php echo '<br>'. '------------------'.'<br>';
                ?> vous avez envoyé un message:<br>
                <?php ?>

                <?php echo $m['message']. '<br>';?>
             </span>
             <?php
         }
      }
   }
    ?>
</div> 



</body>

</html>

<?php
include 'footerAdmin.php';
?>