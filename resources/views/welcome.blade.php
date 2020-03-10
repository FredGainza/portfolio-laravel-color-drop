<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/btn.css">

    <title>Color-Drop</title>
</head>

<body>

<!-- particles.js container -->
    <div id="particles-js"></div>

    <div class="container titre text-center pt-5 mb-3">
        <img src="img/logo2.png" alt="Logo Color-Drop de la page d'accueil" class="rounded img-fluid">
        <div class="col-lg-6 offset-lg-3">
            <div class="d-flex justify-content-center pt-3">

                <a href="login" class="buttun btn-3 action-button2 blue ml-4 mr-2">Connexion</a>
                <a href="register" class="buttun btn-3 action-button2 green mr-4 ml-2">Nouveau compte</a>

            </div>
        </div>

        <div class="col-lg-6 offset-lg-3 mx-auto pt-4">
        <a href="{{ route('rules') }}" target="_blank" class="text-white bg-success bord">Philosophie du jeu</a>
        </div>
    </div>

    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <!-- stats.js lib -->
    <script src="https://threejs.org/examples/js/libs/stats.min.js"></script>
    <!-- star JS -->
    <script src="js/star.js"></script>
    <!-- Cookie Bar -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/cookie-bar/cookiebar-latest.min.js?remember=1%20days"></script>
</body>
</html>
