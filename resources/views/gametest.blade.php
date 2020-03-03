<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CDN font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
        integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <!-- Google font -->
    <link rel="stylesheet" href="css/gameStyle.css">
    <link rel="stylesheet" href="css/animate.min.css">

    <title>Apprends les formes et les couleurs</title>
</head>

<body>
    <div class="container_principal">
        <div id="container1" class="container">
            <div id="option" class="row option audio">
                <div class="col-4" id="audioTool">
                    <a href="#"><img src="img/audio/bruit-off.png" id="toggleBruit" width="60px" alt="";></a>
                    <a href="#"><img src="img/audio/music-off.png" id="player" width="60px" alt="" onclick="javascript:toggleSound()";></a>
                    <audio id="music">
                        <source src="sounds/Twinkle_Twinkle_Little_Star_instrumental.mp3" type="audio/mpeg">
                        Your browser does not support this audio format.
                    </audio>
                </div>
            </div>
            <div id="notif" class="row notif">
                <div class="col-sm-4 pt-5">
                    {{-- {{ $players->name}} --}}
                </div>
                <div id="gameFinished">
                    {{-- {{ $players->name}} --}}
                </div>
                <div class="col-sm-4 pt-5">
                    <h3 class="reussiteCorrespondance text-center animated tada">Bravo, c'est la bonne réponse ! &#128515;</h3>
                    <p></p>
                </div>
                <div class="col-sm-4 pt-5">
                    <div class="containerLancerJeu">
                        <div id="lancerJeu" class="ecouteurJeu jeuStart"><a href="#"><img src="img/game/play.png" width="200px" alt=""></a> </div>
                    </div>
                    <div class="containerLevelJeu">
                        <button id="nextLevel" type="button" class="btn btn-info jeuLevel ecouteurJeu ml-5">Niveau
                            suivant</button>
                    </div>
                </div>
            </div>
            <div id="containerCible" class="containerCible">
                <div id="cible" class="row cible align-items-center justify-content-around">
                </div>
            </div>
            <div id="containerOrigin" class="containerOrigin">
                <div id="origin" class="row origin align-items-center justify-content-around">
                </div>
            </div>


        </div>
    </div>


    <!-- CDN jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- CDN jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <!-- CDN jQuery popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"
        integrity="sha256-fTuUgtT7O2rqoImwjrhDgbXTKUwyxxujIMRIK7TbuNU=" crossorigin="anonymous"></script>
    <!-- CDN Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- JS IonSounds  -->
    <script src="js/ion.sound.min.js"></script>
    <!-- JS jQueryRotate  -->
    <script src="js/jQueryRotate.js"></script>
    <!-- JS Personnel  -->
    <script src="js/gameMain.js"></script>
    <script>

    </script>
</body>

</html>
