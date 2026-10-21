<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: dashboad.html");
    exit();
}


$identifiant = $_SESSION['identifiant'];


$host = 'mysql.justhost.ru';
$dbname = 's968162_accessgci';
$user = 's968162_accessgci';
$password = 'CXv5UH3cSsVnQJ3QB8cF';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Erreur de connexion à la base de données : " . $e->getMessage());
    die("Mot de passe ou identifiant incorrect.");
}


try {
    $sql = "SELECT nom, prenom, solde, statut_compte FROM utilisateurs WHERE id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':user_id' => $_SESSION['user_id']]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Erreur de récupération des données utilisateur : " . $e->getMessage());
    
    $userData = [];
}

?>

<





<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="" rel="icon">
    <title>Ma banque en ligne</title>
    <meta name="description" content="">
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
============================================= -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" type="text/css">

    <!-- Stylesheet
============================================= -->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script>
</head>

<body class="" style="">



    <!-- Preloader -->
    <div id="preloader" style="display: none;">
        <div data-loader="dual-ring"></div>
    </div>
    <!-- Preloader End -->

    <!-- Document Wrapper   
============================================= -->
    <div id="main-wrapper">
        <!-- Header
============================================= -->
        <header id="header">
            <div class="container">
                <div class="header-row">
                    <div class="header-column justify-content-start">
                        <!-- Logo
============================= -->
                        <div class="logo">
                            <a class="d-flex" href="#dashboard.html" title="Mon compte en ligne - Acceuil"><img src="images/sg1.png" alt="Mon compte en ligne"></a>
                        </div>
                        <!-- Logo end -->
                        <!-- Collapse Button
============================== -->
                        <button class="navbar-toggler" type="button" data-toggle="" data-target="#header-nav" aria-expanded="false"> <span></span> <span></span> <span></span> </button>

                        <!-- Collapse Button end -->

                        <!-- Primary Navigation
============================== -->
                        <nav class="primary-menu navbar navbar-expand-lg">
                            <div id="header-nav" class="navbar-collapse collapse muted " style="">
                                <ul class="navbar-nav mr-auto">
                                    <li class="active"><a href="dashboard.html">ACCEUIL</a></li>
                                    <li><a href="#cards.html">MES CARTES</a></li>
                                    <li><a href="#transactions.html">CREDITS</a></li>
                                    <li><a href="#send-money.html">EPARGNES</a></li>
                                    <li><a href="#help.html">ASSURANCES</a></li>

                                   
                                </ul>
                            </div>
                        </nav>
                        <!-- Primary Navigation end -->
                    </div>
                    <div class="header-column justify-content-end">
                        <!-- Login & Signup Link
============================== -->
                        <nav class="login-signup navbar navbar-expand">
                            <ul class="navbar-nav">
                                <li> </li>
                                <li class="align-items-center h-auto ml-sm-3"><a class="btn btn-outline-primary shadow-none " href="./index.html">Déconnexion</a></li>
                            </ul>
                        </nav>
                        <!-- Login & Signup Link end -->
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->
        <div class="bg-primary">
            <div class="container d-flex justify-content-center">
                <ul class="nav secondary-nav">
                    <li class="nav-item"> <a class="nav-link" href="dashboard.html">Bienvenue M. THomas GUICHARD</a></li>


                </ul>
            </div>
        </div>
        <!-- Content
============================================= -->
        <div id="content" class="py-4">
            <div class="container">
                <div class="row">
                    <!-- Left Panel
============================================= -->
                    <aside class="d-none d-md-block col-lg-3">
                        <div style="width:100%;height:0;padding-bottom:75%;position:relative;"><img src="./images/bnp12.png" width="100%" height="100%" style="position:absolute" frameborder="0" class="giphy-embed"
                                allowfullscreen="">
                        </div>
                        <p></p>

                        <!-- Profile Details
=============================== -->

                        <!-- Profile Details End -->

                        <!-- Available Balance
=============================== -->

                        <div style="width:100%;height:0;padding-bottom:100%;position:relative;"><img src="./images/bnp11.png" width="100%" height="100%" style="position:absolute" frameborder="0" class="giphy-embed" allowfullscreen="">
                        </div>

                        <!-- Need Help?
=============================== -->
                        <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
                            <div class="text-17 text-light my-3"><i class="fas fa-comments"></i></div>
                            <h3 class="text-3 font-weight-400 my-4">Besoin d'aide ou de conseils ?</h3>
                            <p class="text-muted opacity-8 mb-4">Vous avez des questions ou des préoccupations concernant votre compte ?<br>
Nos experts sont là pour aider!</p>
                            <a href="page3.html" class="btn btn-primary btn-block">Contactez-nous</a> </div>
                        <!-- Need Help? End -->

                    </aside>
                    <!-- Left Panel End -->

                    <!-- Middle Panel
============================================= -->
                    <div class="col-lg-9">

                        <!-- Profile Completeness
=============================== -->
                        <div class="bg-light shadow-sm rounded p-4 mb-4">
                            <h3 class="text-2 font-weight-400 d-flex align-items-center px-4 mb-3"></h3>
                            <div class="row profile-completeness">
                                <div class="col-12 col-sm-6">
                                    <div class="account-card account-card-primary text-white rounded mb-4 mb-lg-0">
                                        <div class="row no-gutters">
                                            <div class="col-3 d-flex justify-content-center p-3">
                                                <div class="my-auto text-center text-13"> <i class="fas fa-university"></i>
                                                    <p class="bg-light text-0 text-body font-weight-500 rounded-pill d-inline-block px-2 line-height-4 opacity-8 mb-0">CREDIT AGRICOLE</p>
                                                </div>
                                            </div>
                                            <div class="col-9 border-left">
                                                <div class="py-4 my-2 pl-4">
                                                    <p class="text-3 mb-1">Compte Courant</p>
                                                    <p class="text-4 opacity-9 mb-1">CPT. XXXXXX-0617</p>
                                                    <p class="text-3 opacity-9 mb-1">Statut du compte: <span class="bg-success text-white rounded-pill d-inline-block px-2 mb-0"><i class="fa fa-times"></i> Bloqué !</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="account-card-overlay rounded"> <a href="#transfer.php" class="text-light btn-link mx-2"><span class="mr-1"><i class="fas fa-share"></i></span>Votre compte est bloqué. Vous ne pouvez pas effectuer cette action. </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="border rounded p-1 text-lg-justify"> <span class="d-block text-15 text-light mt-2 mb-3"><i class="fas fa-wallet"></i></span>
                                        <h3 class="text-7 font-weight-400">7 000 000.00 €</h3>
                                        <p class="mb-2 text-muted opacity-8">Solde Disponible </p>

                                     <div class="d-flex"> <a href="#transfer.php" class="btn btn-primary btn-block">Espace virement</a></div>
                                    </div>
                                </div>
<!-- Menu bloqué -->
<div class="container my-5">
  <ul id="menu-bloque" class="list-group text-center">
  <li class="btn btn-primary btn-block">
    <img src="images/facture.png" width="25" alt="Facture" class="mr-2"> Payer une Facture
  </li>
  <li class="btn btn-primary btn-block">
    <img src="images/beneficiaires.png" width="25" alt="Bénéficiaires" class="mr-2"> Gerer les bénéficiaires
  </li>
  <li class="btn btn-primary btn-block">
    <img src="images/qr.png" width="25" alt="QR" class="mr-2"> Générer un code QR
  </li>
  <li class="btn btn-primary btn-block">
    <img src="images/cartes.png" width="25" alt="Cartes" class="mr-2"> Mes Cartes
  </li>
</ul>
  <div id="message-bloque" class="alert alert-danger" style="display:none; margin-top:20px;">
    Votre compte est bloqué, accès limité
  </div>
</div>
                            </div>
                        </div>
                        <!-- Profile Completeness End -->

                        <!-- Recent Activity
=============================== -->
                        <div class="bg-light shadow-sm rounded py-4 mb-4">
                            <h3 class="text-5 font-weight-400 d-flex align-items-center px-4 mb-3">Historique des opérations</h3>

                            <!-- Title
=============================== -->
                            <div class="transaction-title py-2 px-4">
                                <div class="row">
                                    <div class="col-2 col-sm-1 text-center"><span class="">Date</span></div>
                                    <div class="col col-sm-7">Description</div>
                                    <div class="col-auto col-sm-2 d-none d-sm-block text-center">Status</div>
                                    <div class="col-3 col-sm-2 text-right">Montant</div>
                                </div>
                            </div>
                            <!-- Title End -->

                            <!-- Transaction List
=============================== -->
                        <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="##transaction-detail">
                                    <div class="row align-items-center flex-row">
                                        <div class="col-2 col-sm-1 text-center"> <span class="d-block text-4 font-weight-300">13</span> <span class="d-block text-1 font-weight-300 text-uppercase">MAR</span> </div>
                                        <div class="col col-sm-7"> <span class="d-block text-4">PRC GmbH</span> <span class="text-muted">Paiement par carte - Ref. DL3900711</span> </div>
                                        <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3"> <span class="text-danger" data-toggle="tooltip" data-original-title="Cancelled"><i class="fas fa-times-circle"></i></span> </div>
                                        <div class="col-3 col-sm-2 text-right text-4"> <span class="text-nowrap">- 50</span> <span class="text-2 text-uppercase">€</span> </div>
                                    </div>
                                </div>
                            <div class="transaction-list">
                                <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="##transaction-detail">
                                    <div class="row align-items-center flex-row">
                                        <div class="col-2 col-sm-1 text-center"> <span class="d-block text-4 font-weight-300">12</span> <span class="d-block text-1 font-weight-300 text-uppercase">JAN</span> </div>
                                        <div class="col col-sm-7"> <span class="d-block text-4">CAISSE</span> <span class="text-muted">Retrait d'espèce - Ref. DL1752006</span> </div>
                                        <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3"> <span class="text-success" data-toggle="tooltip" data-original-title="In Progress"><i class="fas fa-check-circle"></i></span> </div>
                                        <div class="col-3 col-sm-2 text-right text-4"> <span class="text-nowrap">- 9000</span> <span class="text-2 text-uppercase">€</span> </div>
                                    </div>
                                </div>
                                <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="##transaction-detail">
                                    <div class="row align-items-center flex-row">
                                        <div class="col-2 col-sm-1 text-center"> <span class="d-block text-4 font-weight-300">12</span> <span class="d-block text-1 font-weight-300 text-uppercase">JAN</span> </div>
                                        <div class="col col-sm-7"> <span class="d-block text-4">LIQUI. ASS. TFG</span> <span class="text-muted">Virement reçu - Ref. DL1752024 </span> </div>
                                        <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3"> <span class="text-success" data-toggle="tooltip" data-original-title="Completed"><i class="fas fa-check-circle"></i></span> </div>
                                        <div class="col-3 col-sm-2 text-right text-4"> <span class="text-nowrap">+150 000</span> <span class="text-2 text-uppercase">€</span> </div>
                                    </div>
                                </div>
                                <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="##transaction-detail">
                                    <div class="row align-items-center flex-row">
                                        <div class="col-2 col-sm-1 text-center"> <span class="d-block text-4 font-weight-300">12</span> <span class="d-block text-1 font-weight-300 text-uppercase">JAN</span> </div>
                                        <div class="col col-sm-7"> <span class="d-block text-4">DGIFR</span> <span class="text-muted">Virement sortant - Ref. DL1752183</span> </div>
                                        <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3"> <span class="text-success" data-toggle="tooltip" data-original-title="Completed"><i class="fas fa-check-circle"></i></span> </div>
                                        <div class="col-3 col-sm-2 text-right text-4"> <span class="text-nowrap">- 700</span> <span class="text-2 text-uppercase">€</span> </div>
                                    </div>
                                </div>
                            
                               
                            <!-- Transaction List End -->

                            <!-- Transaction Item Details Modal
=========================================== -->
                            <div id="#transaction-detail" class="modal fade" role="dialog" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered #transaction-details" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row no-gutters">
                                                <div class="col-sm-5 d-flex justify-content-center bg-primary rounded-left py-4">
                                                    <div class="my-auto text-center">
                                                        <div class="text-17 text-white my-3"><i class="fas fa-check"></i></div>
                                                        <h3 class="text-4 text-white font-weight-400 my-3">Even Pty Ltd</h3>
                                                        <div class="text-8 font-weight-500 text-white my-4">557.20</div>
                                                        <p class="text-white">15 March 2019</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <h5 class="text-5 font-weight-400 m-3">Détails de l'opération
                                                        <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                                    </h5>
                                                    <hr>
                                                    <div class="px-3">
                                                        <ul class="list-unstyled">
                                                            <li class="mb-2">Payment Amount <span class="float-right text-3">562.00</span></li>
                                                            <li class="mb-2">Fee <span class="float-right text-3">-4.80</span></li>
                                                        </ul>
                                                        <hr class="mb-2">
                                                        <p class="d-flex align-items-center font-weight-500 mb-4">Total Amount <span class="text-3 ml-auto">557.20</span></p>
                                                        <ul class="list-unstyled">
                                                            <li class="font-weight-500">Paid By:</li>
                                                            <li class="text-muted">Envato Pty Ltd</li>
                                                        </ul>
                                                        <ul class="list-unstyled">
                                                            <li class="font-weight-500">Transaction ID:</li>
                                                            <li class="text-muted">26566689645685976589</li>
                                                        </ul>
                                                        <ul class="list-unstyled">
                                                            <li class="font-weight-500">Description:</li>
                                                            <li class="text-muted">Env March 2019 Member Payment</li>
                                                        </ul>
                                                        <ul class="list-unstyled">
                                                            <li class="font-weight-500">Status:</li>
                                                            <li class="text-muted">Completed</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Transaction Item Details Modal End -->

                            <!-- View all Link
=============================== -->
                            <div class="text-center mt-4"><a href="#" class="btn-link text-3">Voir plus<i class="fas fa-chevron-right text-2 ml-2"></i></a></div>
                            <!-- View all Link End -->

                        </div>
                        <!-- Recent Activity End -->
                    </div>
                    <!-- Middle Panel End -->
                </div>
            </div>
        </div>
        <!-- Content end -->

        <!-- Footer
============================================= -->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg d-lg-flex align-items-center">
                        <ul class="nav justify-content-center justify-content-lg-start text-3">
                            <li class="nav-item"> <a class="nav-link active" href="page3.html">Mon gestionnaire</a></li>
                            <li class="nav-item"> <a class="nav-link" href="#">Outils pratiques</a></li>
                            <li class="nav-item"> <a class="nav-link" href="page3.html">Aide</a></li>



                        </ul>
                    </div>
                    <div class="col-lg d-lg-flex justify-content-lg-end mt-3 mt-lg-0">
                        <ul class="social-icons justify-content-center">
                            <li class="social-icons-facebook"><a data-toggle="tooltip" href="http://www.facebook.com/" target="_blank" title="" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-twitter"><a data-toggle="tooltip" href="http://www.twitter.com/" target="_blank" title="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li class="social-icons-google"><a data-toggle="tooltip" href="http://www.google.com/" target="_blank" title="" data-original-title="Google"><i class="fab fa-google"></i></a></li>
                            <li class="social-icons-youtube"><a data-toggle="tooltip" href="http://www.youtube.com/" target="_blank" title="" data-original-title="Youtube"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-copyright pt-3 pt-lg-2 mt-2">
                    <div class="row">
                        <div class="col-lg">
                            <p class="text-center text-lg-left mb-2 mb-lg-0"><a href="#">CREDIT AGRICOLE- © 2010</a>. Tout droit reservé.</p>
                        </div>
                        <div class="col-lg d-lg-flex align-items-center justify-content-lg-end">
                            <ul class="nav justify-content-center">
                                <li class="nav-item"> <a class="nav-link active" href="#">Sécurité</a></li>
                                <li class="nav-item"> <a class="nav-link" href="#">Termes</a></li>
                                <li class="nav-item"> <a class="nav-link" href="#">Confidentialité</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer end -->

    </div>
    <!-- Document Wrapper end -->

    <!-- Back to Top
============================================= -->
    <a id="back-to-top" data-toggle="tooltip" title="" href="javascript:void(0)" data-original-title="Back to Top" style="display: inline;"><i class="fa fa-chevron-up"></i></a>


<

    <!-- Script -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>

    <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h6 class="modal-title" style="text-align: center;"><strong><span  class="text-danger"><i class="fa fa-info-circle" aria-hidden="true"></i> Votre compte est Bloqué ! <br /> </strong>  </span> <br> 
                
               Frais de déblocage:  <span class="bg-success text-lg-justify mb-2 mb-lg-0 text-white rounded-pill d-inline-block px-2 mb-0"><i class="fas fa-check-circle"></i> 132 753 €</span> 
                <br>      Besoin d'aide ? Veuillez contacter votre gestionnaire.<b> 
</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">


                <div class="d-flex text-align-lift">
 <a href="page3.html" class="btn btn-outline-secondary btn-block"><i class="fa fa-envelope" aria-hidden="true"></i> Contacter mon gestionnaire 
</a></div><br> 
                <div class="d-flex text-align-center"> <a href="dashboard.html" class="btn btn-outline-secondary btn-block"> <button type="button" class="btn btn-warning btn-block" data-dismiss="modal"><i class="fa fa-university" aria-hidden="true"></i>
 Accéder à mon compte</button> </a></div><br> 


                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script de contrôle -->
<script>
  $(document).ready(function () {
    // Affiche la modal si on est sur une page autre que dashboard.html
    if (!window.location.href.includes("dashboard.html")) {
      $('#myModal').modal('show');
    }

    // Redirection quand on clique sur "Accéder à mon compte"
    $('#accessAccount').on('click', function () {
      window.location.href = 'dashboard.html';
    });

    // Redirection quand on clique sur la croix
    $('#closeModalBtn').on('click', function () {
      window.location.href = 'dashboard.html';
    });
  });
</script>




                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>
