<?php
$nomPage = "liste Demandes";
include 'headerAdmin.php';
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Demandes</strong>
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
            <th scope="col">ACTION</th>
            <th scope="col">DOCUMENT</th>
          </tr>
        </thead>
        <tbody>



          <?php

          $req = $pdo->query("SELECT * FROM demandes ");

          while ($data = $req->fetch()) :

          ?>
            <?php
            $var = $pdo->query("SELECT * FROM etudiant WHERE IDETUDIANT = $data[4] ")->fetch();
            ?>
            <tr>

              <td><?= $data[0] ?></td>
              <td><?= $data[1] ?></td>
              <td><?= $data[2] ?></td>
              <td><?= $data[3] ?></td>
              <td><?= $var[2] . ' ' . $var[3] ?></td>
              <td>
                <a style="width: 10% margin-left :10px;" href="EditeDemande.php?id=<?= $data[0] ?>">
                  <button class="btn btn-warning btn-sm rounded-0 mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></button>
                </a>
                <a href="deleteDemande.php?id=<?= $data[0] ?>" class="btn ">
                  <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger btn-sm rounded-0 mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash-alt"></i></button>
                </a>
                <a href="<?= $data[5] ?>" <button class="btn btn-info btn-sm mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></button>>
              </td>
              <td>
                <a href="document.php?id=<?= $data[4] ?>" <button class="btn"><i class="fa fa-folder"></i></button><?php echo "$data[5]"; ?>>

                </a>

              </td>

            </tr>

          <?php endwhile; ?>
        </tbody>
      </table>

    </div>
  </div>
  <?php
  include 'footerAdmin.php';
  ?>