<?php
session_start();
if (isset($_SESSION['nomUtilisateur'])) {
    include 'connect/metiers.php';
    $etudiant = new etudiant();
    $etudiant->cne = $_SESSION['nomUtilisateur'];
    if ($etudiant->estEtudiantAvecCompte()) {
        header('location: etudiant/index.php');
    } else {
        header('location: admin/index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Création de compte</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="http://www.ests.uca.ma/">
                                <img src="images/icon/ESTS_logo.png" alt="EstSafi" style="width: 200px;">
                            </a>
                        </div>
                        <?php
                        if (isset($_GET['erreur'])) {
                            if ($_GET['erreur'] == 1) {
                        ?>
                                <div class="alert alert-danger" role="alert">
                                    Vous devez remplire les champs (*)
                                </div>
                                <?php
                            } else {
                                if ($_GET['erreur'] == 2) {
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                        Vous devez utiliser des adresses email identiques
                                    </div>
                                    <?php
                                } else {
                                    if ($_GET['erreur'] == 3) {
                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                            Vous êtes pas autorisé à créer un compte
                                        </div>
                                        <?php
                                    } else {
                                        if ($_GET['erreur'] == 4) {
                                        ?>
                                            <div class="alert alert-danger" role="alert">
                                                Vous avez déjà créer un compte
                                            </div>
                                        <?php
                                        }
                                        if ($_GET['erreur'] == 5) {
                                        ?>
                                            <div class="alert alert-danger" role="alert">
                                                Vous devez utiliser un autre email
                                            </div>
                                <?php
                                        }
                                    }
                                }
                            }
                        }
                        if (isset($_GET['validation'])) {
                            if ($_GET['validation'] == 1) {
                                ?>
                                <div class="alert alert-success" role="alert">
                                    Vous avez créer votre compte avec succès<br>
                                    Verifier votre boite email pour recevoire les informations pour se connecter
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <div class="login-form">
                            <form action="controle/validationCompte.php" method="POST">
                                <div class="form-group">
                                    <label>CNE *</label>
                                    <input class="au-input au-input--full form-control" type="text" name="cne" placeholder="CNE">
                                </div>
                                <div class="form-group">
                                    <label>Adresse Email *</label>
                                    <input class="au-input au-input--full form-control" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Confirmation Email *</label>
                                    <input class="au-input au-input--full form-control" type="email" name="email2" placeholder="Confirmation Email">
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Date de naissance *</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="date" name="date" id="example-date-input">
                                    </div>
                                    <small class="form-text text-muted">ex. 99/99/9999</small>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" style="background-color: rgba(49,162,221,.8);">Créer un compte</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Vouz avez déjà un compte ?
                                    <a href="connexion.php">se connecter</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->