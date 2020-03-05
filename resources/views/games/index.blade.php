<?php
    // Création de cookie (pour gérer lien avec la bdd)
    setcookie('player_id', $player->id, time() + 24*3600);
    setcookie('player_difficulty', $player->difficulty, time() + 24*3600);
    if(isset($_COOKIE['scoreTotal']) && $_COOKIE['scoreTotal'] !== 0){
        $scoreTotal = $_COOKIE['scoreTotal'];
    }

    // Création d'un tableau qui va contenir tous les scores d'une partie (scores des 10 niveaux)
    $tabScores = [];
    for ($i=1; $i<=10; $i++){
        if (isset($_COOKIE['score'.$i]) && ($_COOKIE['score'.$i]) !== 0){
            $tabScores[] = $_COOKIE['score'.$i];
        }
    }
    if (isset($tabScores)){
        $scoreActuel = 0;
        for ($i=0; $i<count($tabScores); $i++){
            $scoreActuel += $tabScores[$i];
        }
    }

    // Création d'un tableau qui va contenir tous les temps réalisés au cours d'une partie (temps réalisé aux 10 niveaux)
    $tabDuree = [];
    for ($i=1; $i<=10; $i++){
        if (isset($_COOKIE['temps'.$i]) && ($_COOKIE['temps'.$i]) !== 0){
            $tabDuree[] = $_COOKIE['temps'.$i];
        }
    }
?>

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
        <!-- CSS Timer -->
        <link rel="stylesheet" href="css/timer.css">

        <link rel="stylesheet" href="css/gameStyle.css">
        <link rel="stylesheet" href="css/animate.min.css">

        <title>Color-Drop - Le JEU</title>
    </head>

    <body>
        <div id="element">

            <!-- Start Container Principal -->
            <div class="container_principal">







                <!-- #################### DEBUT CONTAINER DU JEU ################## -->
                <!-- ############################################################## -->

                <!-- CONTAINER CIBLE : PARTIE DROP -->
                <div id="containerCible" class="containerCible">
                    <div id="cible" class="rowFlex cible align-items-center justify-content-around">
                    </div>
                </div>

                <!-- CONTAINER ORIGINE : PARTIE DRAG -->
                <div id="containerOrigin" class="containerOrigin">
                    <div id="origin" class="row origin align-items-center justify-content-around">
                    </div>
                </div>

                <!-- ################################################################# -->
                <!-- ####################### FIN CONTAINER DU JEU #################### -->



                <div id="container1" class="container">
                    <!-- ################ ROW 1 ################ -->
                    <div class="row">

                        <!-- Affichage du score -->
                        <div class="col-5 offset-3 mt-4">
                            <img src="img/logo-color.png" class="img-fluid" alt="Logo de Color-Drop">
                        </div>
                        <div id="score" class="col-3 mt2-5r score cartoon">
                            <span>SCORE :</span> &nbsp;&nbsp;&nbsp; <span id="scoreAffiche" class="text-danger"></span>
                        </div>
                        <!-- Affichage icône fullscreen -->
                        <div class="fullScreen"><img id="fullScreen" src="" class="iconFull" alt="Icône représentant le plein écran"></div>
                    </div>


                    <!-- ################ ENTRE ROW 1 ET 2 ################ -->
                    <!-- Message de fin du jeu -->
                    <div id="gameFinished" class="gameFinished">
                    </div>


                    <!-- ################ ROW 2 ################ -->
                    <!-- NOTIFICATIONS DURANT LE GAME -->
                    <div id="notif" class="row notif">

                        <!-- Infos du player lors de la partie -->
                        <div id="player" class="col-sm-4 pt-1 nameStyle">
                            <div id="levelNumber" class="levelNumber">
                            </div>
                            <img src="img/bandeau.png" class="img-fluid" alt="Bandeau décoratif du panel joueur">
                            <div class="pad-b-10p lineHeight-1">
                                <div id="playerId" class="fz-2-5rem lineHeight-4 cartoon mvw-y-2">{{$player->name}}</div>
                                <div id="numPartie" class="fz-1-7rem cartoon lineHeight-1-5">Partie n° : <span
                                        class="color-encart">{{$player->nbGames + 1}}</span></div>
                                <div class="lineHeight-1-5">
                                    <span class="fz-1-7rem cartoon">Score cumulé :</span>&nbsp;
                                    <span id="scoreCumul" class="fz-1-7rem cartoon color-encart"></span><br>
                                    <span id="mode jeu" class="fz-1-7rem cartoon">Mode de jeu : <span
                                            class="color-encart">{{ucfirst($player->difficulty)}}</span></span>
                                </div>
                            </div>
                        </div>



                        <!-- Message de réussite lors de chaque correspondance -->
                        <div class="col-sm-6 offset-sm-4 pvw-r-3 text-center">
                            <h3 class="reussiteCorrespondance text-left animated wobble duration-2s">Bonne
                                réponse ! &#128515;</h3>
                            <h3 class="reussiteCorrespondance2 text-left animated jackInTheBox duration-2s">Bonne
                                réponse ! &#128515;</h3>
                            <img id="successLevel" src="" class="successLevel img-fluid animated flash delay-3s infinite pulse pvw-t-3"
                                alt="">
                            <!-- Affichage du message : Niveau Suivant -->
                            <div class="containerLevelJeu pvw-t-1">
                                <img id="nextLevel" src="img/suivant.png" width="300" class="jeuLevel ecouteurJeu mx-auto animated infinite jello img-fluid">
                            </div>
                        </div>


                    </div>
                </div>

                <!-- ############################################################ -->
                <!-- ################ FIN CONTAINER INFORMATIONS ################ -->








                <!-- Récupération des données de la table level (temps limites pour nombre d'étoiles) -->
                @if(!empty($levels))
                @foreach($levels as $level)
                <div id="level_{{ $level->id }}" style="display:none;">{{ $level->id }}</div>
                <div id="2et_level_{{ $level->id }}" style="display:none;">{{ $level->two_stars }}</div>
                <div id="3et_level_{{ $level->id }}" style="display:none;">{{ $level->three_stars }}</div>
                @endforeach
                @endif

                <!-- Bouton pour lancer la partie -->
                <div class="containerLancerJeu">
                    <div id="lancerJeu" class="ecouteurJeu jeuStart text-center">
                        <button id="go-button" type="button" class="btn btn-success btn-link btn-block text-white fz-170">JOUER</button>
                    </div>
                </div>

                <!-- Bouton pour enregistrer la partie dans la bdd -->
                <div id="gameEnd" class="gameEnd" style="display:none;">
                    <form action=""></form>
                    <a href="{{ route('score') }}">
                        <button class="btn btn-success btn-lg" type="button" onclick="this.disabled = true;">VALIDER LA PARTIE</button>
                    </a>
                </div>

                <!-- Zone des réglages (boutons audio, config et didactitiel) -->
                <div class="container">
                    <div id="option" class="row option">
                        <div class="width-button" id="audioTool">
                            <a href="https://project-color.fgainza.fr/pindex"
                                onclick="return confirm('Si vous quittez le jeu maintenant, la partie en cours sera annulée. \n Etes-vous certain de vouloir quitter le jeu ?')"><img
                                    src="img/config.png" id="config" title="Administration Parents"
                                    class="width-button disp-but audio3 img-fluid"></a>
                            <a href="https://project-color.fgainza.fr/help" target="_blank"
                                onclick="return alert('La page demandée va s\'ouvrir dans un nouvel onglet pour que vous puissiez continuer votre partie en cours')"><img
                                    src="img/info.png" id="info" title="Informations et Aide" class="width-button disp-but audio4 img-fluid"></a>
                            <a href="#"><img src="img/audio/bruit-off.png" id="toggleBruit" title="Sons"
                                    class="width-button audio2 img-fluid"></a>
                            <audio id="music" class="lecteur">
                                <source src="sounds/Twinkle_Twinkle_Little_Star_instrumental.mp3" type="audio/mpeg">
                                Votre navigateur ne supporte pas ce format audio.
                            </audio>
                            <a href="#"><img src="img/audio/music-off.png" id="playerMusic" title="Musique" class="width-button audio1 img-fluid"
                                    onclick="javascript:toggleSound()" ;></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Container Principal -->

            <!-- Message si orientation en mode portrait -->
            <div id="landscape" class="landscape">
                <div class="alert alert-danger txt-land fade show text-left" role="alert">
                    <i class="fas fa-times mr-2"></i>Attention, ce jeu n'accepte que le mode "Paysage".<br>
                    <i class="fas fa-times mr-2"></i>Le mode "Portrait" n'est pas autorisé.<br>
                    <i class="fas fa-times mr-2"></i>Veuillez orienter votre appareil dans le mode demandé, afin de pouvoir jouer.
                </div>
            </div>

            <!-- Récupération BDD des infos du joueur -->
            <div id="choixDiff" style="display:none;">{{ $player->difficulty }}</div>
            <div id="scoreCumulInit" style="display:none;">{{ $player->score }}</div>


            <!-- CookieBar -->
            <script type="text/javascript"
                src="https://cdn.jsdelivr.net/npm/cookie-bar/cookiebar-latest.min.js?theme=altblack&always=1"></script>
            <!-- CDN jQuery -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <!-- CDN jQuery UI -->
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
                integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
            <!-- CDN jQuery UI Touch -->
            <script src="js/jquery.ui.touch-punch.min.js"></script>
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
            <!-- JS Timer  -->
            <script src="js/timer.js"></script>
            <!-- JS Personnel  -->
            <script src="js/gameMain.js"></script>

            <!-- Script qui gère le fullscreen et l'affichage des icônes -->
            <script>
                var fullscreenButton = document.getElementById("fullScreen");
                fullscreenButton.addEventListener("click", toggleFullScreen, false);
                function toggleFullScreen() {
                    $('#fullScreen').attr('src', 'img/reduce-128-blue.png').delay(1000)
                    if (!document.fullscreenElement &&    // alternative standard method
                        !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
                            if (document.documentElement.requestFullscreen) {
                                document.documentElement.requestFullscreen();
                            } else if (document.documentElement.msRequestFullscreen) {
                                document.documentElement.msRequestFullscreen();
                            } else if (document.documentElement.mozRequestFullScreen) {
                                document.documentElement.mozRequestFullScreen();
                            } else if (document.documentElement.webkitRequestFullscreen) {
                                document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                            }
                    } else {
                        $('#fullScreen').attr('src', 'img/expand-128-blue.png').delay(1000);
                        if (document.exitFullscreen) {
                            document.exitFullscreen();
                        } else if (document.msExitFullscreen) {
                            document.msExitFullscreen();
                        } else if (document.mozCancelFullScreen) {
                            document.mozCancelFullScreen();
                        } else if (document.webkitExitFullscreen) {
                            document.webkitExitFullscreen();
                        }
                    }
                }
            </script>

            <!-- Script qui gère l'affichage de début de jeu - Timer + Bouton 'Lancer le Jeu' -->
            <script>
                $(document).ready(function(){
                    $('#lancerJeu').fadeOut().delay(5000).fadeIn();
                    $('#timer').delay(5000).fadeOut();
                })
            </script>

            <!-- Affichage du Timer avant le début du jeu -->
            <div class='radialtimer' id='timer'></div>


        </div>
    </body>

</html>
