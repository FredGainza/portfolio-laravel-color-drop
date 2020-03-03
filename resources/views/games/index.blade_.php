<?php
    setcookie('player_id', $player->id, time() + 24*3600);
    setcookie('player_difficulty', $player->difficulty, time() + 24*3600);
    if(isset($_COOKIE['scoreTotal']) && $_COOKIE['scoreTotal'] !== 0){
        $scoreTotal = $_COOKIE['scoreTotal'];
    }
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
    <!-- Google font -->
    <link rel="stylesheet" href="css/gameStyle.css">
    <link rel="stylesheet" href="css/animate.min.css">

    <title>Apprends les formes et les couleurs</title>
</head>

<body>
    <div class="container_principal">

<!-- ################ DEBUT CONTAINER INFORMATIONS ################ -->
<!-- ############################################################## -->

        <div id="container1" class="container">

            <!-- Bouton pour enregistrer la partie dans la bdd -->
            <div id="gameEnd" class="gameEnd" style="display:none;">
                <form action=""></form>
                <a href="{{ route('score') }}">
                    <button class="btn btn-success btn-lg" type="button">VALIDER LA PARTIE</button>
                </a>
            </div>

            <!-- Infos du player lors de la partie -->
            <div id="player" class="col-sm-4 pt-1 nameStyle">
                <div id="levelNumber" class="levelNumber">
                </div>
                <img src="img/bandeau.png" class="img-fluid" alt="">
                <div id="playerId" class="fz-2-5rem cartoon mb2-5r mt-3">{{$player->name}}</div>
                <div id="numPartie" class="fz-1-7rem cartoon lineHeight-1-5">Partie n° : <span class="color-encart">{{$player->nbGames + 1}}</span></div>
                <div class="lineHeight-1-5">
                    <span class="fz-1-7rem cartoon">Score cumulé : </span>&nbsp;
                    <span id="scoreCumul" class="fz-1-7rem cartoon color-encart"></span><br>
                    <span id="mode jeu" class="fz-1-7rem cartoon">Mode de jeu : <span class="color-encart">{{$player->difficulty}}</span></span>

                </div>
            </div>

            <!-- ################ ROW 1 ################ -->
            <div class="row">

                <!-- Affichage du score -->
                <div class="col-sm-5 offset-sm-2 mt-4 ">
                    <img src="img/logo-color.png" class="img-fluid" alt="">
                </div>
                <div id="score" class="col-sm-3 offset-sm-2 mt2-5r score cartoon">
                    <span>SCORE :</span> &nbsp;&nbsp;&nbsp; <span id="scoreAffiche" class="text-danger"></span>
                </div>
            </div>

            <!-- ################ ROW 2 ################ -->
            <!-- NOTIFICATIONS DURANT LE GAME -->
            <div id="notif" class="row notif">
                <div class="col-sm-4 pt-5">
                </div>

                <!-- Message de fin du jeu -->
                <div id="gameFinished" class="gameFinished">
                </div>

                <!-- Message de réussite lors de chaque correspondance -->
                <div class="col-sm-4 offset-sm-4 pt-1">
                    <h3 class="reussiteCorrespondance text-left animated wobble duration-2s mb-5">Bonne réponse ! &#128515;</h3>
                    <h3 class="reussiteCorrespondance2 text-left animated zoomInLeft duration-2s mb-5">Bonne réponse ! &#128515;</h3>
                    <img id="successLevel" src="" class="successLevel ml-5 animated flash delay-3s infinite pulse" alt="">
                </div>


            </div>

                <!-- Affichage du message : Niveau Suivant -->
                <div class="containerLevelJeu">
                    <a href="#"><img id="nextLevel" src="img/suivant.png" width="300" class="jeuLevel ecouteurJeu ml-5 animated infinite jello"></a>
                </div>
        </div>

<!-- ############################################################ -->
<!-- ################ FIN CONTAINER INFORMATIONS ################ -->




<!-- #################### DEBUT CONTAINER DU JEU ################## -->
<!-- ############################################################## -->

        <!-- CONTAINER CIBLE : PARTIE DROP -->
        <div id="containerCible" class="containerCible">
            <div id="cible" class="row cible align-items-center justify-content-around">
            </div>
        </div>

        <!-- CONTAINER ORIGINE : PARTIE DRAG -->
        <div id="containerOrigin" class="containerOrigin">
            <div id="origin" class="row origin align-items-center justify-content-around">
            </div>
        </div>

<!-- ################################################################# -->
<!-- ####################### FIN CONTAINER DU JEU #################### -->



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
                <button type="button" class="btn btn-success btn-link btn-block text-white fz-170">JOUER</button>
            </div>
        </div>
    </div>

    <!-- Zone des réglages (boutons audio, config et didactitiel) -->
    <div id="choixDiff" style="display:none;">{{ $player->difficulty }}</div>
    <div id="scoreCumulInit" style="display:none;">{{ $player->score }}</div>
    <div id="option" class="row option audio">
        <div class="width-button" id="audioTool">
            <a href="https://project-color.fgainza.fr/pindex"><img src="img/config.png" id="config" alt="" width="30px" class="width-button disp-but"></a>
            <a href="https://project-color.fgainza.fr/help" target="_blank"><img src="img/info.png" id="info" alt="" width="30px" class="width-button disp-but"></a>
            <a href="#"><img src="img/audio/bruit-off.png" id="toggleBruit" alt="" width="30px" class="width-button disp-but"></a>
            <a href="#"><img src="img/audio/music-off.png" id="playerMusic" alt="" width="30px" class="width-button disp-but"
                    onclick="javascript:toggleSound()" ;></a>
            <audio id="music">
                <source src="sounds/Twinkle_Twinkle_Little_Star_instrumental.mp3" type="audio/mpeg">
                Votre navigateur ne supporte pas ce format audio.
            </audio>
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
    {{-- <script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })

        $('#gameEnd').click(function(e){
            // console.log($('form'));
            e.preventDefault();
            // console.log('tete');
            // console.log( $(this) );debugger;
            let token = $('meta[name="crsf_token"]');

            $tabTemps = $dureePartieParLevel;
            $tabScores = $scorePartieParLevel;
            $scoreGame = $scoreEtoiles;
            console.log($tabTemps);

            // let tabTemps = $dureePartieParLevel;
            // let tabScores = $scorePartieParLevel;
            // let scoreTotal = $scoreTotal;
            // console.log(tabTemps);

            $.ajax({
                url: "#",
                type: "POST",
                dataType: "json",
                // contentType: "application/json",
                data: {
                    // $tabTemps,
                    $tabScores,
                    $scoreGame,
                },
                success: function(code, statut){
                    console.log($tabTemps);
                                    },
                error: function(resultat, statut, erreur){
                    console.log(erreur);
                }
            });

        });
    });
    </script> --}}
</body>

</html>
