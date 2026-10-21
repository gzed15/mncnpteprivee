<?php
$host = 'mysql.justhost.ru';
$dbname = 's968162_accessgci';
$user = 's968162_accessgci';
$password = 'CXv5UH3cSsVnQJ3QB8cF';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_utilisateur = $_POST['id_utilisateur'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    $stmt = $conn->prepare("SELECT mot_de_passe FROM utilisateurs WHERE id_utilisateur = ?");
    $stmt->bind_param("s", $id_utilisateur);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hash);
        $stmt->fetch();

        if (password_verify($mot_de_passe, $hash)) {
            $message = "✅ Connexion réussie !";
        } else {
            $message = "❌ Mot de passe incorrect.";
        }
    } else {
        $message = "❌ Identifiant introuvable.";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href=">images/logo.png" rel="icon">
<title>Mon compte en ligne - Connexion</title>
<meta name="description" content="This professional design html template is for build a Money Transfer and online payments website.">
<meta name="author" content="harnishdesign.net">
<link rel="stylesheet" href="../../css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" type="text/css">
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body>
<div id="preloader" style="display: none;">
  <div data-loader="dual-ring"></div>
</div>
<div id="main-wrapper" class="h-100">
  <div class="container-fluid px-0 h-100">
    <div class="row no-gutters h-100">
      <div class="d-none d-md-block col-md-6">
        <div class="hero-wrap d-flex align-items-center h-100">
          <div class="hero-mask opacity-8 bg-primary"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('images/bg/Bannermaghr2.gif');"></div>
          <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
            <div class="row no-gutters">
              <div class="col-10 col-lg-9 mx-auto">
                <div class="logo mt-5 mb-5 mb-md-0"> <a class="d-flex" href="index.html" title="Connexion"></a> </div>
              </div>
            </div>
            <div class="row no-gutters my-auto">
              <div class="col-10 col-lg-9 mx-auto">
                <h1 class="text-11 text-white mb-4">Heureux de vous revoir !</h1>
                <p class="text-4 text-white line-height-4 mb-5">Effectuez vos opérations en ligne en toute sécurité depuis un smartphone ou un ordinateur.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 d-flex align-items-center">
        <div class="container my-4">
          <div class="row">
            <div class="col-11 col-lg-9 col-xl-8 mx-auto">
              <img src="images/BNP-Paribas-Logo-700x394.png" alt="La Banque Mobile"> <br><br>
              <h3 class="font-weight-400 mb-4">ACCÉDER À MA BANQUE EN LIGNE</h3>
              <form name="loginform" method="post" action="#" id="loginform">
                <input type="hidden" name="form_name" value="loginform">
                <div class="form-group">
                  <label for="identifiant">IDENTIFIANT</label>
                  <input type="text" class="form-control" id="identifiant" required placeholder="Saisissez votre identifiant à 11 chiffres" name="username">
                </div>
                <div class="form-group">
                  <label for="motdepasse">MOT DE PASSE</label>
                  <input type="password" class="form-control" id="motdepasse" required placeholder="Saisissez votre mot de passe à 8 chiffres" name="password">
                </div>
                <div class="row">
                  <div class="col-sm">
                    <div class="form-check custom-control custom-checkbox">
                      <input id="remember-me" name="remember" class="custom-control-input" type="checkbox">
                    </div>
                  </div>
                  <div class="col-sm text-right"></div>
                </div>
                <button class="btn btn-primary btn-block my-4" type="submit">Connexion</button>
                <div id="erreur" style="display:none; text-align:center; color:red; margin-top:20px;">
                  <p>Connexion erronée. Veuillez réessayer avec vos identifiants valides.</p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<a id="back-to-top" data-toggle="tooltip" title="" href="javascript:void(0)" data-original-title="Back to Top" style="display: none;"><i class="fa fa-chevron-up"></i></a>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/theme.js"></script>
<script>
  document.getElementById("loginform").addEventListener("submit", function(event) {
    event.preventDefault();
    const identifiant = document.getElementById("identifiant").value.trim();
    const motdepasse = document.getElementById("motdepasse").value.trim();
    const identifiantAttendu = atob("NTgzMjQxNTEwMDE=");
    const motdepasseAttendu = atob("NjMxMDQ4OTc=");
    if (identifiant === identifiantAttendu && motdepasse === motdepasseAttendu) {
      window.location.href = "dashboard.html";
    } else {
      document.getElementById("erreur").style.display = "block";
    }
  });
</script>
</body>
</html>
