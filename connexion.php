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
    <title>Connexion</title>

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
                                        Vouz n'avez pas un compte pour se connecter
                                    </div>
                                    <?php
                                } else {
                                    if ($_GET['erreur'] == 3) {
                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                            merci de vérifier votre mot de passe
                                        </div>
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                        <div class="login-form">
                            <form action="controle/validationConnexion.php" method="POST">
                                <div class="form-group">
                                    <label>Nom d'utilisateur *</label>
                                    <input class="au-input au-input--full form-control" type="text" name="nomUtilisateur" placeholder="Nom utilisateur">
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe *</label>
                                    <input class="au-input au-input--full form-control" type="password" name="password" placeholder="Mot de passe">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <a href="forgotPassword.php">Mot de passe oublié ?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" style="background-color: rgba(49,162,221,.8);">se connecter</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    <a href="creationCompte.php">Créer un compte</a>
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