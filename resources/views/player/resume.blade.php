<?php
// graph1 : Données synthétisées par partie
$nbParties = count($games) / 10;
$score = [];
$duree = [];
$label = [];

for ($i = 0; $i < $nbParties; $i++) {
    $label[$i] = $i + 1 . ' ('.$games[10*$i + $i]->created_at->format('d/m/Y').')';
    $score[$i] = $games[10 * ($i + 1) - 1]->score_game;
    $duree[$i] = $games[10 * ($i + 1) - 1]->duree_game;
};
$scoreJson = json_encode($score);
$dureeJson = json_encode($duree, JSON_NUMERIC_CHECK);
$labelJson = json_encode($label);

//graph 2 et 3 : Données synthétisées par thème (tab 2 : le score ; tab 3 la duréee)
$scoreC = 0;
$scoreF = 0;
$scoreO = 0;
$dureeC = 0;
$dureeF = 0;
$dureeO = 0;

$score = [];
$dureeGraph = [];

$couleurs = ['red', 'orange', 'yellow', 'green', 'blue', 'purple', 'grey'];
$nbCouleurs = count($couleurs);

// récupération des données dans la bdd et encodage format JSON
for ($j = 0; $j < $nbParties; $j++) {
    $scorePartie = [];
    $dureePartie = [];
    for ($i = 1; $i <= 4; $i++) {
        $scoreC += $games[$i + $j * 10 - 1]->score_level;
        $dureeC += $games[$i + $j * 10 - 1]->duree_level;
    }
    $scoreCouleurs[] = $scoreC;
    $dureeCouleurs[] = $dureeC;

    for ($i = 5; $i <= 8; $i++) {
        $scoreF += $games[$i + $j * 10 - 1]->score_level;
        $dureeF += $games[$i + $j * 10 - 1]->duree_level;
    }
    $scoreFormes[] = $scoreF;
    $dureeFormes[] = $dureeF;

    for ($i = 9; $i <= 10; $i++) {
        $scoreO += $games[$i + $j * 10 - 1]->score_level;
        $dureeO += $games[$i + $j * 10 - 1]->duree_level;
    }
    $scoreObjets[] = $scoreO;
    $dureeObjets[] = $dureeO;

    $scorePartie[$j] = [$scoreC, $scoreF, $scoreO];
    $scorePartieJson[$j] = json_encode($scorePartie[$j]);
    $score[] = $scorePartieJson[$j];
    $scorePartie = [];

    $dureePartie[$j] = [round($dureeC), round($dureeF), round($dureeO)];
    $dureePartieJson[$j] = json_encode($dureePartie[$j]);
    $dureeGraph[] = $dureePartieJson[$j];
    $dureePartie = [];

    $scoreC = 0;
    $scoreF = 0;
    $scoreO = 0;
    $dureeC = 0;
    $dureeF = 0;
    $dureeO = 0;
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CDN font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <!-- Google font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <link rel="stylesheet" href="css/parents.css">
    <link rel="stylesheet" href="css/hamburger.css">
    <style>
        body {
            margin: 0 !important;
            padding-top: 0 !important;
            min-height: 100vh;
            background-attachment: fixed;
            background-repeat: repeat-x;
            background-color: #c2d835;
            background-position: top;
            font-family: 'Open Sans', sans-serif;
            background-image: url("../img/bg-campagne.png");
            overflow-y: scroll;
        }

/***** Fonts Size *****/
        .fz-80p {font-size: 80%;}
        .fz-95{font-size: .95rem;}
        .fz-110{font-size: 110%;}
        .fz-140{font-size: 140%;}
        .fz-110p { font-size: 110% !important;}


/***** Line-height *****/
        .line3 {line-height: 3rem;}
        .line-1-5 {line-height: 1.5rem !important;}


/***** Margin *****/
        .m5p{
            margin-left: 5% !important;
            margin-right: 5% !important;
        }

/***** DISPLAY *****/
        .visibyOff{display: none;}
        .visibyOn{display: block;}


/***** Colors *****/
        .bg-card{background-color:#37696dcc !important;}
        .txt-card{color: #e6e6e6;}
        .text-darkos{color: #07162e;}
        .espace {
            background-color: darkolivegreen !important;
        }


/***** BUTTONS *****/
        .btn {
            border: none;
            outline: none;
            padding: 10px 16px;
            cursor: pointer;
        }
        .icon {
            margin-right: 0.3rem;
            color: hsl(355, 2%, 91%);
        }


/***** LISTES *****/
        .list-pers{list-style: none !important;}
        #notif ul {
            list-style-type: square ;
            list-style-position: outside ;
            list-style-image: none ;
        }


/***** Links *****/
        .nav-item a {color: #1f2e4d;}
        ul li a {color: white;}
        ul li a:hover {color: hsl(35, 100%, 55%);}
        ul li a:active {color: red !important;}
        .links, a, .text-theme {color: hsla(35, 92%, 67%, 0.95);}
        .col-orange{color: hsla(35, 92%, 67%, 0.95);}
        a:hover.link-unsub {color: #e7e9e9d1 !important;}
        .btn-link{color: hsla(35, 92%, 67%, 0.95) !important;}

        .active,
        .btn:hover .btn:focus {
            background-color: #4f4f4f;
            color: hsl(35, 100%, 55%) !important;
        }

        .link-unsub {
            color: white !important;
            text-decoration: none !important;
        }

        ul.graph-resp li a:hover, .links:hover, .btn-link:hover, button a:hover {
            color: hsl(47, 97%, 18%);
            font-weight: 500;
            text-decoration-color: hsl(47, 97%, 18%);
        }


/***** TITRES ET TEXTE *****/
        .borderTitre {
            border-bottom: 2px solid #e2e3e4;
        }
        .bgTitreRed {
            color: hsla(355, 78%, 56%, 0.85);
        }
        .textEnfant {
            color: #5f0707;
            font-weight: 800;
            border-top: 1px solid #0d0d0dfa;
            border-bottom: 1px solid #0d0d0dfa;
        }
        .chiffresCles {
            font-size: 120%;
            color: #f8ea91;
        }
        .chiffrePartieNum{
            color: #f8ea91;
        }

/*
==========================================
#               RESPONSIVE               #
==========================================
*/
        @media screen and (min-width: 992px) and (max-width: 1199px){
            .pr-stats{
                padding-right: 0 !important;
            }
        }

        @media screen and (max-width: 991px){
            .resp-stats-chiffres{

                margin: 2% auto !important;
            }
            .resp-stats-chiffres ul{
                margin-left: auto;
                margin-right: auto;
                width: fit-content;
            }
            .resp-stats-chiffres ul li{
                margin-bottom: 1.4vw !important;
            }
            .resp-stats-titre{
                text-align: center;
            }
            .bord-titre-resp{
                border-top: 1px solid #e2e3e4;
                margin-top: 5%;
                padding-top: 2%;
                padding-bottom: 2%;
            }
            .graph-resp li{
                display: inline;
                padding: 1%;
            }
            .mb-graph-resp{
                margin-bottom: 2% !important;
            }
        }

        @media screen and (max-width: 575px){
            .container{
                width: 95% !important;
                margin-left: 2vw !important;
                margin-right: 2vw !important;
            }
            h2{
                width: 90%;
            }
            .visibility1{
                width: 100%;
                height: 150%;;
            }
        }

    </style>

    <title>Color-Drop - Statistiques du joueur</title>

</head>

<body>
    <nav class="navbar navbar-expand-md bg-opacite">
        <div class="container">

            <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
            </button>
            <a href="{{ route('pindex') }}" class="mr-10p taille-hamb"><img src="../../../img/logo-color2.png" alt="Logo Color-Drop" class="img-fluid"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-link mr-5">
                        <a href="{{ route('pindex') }}">Accueil</a>
                    </li>
                    <li class="nav-link mr-5">
                        <a href="{{ route('help') }}">Aide</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="action-button shadow animate blue" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="action-button shadow animate green" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown mr-1">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-3">
        <div class="container">


            <!-- START ROW 1 - ENTETE (précédent + aide) -->
            <div class="row mb-3 mt-1">
                <a class="btn btn-sm btn-dark fz-80p" href="{{ route('pindex') }}"><i class="fas fa-angle-double-left mr-2"></i>Précédent</a>
                <button id="explication" class="btn btn-light btn-sm fz-80p mr-0 ml-auto"><i class="fas fa-question text-success mr-2"></i>Besoin d'aide</a></button>
            </div>
            <!-- END ROW 1 - ENTETE (précédent + aide) -->


            <!-- START ROW 2 - AIDE -->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div id="notif" class="visibyOff alert bg-card txt-card fade show my-2 mb-0 fz-95" role="alert">
                        <p class="col-orange fz-140 text-center mb-4">Données synthétiques&nbsp;: statistiques et graphiques</p>
                        <p class="font-weight-bold fz-115p text-darkos">La rubrique "résumé" est constituée de deux éléments&nbsp;:</p>
                        <ul class="text-intro mx-3 fz-95r">
                            <li class="pl-2">
                                Des statistiques qui résument en quelques chiffres-clés l'activité de votre enfant sur Color-Drop<br>
                            </li>
                            <br>
                            <li class="pl-2">
                                Des graphiques qui permettent de visualiser plus facilement les données des tableaux de la rubrique "détail". <br>
                            </li>
                        </ul>
                        <span class="pl-2 fz-95r text-darkos">
                            <b>Remarque&nbsp;:</b>
                        </span>
                        <p class="ml-4 pl-4">Vous pouvez modifier ces graphiques en excluant certaines données. Il vous suffit pour cela de cliquer sur le (ou les) jeu(x) de données à exclure dans la partie située sous le graphique.</p>
                        <span class="pl-4">
                            <i>Exemple&nbsp;:</i>
                        </span>
                        <p  class="ml-4 pl-4">Votre enfant a réalisé 5 parties, mais vous ne voulez que seules les 3 dernières parties soient représentées graphiquement. Il vous suffit alors de cliquer sur "Partie 1" et sur "Partie 2" pour qu'elles n'apparaissent pas sur le graphique.</p>
                    </div>
                </div>
            </div>
            <!-- END ROW 2 - AIDE -->


            <!-- START ROW 3 - TITRE -->
            <div class="row bg-dark text-white pt-2 borderTitre">
                <h2 class="light mx-auto my-3">Résumé de l'activité de {{ $player->name }}</h2>
            </div>
            <!-- END ROW 3 - TITRE -->


            <!-- START ROW 4 - DONNEES CHIFFREES + GRAPHIQUES -->
            <div class="row bg-dark text-white">
                <div class="col-lg-4 mt-3 pb-3 pr-stats">
                    <h3 class="bgTitreRed resp-stats-titre">Chiffres clés</h3>
                    <div class="resp-stats-chiffres">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-angle-right icon"></i>Nombre de parties jouées&nbsp; :&nbsp; &nbsp; <span class="chiffresCles">{{ $player->nbGames }}</span></li>
                            <li class="line-1-5 mb-2"><i class="fas fa-angle-right icon"></i>Score total&nbsp;:&nbsp; &nbsp; <span class="chiffresCles">{{ $player->score }} étoiles</span></li>

                            {{-------- CALCUL REPARTITION DU NIVEAU DE DIFFICULTE --------}}
                            <li class="mb-0"><i class="fas fa-angle-right icon"></i>Répartition niveau de difficulté&nbsp;:&nbsp; &nbsp;<br>
                            @php
                                $nbParties = count($games)/10;
                                $facile=0;
                                $moyen=0;
                                $difficile=0;

                                for($i=0; $i<$nbParties; $i++){
                                    $x=$games[10*($i+1)-1]->difficulty;
                                    if ($x == 'facile'){
                                        $facile++;
                                    }
                                    elseif ($x =='moyen'){
                                    $moyen++;
                                    }
                                    elseif ($x =='difficile'){
                                        $difficile++;
                                    }
                                }
                                if ($nbParties != 0){
                                    $partFacile = round($facile/$nbParties * 100);
                                    $partMoyen = round($moyen/$nbParties * 100);
                                    $partDifficile = round($difficile/$nbParties * 100);

                            @endphp
                            <span class="ml-4">- Niveau facile&nbsp;: </span><span class="chiffresCles">{{$partFacile}}%</span><br>
                            <span class="ml-4">- Niveau moyen&nbsp;: </span><span class="chiffresCles">{{$partMoyen}}%</span><br>
                            <span class="ml-4">- Niveau difficile&nbsp;: </span><span class="chiffresCles">{{$partDifficile}}%</span><br>
                            @php
                                    }else{
                            @endphp
                            <span class="ml-4 chiffresCles"> Pas de partie enregistrée</span><br>
                            @php
                                    }
                            @endphp
                            </li>


                            {{-------- CALCUL SCORE MOYEN --------}}
                            <li class="my-2"><i class="fas fa-angle-right icon"></i>Score moyen&nbsp;:&nbsp; &nbsp;
                                @if ($player->nbGames !== 0)
                                <span class="chiffresCles">{{ round($player->score / $player->nbGames, 2) }} étoiles</span>
                                @else
                                <span class="chiffresCles">--</span>
                                @endif
                            </li>

                            {{-------- CALCUL MEILLEUR TEMPS --------}}
                            <li class="my-2"><i class="fas fa-angle-right icon"></i>Meilleur temps:&nbsp;:&nbsp;
                                <span class="chiffresCles">
                                    @if ($player->nbGames !== 0)
                                        {{floor($dureeMin / 60)}}m et {{($dureeMin % 60)}}s
                                    @else
                                        --
                                    @endif
                                </span>
                                    @if ($player->nbGames !== 0)
                                        <span class="ml-1 chiffrePartieNum">(partie&nbsp;{{$partieMin[0]['numGame']}})</span>
                                    @endif
                            </li>

                            {{-------- CALCUL DUREE TOTALE DE JEU --------}}
                            <li class="mb-2"><i class="fas fa-angle-right icon"></i>Durée totale de jeu&nbsp;:&nbsp;&nbsp;
                                <?php $dureeTotale = 0;
                                    foreach ($durees as $duree) {
                                        $dureeTotale += $duree->duree_game;
                                    }
                                    $dureeTotale = intval($dureeTotale);
                                    if ($dureeTotale < 60) {
                                        echo '<span class="chiffresCles">' . $dureeTotale . 's</span>';
                                    }
                                    if ($dureeTotale >= 60 && $dureeTotale < 3600) {
                                        echo '<span class="chiffresCles">' . floor($dureeTotale / 60) . 'm et ' . ($dureeTotale % 60) . 's</span>';
                                    }
                                    if ($dureeTotale >= 3600) {
                                        $r = $dureeTotale % 3600;
                                        echo '<span class="chiffresCles">' . floor($dureeTotale / 3600) . 'h  ' . (floor($r / 60)) . 'm et ' . ($r % 60) . 's</span>';
                                    }
                                ?>
                            </li>

                            {{-------- CALCUL DUREE MOYENNE DE JEU --------}}
                            <li class="mb-2"><i class="fas fa-angle-right icon"></i>Durée Moyenne de jeu&nbsp;:&nbsp;&nbsp;
                                <?php
                                if ($player->nbGames !== 0) {
                                    $x = round($dureeTotale / $player->nbGames);

                                    if ($x >= 1 && $x <= 60) {
                                        echo '<span class="chiffresCles">' . $x . 's</span>';
                                    }
                                    if ($x > 60) {
                                        echo '<span class="chiffresCles">' . round(($x / 60)) . 'm et ' . round(($x % 60)) . 's</span>';
                                    }
                                } else {
                                    echo '--';
                                }
                                ?>
                            </li>

                        </ul>
                    </div>


                    <h3 class="bgTitreRed resp-stats-titre bord-titre-resp">Représentation graphique</h3>
                    @php
                    $id = $player->id
                    @endphp

                    <ul id="links" class="list-unstyled graph-resp">
                        <li><a id="chart1" href="presume?id=<?= $id; ?>&chart=1" class="btn text-white" role="button" aria-pressed="true">Données synthétiques par partie</a></li>
                        <li><a id="chart2" href="presume?id=<?= $id; ?>&chart=2" class="btn text-white" role="button" aria-pressed="true">Evolution du score par thème</a></li>
                        <li><a id="chart3" href="presume?id=<?= $id; ?>&chart=3" class="btn text-white" role="button" aria-pressed="true">Evolution du temps par thème</a></li>
                    </ul>
                </div>

                <div class="col-lg-8 my-auto mb-graph-resp chart-container">
                    <canvas id="myChart" width="900" height="600" style ="width :80% ; height : auto ;"></canvas>
                </div>
            </div>
        </div>

    </main>


    <!-- CookieBar -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/cookie-bar/cookiebar-latest.min.js?theme=altblack&always=1"></script>
    <!-- CDN jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- CDN jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <!-- CDN jQuery popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js" integrity="sha256-fTuUgtT7O2rqoImwjrhDgbXTKUwyxxujIMRIK7TbuNU=" crossorigin="anonymous"></script>
    <!-- CDN Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- JS IonSounds  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <!-- JS uTIL.JS  -->
    <script src="js/utils.js"></script>

    <!-- SCRIPT JS - GESTION AFFICHAGE AIDE -->
    <script>
        $(document).ready(function(){
            $('#explication').click(function(){
                if($("#notif").hasClass("visibyOff")){
                    $("#notif").removeClass("visibyOff");
                    $("#notif").addClass("visibyOn");
                    $("#explication").html('<i class="fas fa-times text-danger mr-2"></i>Masquer l\'explication');
                } else if ($("#notif").hasClass("visibyOn")){
                    $("#notif").removeClass("visibyOn");
                    $("#notif").addClass("visibyOff");
                    $("#explication").html('<i class="fas fa-question text-success mr-2"></i>Besoin d\'aide');
                }
            })
        });
    </script>


    <!-- SCRIPT CHARTS.JS - GRAPHIQUES -->
    <script>

        var color = Chart.helpers.color;


        // DONNEES DU GRAPHIQUE 1
        var synthParPartie = {
            labels: <?php echo $labelJson; ?>,
            datasets: [{
                label: "Score (en nombre d'étoiles)",
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                yAxisID: 'y-axis-1',
                data: <?php echo $scoreJson; ?>
            }, {
                label: "Durée (en secondes)",
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                yAxisID: 'y-axis-2',
                data: <?php echo $dureeJson; ?>
            }]
        };


        // DONNEES DU GRAPHIQUE 2
        var donneesThemesDuree = {
            labels: ['couleur (niv 1 à 4)', 'forme (niv 5 à 8)', 'objet (niv 9 et 10)'],

            datasets: [{
                <?php for ($j = 0; $j < $nbParties; $j++) : ?>
                    label: "Partie <?= $j + 1  . ' ('.$games[10*$j + $j]->created_at->format('d/m/Y').')'; ?>",
                    <?php $coul = $couleurs[$j % $nbCouleurs]; ?>
                    backgroundColor: color(window.chartColors.<?= $coul; ?>).alpha(0.5).rgbString(),
                    borderColor: window.chartColors.<?= $coul; ?>,
                    borderWidth: 1,
                    data: <?= $dureeGraph[$j]; ?>
                    <?php if ($j == $nbParties - 1) : ?>
            }]
            <?php else : ?>
            },
            {
            <?php endif; ?>

            <?php endfor; ?>
            };


        // DONNEES DU GRAPHIQUE 3
        var donneesThemesScore = {
            labels: ['couleur (niv 1 à 4)', 'forme (niv 5 à 8)', 'objet (niv 9 et 10)'],

            datasets: [{
                <?php for ($j = 0; $j < $nbParties; $j++) : ?>
                label: "Partie <?= $j + 1  . ' ('.$games[10*$j + $j]->created_at->format('d/m/Y').')'; ?>",
                    <?php $coul = $couleurs[$j % $nbCouleurs]; ?>
                    backgroundColor: color(window.chartColors.<?= $coul; ?>).alpha(0.5).rgbString(),
                    borderColor: window.chartColors.<?= $coul; ?>,
                    borderWidth: 1,
                    data: <?= $score[$j]; ?>
                    <?php if ($j == $nbParties - 1) : ?>
            }]
            <?php else : ?>
            },
            {
            <?php endif; ?>

            <?php endfor; ?>
            };


        // CREATION GRAPHIQUE 1
        window.onload = function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            // CREATION GRAPHIQUE 1
            <?php if (isset($_GET['chart']) && $_GET['chart'] == 1) : ?>

                $(document).ready(function() {
                    $('.btn').removeClass('active');
                    $('#chart1').addClass('active');
                });
                window.myBar = new Chart(ctx, {
                    type: 'line',
                    data: synthParPartie,
                    options: {
                        responsive: true,
                        legend: {
                            position: 'bottom',
                            labels: {
                                fontColor: '#edededf7',
                                padding: 15,
                            }
                        },
                        title: {
                            display: true,
                            fontColor: '#fda77c',
                            fontSize: '18',
                            fontStyle: false,
                            text: 'Données synthétiques par partie',
                            padding: 30,
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    fontColor: '#edededf7',
                                    labelString: 'Numéro de la partie'
                                },
                                ticks: {
                                    fontColor: '#edededf7'
                                }
                            }],
                            yAxes: [{
                                type: 'linear',
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    fontColor: '#edededf7',
                                    labelString: 'Score'
                                },
                                position: 'left',
                                id: 'y-axis-1',
                                ticks: {
                                    min: 0,
                                    max: 30,
                                    stepSize: 5,
                                    fontColor: '#edededf7'
                                }
                            }, {
                                type: 'linear',
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    fontColor: '#edededf7',
                                    labelString: 'Durée'
                                },
                                position: 'right',
                                id: 'y-axis-2',
                                ticks: {
                                    min: 0,
                                    fontColor: '#edededf7'
                                }
                            }],
                        }
                    }
                });
            <?php endif; ?>
            // CREATION GRAPHIQUE 2
            <?php if (isset($_GET['chart']) && $_GET['chart'] == 2) : ?>
                $(document).ready(function() {
                    $('.btn').removeClass('active');
                    $('#chart2').addClass('active');
                });
                window.myBar = new Chart(ctx, {
                    type: 'bar',
                    data: donneesThemesScore,
                    options: {
                        responsive: true,
                        legend: {
                            position: 'bottom',
                            labels: {
                                fontColor: '#edededf7',
                                padding: 15,
                            }
                        },
                        title: {
                            display: true,
                            fontColor: '#fda77c',
                            fontSize: '18',
                            fontStyle: false,
                            text: 'Analyse du score par thème',
                            padding: 30,
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    fontColor: '#edededf7',
                                    labelString: 'Thèmes'
                                },
                                ticks: {
                                    fontColor: '#edededf7'
                                }
                            }],
                            yAxes: [{
                                type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    fontColor: '#edededf7',
                                    labelString: 'Score'
                                },
                                position: 'left',
                                ticks: {
                                    min: 0,
                                    max: 12,
                                    stepSize: 1,
                                    fontColor: '#edededf7'
                                }

                            }],
                        }
                    }
                });
            <?php endif; ?>
            // CREATION GRAPHIQUE 3
            <?php if (isset($_GET['chart']) && $_GET['chart'] == 3) : ?>
                $(document).ready(function() {
                    $('.btn').removeClass('active');
                    $('#chart3').addClass('active');
                });
                window.myBar = new Chart(ctx, {
                    type: 'bar',
                    data: donneesThemesDuree,
                    options: {
                        responsive: true,
                        legend: {
                            position: 'bottom',
                            labels: {
                                fontColor: '#edededf7',
                                padding: 15,
                            }
                        },
                        title: {
                            display: true,
                            fontColor: '#fda77c',
                            fontSize: '18',
                            fontStyle: false,
                            text: 'Analyse du temps par thème',
                            padding: 30,
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    fontColor: '#edededf7',
                                    labelString: 'Thèmes'
                                },
                                ticks: {
                                    fontColor: '#edededf7'
                                }
                            }],
                            yAxes: [{
                                type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    fontColor: '#edededf7',
                                    labelString: 'Durée'
                                },
                                position: 'left',

                            }],
                        }
                    }
                });
            <?php endif; ?>

        };
    </script>


</body>

</html>
