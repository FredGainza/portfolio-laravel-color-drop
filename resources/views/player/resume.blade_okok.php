<?php



    // graph1 : Données synthétisées par partie
    $nbParties = count($games)/10;
    $scoreCouleurs = [];
    $scoreFormes = [];
    $scoreObjets = [];

    $dureeCouleurs = [];
    $dureeFormes = [];
    $dureeObjets = [];

    $dureeLevel = [];
    $scoreTotal = [];
    $dureeTotal = [];
    $scoreJson = [];

    $scoreC = 0;
    $scoreF = 0;
    $scoreO = 0;
    $dureeC = 0;
    $dureeF = 0;
    $dureeO = 0;


    $score = [];
    $duree = [];

    $couleurs = ['red', 'orange', 'yellow', 'green', 'blue', 'purple', 'grey'];
    $nbCouleurs = count($couleurs);

    for($j=0; $j<$nbParties; $j++){
        $scorePartie = [];
        $dureePartie = [];
        for($i=1; $i<=4; $i++){
            $scoreC += $games[$i+$j*10-1]->score_level;
            $dureeC += $games[$i+$j*10-1]->duree_level;
        }
        $scoreCouleurs[] = $scoreC;
        $dureeCouleurs[] = $dureeC;

        for($i=5; $i<=8; $i++){
            $scoreF += $games[$i+$j*10-1]->score_level;
            $dureeF += $games[$i+$j*10-1]->duree_level;
        }
        $scoreFormes[] = $scoreF;
        $dureeFormes[] = $dureeF;

        for($i=9; $i<=10; $i++){
            $scoreO += $games[$i+$j*10-1]->score_level;
            $dureeO += $games[$i+$j*10-1]->duree_level;
        }
        $scoreObjets[] = $scoreO;
        $dureeObjets[] = $dureeO;

        $scorePartie[$j] = [$scoreC, $scoreF, $scoreO];
        $score[] = $scorePartie[$j];
        $scorePartie = [];

        $dureePartie[$j] = [$dureeC, $dureeF, $dureeO];
        $duree[] = $dureePartie[$j];
        $dureePartie = [];

        $scoreC = 0;
        $scoreF = 0;
        $scoreO = 0;
        $dureeC = 0;
        $dureeF = 0;
        $dureeO = 0;
    }
    // dd($score[0][1]);



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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <link rel="stylesheet" href="css/parents.css">
    <style>
            body{
        background-image: url("../img/bg-campagne.png");
    }
        .textEnfant {
            color: #5f0707;
            font-weight: 800;
            /* margin-left:40%;
            margin-right:40%; */
            border-top: 1px solid #0d0d0dfa;
            border-bottom: 1px solid #0d0d0dfa;
        }
        .espace{
            background-color: darkolivegreen !important;
        }
        .nav-item a{
            color: #1f2e4d;
        }
        .borderTitre{
            border-bottom: 2px solid #e2e3e4;
        }
        .bgTitreRed{
            color: hsla(355, 78%, 56%, 0.85);
        }

        .icon{
            margin-right: 0.3rem;
            color: hsl(355, 2%, 91%);
        }
        .line3{
            line-height: 3rem;
        }
        .line-1-5{
            line-height: 1.5rem !important;
        }
        ul li a{
            color: white;
        }
        ul li a:hover{
            color: hsl(35, 100%, 55%);
        }
        .fz-80p{
            font-size: 80%;
        }
        .chiffresCles{
            font-size: 120%;
            color: #f8ea91;
            /* font-weight: bold; */
        }
        </style>


    <title>Statistiques</title>
</head>

<body>

    <nav class="navbar navbar-expand-md bg-opacite">

        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img src="../../../img/logo-color.png" width="30%" alt="" class="mr-10p">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                <li class="fz-150"><a href="{{ route('pindex') }}">Administration Parents</a></li>
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
                        <li class="nav-item dropdown">
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
            <div class="row my-3">
                <a class="btn btn-small btn-dark fz-80p" href="{{ route('pindex') }}"><i class="fas fa-angle-double-left mr-2"></i>Précédent</a>
            </div>
            <div class="row bg-dark text-white pt-2 borderTitre">
                <h2 class="light mx-auto my-3">Résumé de l'ativité de {{ $player->name }}</h2>
            </div>

            <div class="row bg-dark text-white">
                <div class="col-sm-4 mt-3 pb-3">
                    <h3 class="bgTitreRed">Chiffres clés</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-angle-right icon"></i>Nombre de parties jouées&nbsp; :&nbsp; &nbsp; <span class="chiffresCles">{{ $player->nbGames }}</span></li>
                        <li class="line-1-5 mb-2"><i class="fas fa-angle-right icon"></i>Score total&nbsp;:&nbsp; &nbsp;  <span class="chiffresCles">{{ $player->score }}</span></li>

                        <li class="mb-0"><i class="fas fa-angle-right icon"></i>Répartition niveau de difficulté&nbsp;:&nbsp; &nbsp;</li>
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
                        $partFacile = round($facile/$nbParties * 100);
                        $partMoyen = round($moyen/$nbParties * 100);
                        $partDifficile = round($difficile/$nbParties * 100);
                        @endphp
                            <span class="ml-4">- Niveau facile : </span><span class="chiffresCles">{{$partFacile}}%</span><br>
                            <span class="ml-4">- Niveau moyen : </span><span class="chiffresCles">{{$partMoyen}}%</span><br>
                            <span class="ml-4">- Niveau difficile : </span><span class="chiffresCles">{{$partDifficile}}%</span><br>


                        <li class="my-2"><i class="fas fa-angle-right icon"></i>Score moyen&nbsp;:&nbsp; &nbsp;
                            @if ($player->nbGames !== 0)
                                <span class="chiffresCles">{{ round($player->score / $player->nbGames, 2) }}</span>
                            @else
                                <span class="chiffresCles">--</span>
                            @endif

                        </li>
                        <li class="mb-2"><i class="fas fa-angle-right icon"></i>Durée totale de jeu&nbsp;:&nbsp;&nbsp;
                            <?php $dureeTotale=0;
                                foreach ($durees as $duree){
                                    $dureeTotale += $duree->duree_game;
                                }
                                $dureeTotale = intval($dureeTotale);
                                if ($dureeTotale <60){
                                    echo '<span class="chiffresCles">'.$dureeTotale.'s</span>';
                                }
                                if ($dureeTotale >= 60 && $dureeTotale<3600){
                                    echo '<span class="chiffresCles">'.floor($dureeTotale/60).'m et '.($dureeTotale%60). 's</span>';
                                }
                                if ($dureeTotale >= 3600){
                                    $r = $dureeTotale%3600;
                                    echo '<span class="chiffresCles">'.floor($dureeTotale/3600).'h  '.(floor($r/60)). 'm et '.($r%60). 's</span>';
                                }
                            ?>
                        </li>
                        <li class="mb-2"><i class="fas fa-angle-right icon"></i>Durée Moyenne de jeu&nbsp;:&nbsp;&nbsp;
                            <?php
                                if ($player->nbGames !== 0){
                                    $x = round($dureeTotale / $player->nbGames);

                                    if ($x >= 1 && $x <= 60){
                                        echo '<span class="chiffresCles">'.$x. 's</span>';
                                    }
                                    if ($x>60){
                                        echo '<span class="chiffresCles">'.($x/60).'m et '.($x%60).' s</span>';
                                    }
                                }
                            ?>
                        </li>
                    {{-- <li>Durée totale de jeu : {{ }}</li> --}}
                    </ul>

                    <h3 class="bgTitreRed">Représentation graphique</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Données synthétisées par partie</a></li>
                        <li><a href="#">Ensemble des données par niveaux</a></li>
                        <li><a href="#">Données synthétisées par thème</a></li>
                    </ul>
                </div>

                <div class="col-sm-8 my-auto">
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </main>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    {{-- <!-- JS jQueryRotate  -->
    <script src="js/jQueryRotate.js"></script>
    <!-- JS Personnel  -->--}}
    <script src="js/utils.js"></script>
    <script>
        var color = Chart.helpers.color;
        var donneesParNiveaux = {
            labels:  ['couleurs', 'formes', 'objets'],

            datasets:[{
                <?php for($j=0; $j<$nbParties; $j++) : ?>
                label: "Partie <?= $j+1; ?>",
                <?php $coul = $couleurs[$j%$nbCouleurs]; ?>
                backgroundColor: color(window.chartColors.<?= $coul; ?>).alpha(0.5).rgbString(),
                borderColor: window.chartColors.<?= $coul; ?>,
                borderWidth: 1,
                data:   <?= [$score[$j][0], $score[$j][1], $score[$j][2]]; ?>
                <?php if ($j == $nbParties-1) : ?>
            }]
                <?php else : ?>
            }, {
                <?php endif; ?>

                <?php endfor; ?>
            };
        window.onload = function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: donneesParNiveaux,
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
                        text: 'Ensemble des niveaux par partie',
                        padding: 30,
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                fontColor: '#edededf7',
                                labelString: 'Numéro du niveau'
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
                            id: 'y-axis-1',
                            ticks: {
                                min: 0,
                                max: 30,
                                stepSize: 5,
                                fontColor: '#edededf7'
                            }
                        }, {
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
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

        };
    </script>

</body>
</html>








