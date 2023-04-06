<?php
$nomPage = "liste Demandes";
include 'header.php';
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
$etudiant = new etudiant();
$etudiant->cne = $_SESSION['nomUtilisateur'];
$etudiant = $etudiant->rechercheEtudiantAvecCne();
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
            <th scope="col">ACTION</th>
            <th scope="col">DATE</th>


          </tr>
        </thead>
        <tbody>
          <?php
          $req = $pdo->query("SELECT * FROM demandes WHERE IDETUDIANT=$etudiant->idEtudiant");
          while ($data = $req->fetch()) :
          ?>
            <tr>
              <td><?= $data[0] ?></td>
              <td><?= $data[1] ?></td>
              <td><?= $data[2] ?></td>
              <td>
              <a href="deletedemande.php?id=<?= $data[0] ?>" class="btn ">
                  <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger btn-sm rounded-0 mb-1" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash-alt"></i></button>
              </a>
            </td>
              <td><?= $data[3] ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
include 'footer.php';
?>