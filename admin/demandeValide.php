<?php
$nomPage = "demandes valide";
include 'headerAdmin.php';
?>

<?php
$db = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Demandes En Attente</strong>
    </div>
    <div class="card-body card-block">
      <table id="myTable" class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">TYPE</th>
            <th scope="col">ETAT</th>
            <th scope="col">DATE</th>
            <th scope="col">ETUDIANT</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $req = $db->query("SELECT * FROM demandes WHERE ETATDEMANDE='valide'");
          while ($data = $req->fetch()) :
          ?>
          <?php
           $var=$db->query("SELECT * FROM etudiant WHERE IDETUDIANT = $data[4]")->fetch();
            ?>
            <tr>
              <td><?= $data[0] ?></td>
              <td><?= $data[1] ?></td>
              <td><?= $data[2] ?></td>
              <td><?= $data[3] ?></td>
              <td><?= $var[2].''.$var[3] ?></td>
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