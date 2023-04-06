<?php
$nomPage = "liste filieres";
include 'headerAdmin.php';
$id=$_GET['id'];
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
$req = $pdo->query("SELECT *  FROM etudiant WHERE IDCLASSE = $id  ");
// $req->execute(array($_GET['id']));
?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>filieres</strong>
    </div>
    <div class="card-body card-block">
      <table id="myTable" class="table table-bordered">
        <thead>
          
          <tr>
            <th scope="col">#</th>
            <th scope="col">NOM</th>
            <th scope="col">PRENOM</th>
            <th scope="col">MESSAGE</th>
          </tr>
        </thead>
        <tbody>
          <?php

          while ($data = $req->fetch()) :
          ?>
            <tr>
              <td><?= $data[0] ?></td>
              <td><?= $data[2] ?></td>
              <td><?= $data[3] ?></td>
              <td>
              
                <a href="envoi.php?idEtudiant=<?php echo $data['IDETUDIANT']?>" class="btn btn-warning">
                  <i class="fa fa-mail-forward" style="font-size:48px;color:red"></i>
                </a>
              
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
include 'footerAdmin.php';
?>