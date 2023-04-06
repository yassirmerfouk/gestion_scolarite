<?php
$nomPage = "ajout message";
include 'header.php';
?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');

?>


<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Message</strong>
    </div>
    <div class="card-body card-block">
      <div class="container spacer col-md-6 col-xs-12 col-md-offset-3">

        <div class="panel panel-default">
          <div class="panel-heading">boite message :</div>
          <div class="panel-body">
            <form method="post" action="../controle/ajoutMET.php" enctype="multipart/form-data">




              <div class="form-group">

                <select class="form-control" name="admin" >
                   <?php
                    $req = $pdo->query("SELECT * FROM admin  ");
                   while($data = $req->fetch()):
                   ?>
                <option  value="<?= $data[0] ?>"><?= $data['EMAIL'] ?></option>
                
                
                   <?php endwhile; ?>
        </select>
                <label class="control-label">message</label>
                <textarea class="form-control" rows="3" name="message"></textarea>
              </div>


              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">envoyer</button>
              </div>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

</body>

</html>
<?php
include 'footer.php';
?>