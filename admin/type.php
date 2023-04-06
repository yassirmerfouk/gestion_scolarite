<?php
$nomPage = "ajoute type";
include 'headerAdmin.php';
?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
?>
<div class="col-lg-12" >
<div class="card">
<div class="card-header">
  <strong>Type Demande</strong>
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
          Vouz avez ajouter votre type avec succès
        </div>
      <?php
      }
      
?>

  	
    <form method="post" action="../controle/ajouttype.php" enctype="multipart/form-data">
              <div class="form-group">
              <label class="control-label">vous pouvez choisir un autre type de demande ici</label>
              <textarea class="form-control" rows="1" name="type"></textarea>
              </div>
              <div>
              <button type="submit" class="btn btn-primary btn-sm">envoyer</button>
              </div>
    </form>
    <div class="card-body card-block">
      <table id="myTable" class="table table-bordered">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">TYPE</th>
        
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
         
        </tr> 
        <?php endwhile; ?>
        </tbody>
    </div>
              
</div> 	
</div>
</div>

<?php
include 'footerAdmin.php';
?>