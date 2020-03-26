<!DOCTYPE html>
<html lang="fr">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160287169-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-160287169-1');
    </script>

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
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/btn.min.css">
    <link rel="stylesheet" href="css/tooltips.min.css">

    <title>Color-Drop</title>
</head>

<body>

<!-- particles.js container -->
    <div id="particles-js"></div>

    <div class="container titre text-center pt-1 mb-3">
        <div class="row">
            <div class="philo">
                <a href="{{ route('rules') }}" target="_blank" class="buttun btn-2 action-button3 green2 pt-1 pb-2 mx-auto ">Philosophie du jeu</a>
            </div>
        </div>
        <img src="img/logo2.png" alt="Logo Color-Drop de la page d'accueil" class="rounded img-fluid">
        <div class="col-lg-6 offset-lg-3">
            <div class="d-flex justify-content-center pt-3 pb-4">
                <a href="login" class="buttun btn-3 action-button2 blue ml-4 mr-2">Connexion</a>
                <a href="register" class="buttun btn-3 action-button2 green mr-4 ml-2">Nouveau compte</a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center pt-4 mb-5">
            <a href="{{ route('games.invit') }}" class="buttun btn-2 action-button4 red">Testez-moi !</a>
            <i class="qtip tip-top ml-3" data-tip="Vous pouvez jouer sans vous inscrire. Mais si vous voulez suivre la progression de votre enfant et avoir accès aux différentes options du jeu, nous vous conseillons de créer un compte."><img src="img/info2.png" alt=""></i>
        </div>
    </div>

    <!-- SCRIPTS JS - CREATION DR COOKIES -->
    <script>
        for (let i=1; i<=10; i++){
            let date = new Date(Date.now() + 86400000);
            date = date.toUTCString();
            document.cookie = 'score'+i+'=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC';
            document.cookie = 'temps'+i+'=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC';
        }
    document.cookie = 'scoreTotal=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC';
    document.cookie = 'player_difficulty=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC';
    </script>

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
