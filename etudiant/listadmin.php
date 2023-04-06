<?php
    $nomPage = "liste admins";
    include 'header.php';

    $pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
    $refu = $_SESSION['nomUtilisateur'];
    $stmt1 = $pdo->query('SELECT * FROM admin');
  
    ?>
    <!DOCTYPE html>
<html>
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
            <th scope="col">EMAIL</th>
            <th scope="col">BOITE</th>
            
          </tr>
        </thead>
        <tbody>
           <?php
           while($m = $stmt1->fetch()):
           ?>
            <tr>
              <td><?= $m[0] ?></td>
              <td><?= $m[1] ?></td>
              <td>
                <a href="liste.php?idAdmin=<?php echo $m['IDADMIN']?>" >
                  <i class='fas fa-envelope' style='font-size:48px;color:red'></i>
                </a>
              </td>
              
            </tr>
         <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</html>

    <?php
    include 'footer.php';
    ?>