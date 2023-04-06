<?php
$nomPage = "liste messages";
include 'header.php';
$var=$_GET['idAdmin'];
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');


$refu = $_SESSION['nomUtilisateur'];
$stmt = $pdo->prepare('SELECT * FROM etudiant WHERE CNE=?');
$stmt->execute(array($refu));
$etudiant = $stmt->fetch();

$stmtd = $pdo->prepare('SELECT * FROM message WHERE (refusersrc=? OR refuserdest=?) AND (refusersrc=? OR refuserdest=?)');
$stmtd->execute(array($etudiant['IDETUDIANT'],$etudiant['IDETUDIANT'],$var,$var));
$messages=$stmtd->fetchAll();

$request=$pdo->prepare('SELECT * FROM admin where IDADMIN =?');
$request->execute(array($var));
$admin=$request->fetch();
$emailAdmin=$admin['EMAIL'];


?>
<!DOCTYPE html>
<html>

<head>
   <title>Boîte de réception</title>
   <meta charset="utf-8" />
</head>

<body>
   <div class="pl-3">
   <a href="message.php">Nouveau message</a><br /><br /><br />
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
                <?php echo $emailAdmin;
                ?> vous envoyé un message:
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
include 'footer.php';
?>