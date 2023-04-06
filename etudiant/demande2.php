<?php
$nomPage = "ajoute demande";
include 'header.php';
?>
<?php
$etudiant = new etudiant();
$etudiant->cne = $_SESSION['nomUtilisateur'];
$etudiant = $etudiant->rechercheEtudiantAvecCne();
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
?>
<div class="col-lg-12" >
<div class="card">
<div class="card-header">
  <strong>Demande</strong>
</div>
<div class="card-body card-block">
<?php
      if (isset($_GET['erreur']) && $_GET['erreur'] == 1) {
      ?>
        <div class="alert alert-danger" role="alert">
          Vouz devez ajouter votre demande
        </div>
      <?php
      }
      
      if (isset($_GET['validation']) && $_GET['validation'] == 1) {
      ?>
        <div class="alert alert-success" role="alert">
          Vouz avez ajouter votre demande avec succès
        </div>
      <?php
      }
      
?>

  	<?php $_SESSION['id'] =  $etudiant->idEtudiant ;?>
    
    <div class="card-body card-block">
      <table id="myTable" class="table table-bordered">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">TYPE</th>
        <th scope="col">envoyer</th>
        </tr>
        </thead>
        <tbody>
        <?php
          $req = $pdo->query("SELECT * FROM TYPEDOC  ");
          while ($data = $req->fetch()) :
          ?>
          
        <tr>      
         <td><?= $data[0] ?></td>
         <td><?= $data[1] ?></td>
         <td>
         <a href="../controle/ajoutDemande.php?type=<?php echo "$data[1]&id=$etudiant->idEtudiant"; ?>"><i class="fa fa-mail-forward" style="font-size:48px;color:red"></i></a>
         
         </td>
        </tr> 
        <?php endwhile; ?>
        </tbody>
    </div>
              
</div> 	
</div>
</div>

<?php
include 'footer.php';
?>