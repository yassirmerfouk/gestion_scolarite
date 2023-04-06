<?php
session_start();
ob_start();
if (!isset($_SESSION['nomUtilisateur'])) {
    header('location: ../connexion.php');
} else {
    include '../connect/metiers.php';
    $admin = new admin();
    $admin->email = $_SESSION['nomUtilisateur'];
    if (!$admin->estAdmin()) {
        header('location: ../etudiant/index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?php echo $nomPage ?></title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">
    <link href="../css/mystyle.css" rel="stylesheet" media="all">

    <link href="../css/datatables.css" rel="stylesheet" media="all">

    <link href="" rel="stylesheet" />

    <style>
        .select2-container {
            width: 100% !important;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="">
                            <h1 style="font-family: cursive;">EST SAFI</h1>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-plus"></i>Accueil</a>
                        </li>
                        <li>
                            <a href="index.php">
                                <i class="fa fa-plus"></i>Ajouter Une Liste</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus"></i>Liste Etudiants</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Génie Informatique</a>
                                </li>
                                <li>
                                    <a href="index2.html">Téchnique De management</a>
                                </li>
                                <li>
                                    <a href="index2.html">Génie industriel</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus"></i>Liste Demandes</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="demande.php">Demandes En Attentes</a>
                                </li>
                                <li>
                                    <a href="demandeValide.php">Demandes validées</a>
                                </li>
                                <li>
                                    <a href="type.php">types demandes</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus"></i>Reclamations</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="reclamations.php">Réclamations non traitées</a>
                                </li>
                                <li>
                                    <a href="reclamationsvalide.php">Réclamations traitées</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus"></i>Annonces</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="ajoutAnnonce.php">Ajouter une annonce</a>
                                </li>
                                <li>
                                    <a href="annonces.php">Liste Annonces</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus"></i>message</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="listemsg.php">Ajouter un message</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo justify-content-center">
                <a href="#">
                    <h1 style="font-family: cursive;">EST SAFI</h1>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-plus-square"></i>Accueil</a>
                        </li>
                        <li>
                            <a href="ajouterEtudiants.php">
                                <i class="fa fa-plus-square"></i>Ajouter Une Liste</a>
                        </li>
                        <li class=" has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus-square"></i>Liste Etudiants</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <?php
                                $classes = new classe();
                                $classes = $classes->getAllClasses();
                                ?>
                                <?php
                                foreach ($classes as $classe) {
                                ?>
                                    <li>
                                        <a href="listeEtudiants.php?id=<?php echo $classe->idClasse; ?>"><?php echo $classe->nomClasse; ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li class=" has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus-square"></i>Liste Demandes</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="demande.php">Demandes En Attentes</a>
                                </li>
                                <li>
                                    <a href="demandeValide.php">Demandes Validées</a>
                                </li>
                                <li>
                                    <a href="type.php">types demandes</a>
                                </li>
                            </ul>
                        </li>
                        <li class=" has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus-square"></i>Réclamations</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="reclamations.php">Réclamations non traitées</a>
                                </li>
                                <li>
                                    <a href="reclamationsvalide.php">Réclamation traitées</a>
                                </li>
                            </ul>
                        </li>
                        <li class=" has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus-square"></i>Annonces</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="ajoutAnnonce.php">Ajouter une Annonce</a>
                                </li>
                                <li>
                                    <a href="annonces.php">Liste Annonces</a>
                                </li>
                            </ul>
                        </li>
                        <li class=" has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-plus-square"></i>message</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="class.php">Ajouter un message</a>
                                </li>
                                <li>
                                    <a href="class2.php">boite de reception</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <!--
                                        <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="listemsg.php">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                        !-->
                                    <!--
                                        <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                        !-->
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <!--
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                        !-->
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <?php
                                    $admin = new admin();
                                    $admin->email = $_SESSION['nomUtilisateur'];
                                    $admin = $admin->rechercheAdminAvecEmail();
                                    ?>
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../images/icon/avatar-01.jpg" alt="admin" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <img src="../images/icon/avatar-01.jpg" alt="admin" />
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">Admin
                                                    </h5>
                                                    <span class="email"><?php echo $admin->email; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="profile.php">
                                                        <i class="zmdi zmdi-account"></i>Mon compte</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../deconnexion.php">
                                                    <i class="zmdi zmdi-power"></i>Se deconnecter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">