@extends('layouts.parents')

@section('scripts-header')

<style>

    body{
        background-image: url("../img/bg-campagne.png");
        overflow-y: scroll;
    }

/***** Fonts Size *****/
    .fz-95{font-size: .95rem;}
    .fz-100{font-size: 100%;}
    .fz-110{font-size: 110%;}
    .fz-120{font-size: 120%;}
    .fz-130{font-size: 130%;}
    .fz-140{font-size: 140%;}
    .fz-150{font-size: 150%;}
    .fz-160{font-size: 160%;}
    .fz-170{font-size: 170%;}
    h5{font-size: 1.05rem !important;}


/***** PADDING / MARGIN *****/
    .row{
        margin-left: 0 !important;
        margin-right: 0 !important;
    }
    .mr-10p-resp{
        margin-right: 10%;
    }
    .pad-3-up-bot{
        padding-top: 1rem;
        padding-bottom: 1rem;
    }


/***** COLORS *****/
    .espace{background-color: darkolivegreen !important;}
    .bg-card{background-color:#37696dcc !important;}
    .col-orange{color: hsla(35, 92%, 67%, 0.95);}


/***** DISPLAY *****/
    .visibyOff{
        display: none;
    }
    .visibyOn{
        display: block;
    }


/***** LINKS *****/

    .nav-item a{
        color: #1f2e4d;
    }
    .links, a, .text-theme {
        color: hsla(35, 92%, 67%, 0.95);
    }

    ul li a:hover, .links:hover, .btn-link:hover, button a:hover {
        color: hsl(47, 97%, 18%);
        font-weight: 700;
        text-decoration-color: hsl(47, 97%, 18%);
    }
    .link-unsub {
        color: white !important;
        text-decoration: none !important;
    }
        a:hover.link-unsub {
        color: #e7e9e9d1 !important;
    }
    .btn-link{
        color: hsla(35, 92%, 67%, 0.95) !important;
    }


/***** TEXT *****/

    .textEnfant {
        width: intrinsic;           /* Safari/WebKit uses a non-standard name */
        width: -moz-max-content;    /* Firefox/Gecko */
        width: -webkit-max-content; /* Chrome */
        color: #5f0707;
        font-weight: 800;
        margin-top: 2rem;
        border-top: 1px solid #0d0d0dfa;
        border-bottom: 1px solid #0d0d0dfa;
    }
    .txt-card{
        color: #e6e6e6;
        font-size: .95rem;
        line-height: 1.5;
    }


/***** BUTTONS *****/

    .btn-previous{
        padding-top: .2rem !important;
        padding-bottom: .2rem !important;
    }
    .audio{
        width: 100%;
        position: fixed;
        bottom: 2%;
        left: 3%;
        z-index: 0;
    }


/***** LISTES *****/
    #notif ul {
        list-style-type: square ;
        list-style-position: outside ;
        list-style-image: none ;
    }
    .list-pers{list-style: none !important;}


/***** RESPONSIVE *****/

    @media screen and (max-width: 767px){
        .m-resp-titre{
            margin-top: 3vw;
            margin-bottom: 0;
            text-align: center;
        }
        .entete-resp{
            margin-top: 1%;
        }
        .pad-3-up-bot{
            padding-bottom: 1rem !important;
            padding-top: 0 !important;
        }
        table thead th {
            font-size: 90%;
            vertical-align: middle !important;
        }
        table tbody td {
            font-size: 95%;
        }
        .nav-link{
            padding: .3vw .6vw !important;
        }

        .nav{
            flex-wrap: nowrap !important;
            font-size: 95%;
        }
    }

</style>

@endsection

@section('content')
<main class="pad-3-up-bot">
    <div class="container">

        <!-- START ROW 1 - ENTETE (précédent + aide + Titre) -->
        <div class="row w-100 pt-0 mt-0 mb-3">
            <div class="col-md-6 entete-resp">
                <a href="{{ route('pindex') }}" class="btn btn-light btn-sm btn-previous mr-10p-resp text-dark"><i class="fas fa-angle-double-left mr-2"></i>Précédent</a>
                <button id="explication" class="btn btn-light btn-sm mr-0 ml-auto"><i class="fas fa-question text-success mr-2"></i>Besoin d'aide</a></button>
            </div>
            <div class="col-md-6 m-resp-titre">
                <h3 class="mr-0 ml-auto textEnfant mb-0 mt-auto">Historique de jeu de {{ $player->name }}</h3>
            </div>
        </div>
        <!-- START ROW 1 - ENTETE (précédent + aide + Titre) -->


        <!-- START ROW 2 - AIDE -->
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div id="notif" class="visibyOff alert bg-card txt-card fade show my-3 mb-0 fz-95" role="alert">
                    <p class="col-orange fz-140 text-center mb-4">Informations concernant ces tableaux</p>
                    <p class="fz-95 font-weight-bold">La rubrique "détail" comporte 4 types de tableaux différents :</p>
                    <ul class="mx-auto puces">
                        <li class="text-dark">
                            <h5 class="text-dark font-weight-bold">Totalité par partie et Totalité par niveau</h5>
                            <span class="txt-card"><i class="fas fa-caret-right mx-2"></i> Les données de ces 2 tableaux sont les mêmes mais elles sont présentées de manière différente : par partie pour le premier tableau, par niveau pour le second. <br>
                            <i class="fas fa-caret-right mx-2"></i> Vous disposez des données suivantes : les scores (en nombre d'étoiles), les temps (en secondes) , la date de réalisation de la partie ainsi que le niveau de difficulté choisi pour chacun des niveaux et chacune des parties.</span>
                        </li>
                        <br>
                        <li class="text-dark">
                            <h5 class="text-dark font-weight-bold">Regroupement des niveaux par thèmes</h5>
                            <span class="txt-card"><i class="fas fa-caret-right mx-2"></i> Afin de rendre les données plus lisibles, le troisième tableau regroupe les niveaux en 3 thèmes différent, à savoir :
                                <ul class="mx-auto list-pers">
                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Thème "Couleur"</span> (niveaux 1, 2, 3 et 4)</li>
                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Thème "Forme"</span> (niveaux 5, 6, 7 et 8)</li>
                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Thème "Objets"</span> (niveaux 9 et 10)</li>
                                </ul>
                        </li>
                        <br>
                        <li class="text-dark">
                            <h5 class="text-dark font-weight-bold">Seulement les parties</h5>
                            <span class="txt-card"><i class="fas fa-caret-right mx-2"></i> Tableau synthétique, avec 2 valeurs pour chaque partie : le score obtenu et le temps réalisé.<br>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END ROW 2 - AIDE -->


        <!-- LISTE DE CHOIX DES TABLEAUX -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="niveaux-tab" data-toggle="tab" href="#niveaux" role="tab" aria-controls="niveaux" aria-selected="true">Totalité par partie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="group-tab" data-toggle="tab" href="#group" role="tab" aria-controls="group" aria-selected="true">Totalité par niveau</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="theme-tab" data-toggle="tab" href="#theme" role="tab" aria-controls="theme" aria-selected="true">Seulement les thèmes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="parties-tab" data-toggle="tab" href="#parties" role="tab" aria-controls="parties" aria-selected="true">Seulement les parties</a>
            </li>

        </ul>


        <div class="tab-content" id="myTabContent">

            <!-- START Tab Totalité par partie -->
            <div class="tab-pane fade show active" id="niveaux" role="tabpanel" aria-labelledby="niveaux-tab">
                <div class="row bg-white tabNiveaux table-responsive">
                    <table class="table table-bordred table-striped table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>N° de partie</th>
                                <th>Difficulté</th>
                                <th>Date</th>
                                <th>N° de level</th>
                                <th>Score Level</th>
                                <th>Durée Level</th>
                                <th>Score Partie</th>
                                <th>Durée Partie</th>
                            </tr>
                        </thead>
                        <tbody class="text-nowrap">
                            @for($i=0; $i<=count($games)-1; $i++)
                                @isset($games[$i-1])
                                    @if ($games[$i]->numGame !== $games[$i-1]->numGame)
                                        <tr class="espace"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                    @endif
                                @endisset

                                <tr class="text-center">
                                    <td id="numPartie"><span>{{$games[$i]->numGame}}</span></td>
                                    <td id="difficulty"><span>{{$games[$i]->difficulty}}</span></td>
                                    <td id="date"><span>{{ $games[$i]->created_at->format('d/m/Y') }}</span></td>
                                    <td id="level"><span>Level {{$games[$i]->level_id}}</span></td>
                                    <td id="score_level"><span>{{$games[$i]->score_level}}</span></td>
                                    <td id="duree_level"><span>{{$games[$i]->duree_level}}</span></td>
                                    <td id="score_game"><span>{{$games[$i]->score_game}}</span></td>
                                    <td id="duree_game"><span>{{$games[$i]->duree_game}}</span></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Tab Totalité par partie -->


            <!-- START Tab Totalité par niveau -->
            <div class="tab-pane fade" id="group" role="tabpanel" aria-labelledby="group-tab">
                <div id="tabGroup" class="row bg-white tabGroup table-responsive">
                    <table class="table table-bordred table-striped table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>N° de level</th>
                                <th>Difficulté</th>
                                <th>Date</th>
                                <th>N° de partie</th>
                                <th>Score Level</th>
                                <th>Durée Level</th>
                                <th>Score Partie</th>
                                <th>Durée Partie</th>
                            </tr>
                        </thead>
                        <tbody class="text-nowrap">
                            @php
                                $nbParties = count($games)/10;
                            @endphp
                            @for($i=1; $i<=10; $i++)
                                @for($j=0; $j<$nbParties; $j++)
                                    <tr class="text-center">
                                        <td id="level"><span>Level {{$games[$i+$j*10-1]->level_id}}</span></td>
                                        <td id="difficulty"><span>{{$games[$i+$j*10-1]->difficulty}}</span></td>
                                        <td id="date"><span>{{ $games[$i+$j*10-1]->created_at->format('d/m/Y') }}</span></td>
                                        <td id="numPartie"><span>{{$games[$i+$j*10-1]->numGame}}</span></td>
                                        <td id="score_level"><span>{{$games[$i+$j*10-1]->score_level}}</span></td>
                                        <td id="duree_level"><span>{{$games[$i+$j*10-1]->duree_level}}</span></td>
                                        <td id="score_game"><span>{{$games[$i+$j*10-1]->score_game}}</span></td>
                                        <td id="duree_game"><span>{{$games[$i+$j*10-1]->duree_game}}</span></td>
                                    </tr>

                                @endfor
                                <tr class="espace"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Tab Totalité par partie -->


            <!-- START Tab Seulement les Themes -->
            <div class="tab-pane fade" id="theme" role="tabpanel" aria-labelledby="theme-tab">
                <div id="tabTheme" class="row bg-white tabTheme table-responsive">

                    <table class="table table-bordred table-striped table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>Theme</th>
                                <th>Difficulté</th>
                                <th>Date</th>
                                <th>N° de partie</th>
                                <th>Score du thème</th>
                                <th>Durée du thème</th>
                            </tr>
                        </thead>
                        <tbody class="text-nowrap">

                            {{-- On regroupe les niveaux par thèmes --}}
                            @php
                                $themes = ['Couleurs', 'Formes', 'Objets'];
                                $nbParties = count($games)/10;
                                $score = [];
                                $duree = [];

                                for($j=0; $j<$nbParties; $j++){
                                    $s1 = 0;
                                    $d1 = 0;
                                    for ($l=1; $l<=4; $l++){
                                        $s1 += $games[$l+$j*10-1]->score_level;
                                        $d1 += $games[$l+$j*10-1]->duree_level;
                                    }
                                    $score[]=$s1;
                                    $duree[]=$d1;

                                    $s2 = 0;
                                    $d2 = 0;
                                    for ($l=5; $l<=8; $l++){
                                        $s2 += $games[$l+$j*10-1]->score_level;
                                        $d2 += $games[$l+$j*10-1]->duree_level;
                                    }
                                    $score[]=$s2;
                                    $duree[]=$d2;

                                    $s3=0;
                                    $d3=0;
                                    for ($l=9; $l<=10; $l++){
                                        $s3 += $games[$l+$j*10-1]->score_level;
                                        $d3 += $games[$l+$j*10-1]->duree_level;
                                    }
                                    $score[]=$s3;
                                    $duree[]=$d3;
                                }
                            @endphp

                            @for($i=1; $i<=count($themes); $i++)
                                @for($j=0; $j<$nbParties; $j++)
                                    <tr class="text-center">
                                        <td>{{ $themes[$i-1] }}</td>
                                        <td id="difficulty"><span>{{$games[10+$j*10-1]->difficulty}}</span></td>
                                        <td id="date"><span>{{ $games[10+$j*10-1]->created_at->format('d/m/Y') }}</span></td>
                                        <td id="numPartie"><span>{{$games[10+$j*10-1]->numGame}}</span></td>
                                        <td id="score_theme"><span>{{$score[$i+$j*3-1]}}</span></td>
                                        <td id="duree_theme"><span>{{$duree[$i+$j*3-1]}}</span></td>
                                    </tr>
                                @endfor
                                <tr class="espace"><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- START Tab Seulement les Themes -->


            <!-- START Tab Seulement les Parties -->
            <div class="tab-pane fade" id="parties" role="tabpanel" aria-labelledby="parties-tab">
                <div id="tabParties" class="row bg-white tabParties table-responsive">
                    <table class="table table-bordred table-striped table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>N° de partie</th>
                                <th>Difficulté</th>
                                <th>Date</th>
                                <th>Score Partie</th>
                                <th>Durée Partie</th>
                            </tr>
                        </thead>
                        <tbody class="text-nowrap">
                            @php
                                $nbParties = count($games)/10;
                            @endphp
                            @for($i=0; $i<$nbParties; $i++)
                                <tr class="text-center">
                                    <td id="numPartie"><span>{{$i+1}}</span></td>
                                    <td id="difficulty"><span>{{$games[10*($i+1)-1]->difficulty}}</span></td>
                                    <td id="date"><span>{{ $games[10*($i+1)-1]->created_at->format('d/m/Y') }}</span></td>
                                    <td id="score_game"><span>{{$games[10*($i+1)-1]->score_game}}</span></td>
                                    <td id="duree_game"><span>{{$games[10*($i+1)-1]->duree_game}}</span></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Tab Seulement les Parties -->

        </div>
    </div>

</main>
@endsection
@section('scripts-footer')
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
@endsection


