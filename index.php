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

<html lang="fr-MA" dir="ltr">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Service scolarité EST Safi">
  <meta name="keywords" content="ESTS, EST Safi, Service scolarité, scolarité">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Author01">
  <link rel="icon" type="image/png" href="http://www.ests.uca.ma/wp-content/uploads/2019/06/site-166-3d87b0a326e51bcae35aa8103db77c53-2126151068.png">

  <!-----Font Awesome icons-->
  <link rel="stylesheet" href="css/accueil/font_awesome/css/all.min.css">
  <!--* bootstrap css *-->
  <link rel="stylesheet" type="text/css" href="css/accueil/bootstrap.min.css">
  <!--* main css *-->
  <link rel="stylesheet" type="text/css" href="css/accueil/style.css">

  <title>Acceuil -ESTS</title>



</head>

<body>

  <!-- Start Header -->
  <header>



    <section id="mybanner">
      <div class="overlay">
        <img src="images/images/realy.png" alt="Logo" class="logo">
      </div>


      <div class="mybanner-text">

        <!----Home Section Start-->

        <section class="home d-flex align-items-center">


          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-7 col-md-7 ">
                <div class="home-text">
                  <h1>Service Scolarité <span>ESTS</span> </h1>
                  <p>" Nous offre à nos chers étudiants,plusieurs utilités et services pour faciliter
                    leurs tâches administratifs et paperassiers !! "
                  </p>

                  <div class="home-btn">
                    <a href="#" class="btn btn-1">Lire la suite</a>
                    <button type="button" class="btn btn-1 video-play-btn"><i class="fas fa-play"></i>
                    </button>
                  </div>
                </div>>
              </div>
              <div class="col-lg-5 col-md-5  text-center">
                <div class="home-img">
                  <div class="circle">
                    <img src="images/images/educ5.svg" class="educ_i">
                  </div>
                </div>
              </div>

            </div>

          </div>




        </section>

        <!---Video popup Start-->
        <div class="video-popup">
          <div class="video-popup-inner">
            <i class="fas fa-times video-popup-close"></i>
            <div class="iframe-box">
              <iframe id="player-1" src="https://www.youtube.com/embed/wSjat-qZdi4" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
              </iframe>
            </div>
          </div>
        </div>


        <!---Video popup End-->

      </div>


      <div id="navbar">

        <nav>

          <ul>

            <li><a href="index.html">Acceuil</a></li>
            <li><a href="aboutUs.html" target="_blank">À propos de l'ESTS</a></li>
            <li><a href="services.html" target="_blank">Témoignages</a></li>
            <li><a href="activites.html" target="_blank">Formations</a></li>
            <li><a href="connexion.php" target="_blank">Se connecter</a></li>
            <li><a href="creationCompte.php" target="_blank">Créer un compte</a></li>
          </ul>

        </nav>



      </div>

      <div id="menubtn">

        <img src="images/images/menu.png" alt="Menu Button" id="menu">


      </div>

      <script>
        // Variables:
        var menubtn = document.getElementById("menubtn");
        var navbar = document.getElementById("navbar");
        var menu = document.getElementById("menu");


        navbar.style.right = "-250px";

        menubtn.onclick = function() {

          if (navbar.style.right == "-250px") {

            navbar.style.right = "0";
            menu.src = "images/images/cancel.png";

          } else {

            navbar.style.right = "-250px";
            menu.src = "images/images/menu.png";

          }

        }
      </script>

    </section>





  </header>


  <!-- End Header -->










  <!--* jquery js *-->
  <script src="../js/accueil/jquery.min.js"></script>
  <!--* popper js *-->
  <script src="../js/accueil/popper.min.js"></script>
  <!--* bootstrap js *-->
  <script src="../js/accueil/bootstrap.min.js"></script>
  <!--* main js *-->
  <script src="/js/accueil/main.js"></script>




</body>





</html>