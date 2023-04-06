<?php
$nomPage = "liste Documents";
include 'header.php';
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
$etudiant = new etudiant();
$etudiant->cne = $_SESSION['nomUtilisateur'];
$etudiant = $etudiant->rechercheEtudiantAvecCne();
?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Documents</strong>
    </div>
    <div class="card-body card-block">
      <table id="myTable" class="table table-bordered">
        <thead>
          <tr>

            <th scope="col">NAME</th>
            <th scope="col">DOCUMENT</th>
          </tr>
        </thead>
        <tbody>
          <?php
          
          $req = $pdo->query("SELECT * FROM demandes WHERE IDETUDIANT=$etudiant->idEtudiant AND ETATDEMANDE='valide'");
          while ($data = $req->fetch()) :
          ?>
            <tr>
              <td><?= $data['URLDOC'] ?></td>
              <td><?= '<a href="' . $data['URLDOC'] . '">télecharger </a>' ?></td>



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