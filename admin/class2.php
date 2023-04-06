<?php
$nomPage = "classe";
include 'headerAdmin.php';
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>classe</strong>
    </div>
    <div class="card-body card-block">
      <table id="myTable" class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">CLASSE</th>
            <th scope="col">filiere</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $req = $pdo->query("SELECT * FROM classe  ");
          while ($data = $req->fetch()) :
          ?>
            <tr>
              <td><?= $data[0] ?></td>
              <td><?= $data[1] ?></td>
              
              <td>
                
                <a href="filiere2.php?id=<?= $data[0] ?>"  >
                  <i class="fa fa-graduation-cap" style="font-size:48px;color:red"></i>
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