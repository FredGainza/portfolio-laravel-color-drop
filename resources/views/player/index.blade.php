@extends('layouts.parents')
@section('title', 'Gestion des joueurs')
@section('scripts-header')
<style>
    /*
    ==========================================
    #               GENERAL                  #
    ==========================================
    */

    body tbody {
        line-height: 2rem;
    }


    /*----------  FONTS ----------*/
    .text-intro{font-size: 110%;}
    .fz-95{font-size: .95rem;}
    .fz-140{font-size: 140%;}
    h5{font-size: 1.05rem !important;}
    .fz-110r{font-size: 1.1rem;}


    /*----------  COLORS ----------*/
    .espace{background-color: darkolivegreen !important;}
    .bg-card{background-color:#37696dcc !important;}
    .col-orange{color: hsla(35, 92%, 67%, 0.95);}
    .-ange{color: hsla(35, 92%, 67%, 0.95);}
    .text-darkos{color: #07162e;}
    .text-theme {color: hsla(35, 92%, 67%, 0.95);}
    .text-bdx{color: #7c1818;}


    /*----------  DISPLAY ----------*/
    .visibyOff{display: none;}
    .visibyOn{display: block;}


    /*----------  PADDING ----------*/
    .pl-10px{padding-left: 1.5rem !important;}
    .alert-dismissible{
        padding-left: 1.5rem !important;
    }
    .pad-1{padding-left: .7rem !important;}
    .pad-perso {
        padding-bottom: 0 !important;
        padding-top: .5rem !important;
    }


    /*----------  MARGIN ----------*/
    .ml-49p {
        margin-left: 49%
    }
    .mr-5rem{margin-right: 5rem;}
    .label{
        margin-top: .3rem !important;
        margin-bottom: .3rem !important;
    }


    /*----------  TEXT ----------*/
    .va-top{vertical-align: top !important;}
    .line-h-1-5{line-height: 1.5 !important;}
    .line-h-2{line-height: 2 !important;}
    .line-h-2-5{line-height: 2.5 !important;}
    .line-h-5{line-height: 5 !important;}
    .line-h-1-2{line-height: 1.2 !important;}
    .line-h-0-5{line-height: 0.3 !important;}
    .line-h-1{line-height: 1 !important;}
    .text-ind{
        text-indent: 1.5em;
        margin-top: 0;
    }
    .txt-card{
        color: #e6e6e6;
        font-size: .95rem;
        line-height: 1.5;
    }
    .centre-txt{
        text-align: center !important;
    }
    .small-edit{
        margin-top: 0.5rem !important;
        margin-left :auto;
        margin-right: auto;
        line-height: 1rem;
        color: #212529;
        width: 75%;
    }


    /*----------  LINKS ----------*/
    .resp-min{display: none;}
    a{
        color: black;
        text-decoration: none;
        font-weight: bold;
        text-decoration-style: none;
    }
    a:hover {
        color: #45aa3c;
        text-decoration: none;
    }


    /*----------  COLORS ----------*/
    .bg-perso{
        color: hsl(35, 100%, 55%);
    }


    /*----------  BUTTONS ----------*/
    #button {
        color: slategray;
        background-color: #ccc;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 3px;
        display: inline-block;
        border: 1px solid #aaa;
        border-bottom: 2px solid #aaa;
    }
    .style-btn-jouer{
        background-color: #158452;
        border: .2rem solid #0c5031;
        width: 90%;
        text-align: center;
        font-size: 200%;
        font-weight: bold;
        padding: 0.5em 1rem;
        margin: auto;
    }
    .style-btn-jouer:hover{
        background-color: #158452bf;
        border: .2rem solid hsla(1, 85%, 65%, 0.76);
    }
    .material-icons{
        margin-top: auto !important;
        margin-bottom: auto !important;
    }
    .explication{
        margin-right: 15%;
    }


    /*----------  LISTS ----------*/
    .alert-success ul {
        list-style-type: square !important;
        list-style-position: outside !important;
        list-style-image: none !important;
    }
    #notif ul {
        list-style-type: square ;
        list-style-position: outside ;
        list-style-image: none ;
    }
    .list-pers{list-style: none !important;}


    /*----------  COOKIE BARS ----------*/
    .cookie-banner{
        background-color:  #333;

        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
    }
    .cookie-banner .container{
        margin: 0 auto;
        width: 70%;
        color: #f0f0f0;
        padding: 15px;
    }



    /*
    ==========================================
    #                 TABLE                  #
    ==========================================
    */

    /*----------  TABLE ----------*/
    .mTab{
        margin-left: 1.5rem !important;
        margin-right: 1.5rem !important;
    }
    .table-wrapper {
        background: #fff;
        padding: 1.3rem 1.7rem;
        margin: 1rem 3rem;
        border: 5px solid hsl(215, 50%, 23%);
        border-radius: 3px;
        -webkit-box-shadow: 9px 10px 22px -6px rgba(0,0,0,0.75);
        -moz-box-shadow: 9px 10px 22px -6px rgba(0,0,0,0.75);
        box-shadow: 9px 10px 22px -6px rgba(0,0,0,0.75);
    }
    .table-title {
		color: #fff;
		background: hsl(215, 50%, 23%);
		padding: 16px 25px;
		margin: -1.8rem -3rem 1rem -3rem;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
        margin-top: auto;
        margin-bottom: auto;
    }
    table.table {
        table-layout: fixed;
        /* margin-top: 15px; */
    }
    .table-title .btn {
		color: #fff;
		display: inline-flex;
		font-size: 13px;
		border: none;
        min-width: 50px;
        max-width: 50%;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 1px;
	}

    /*----------  TR TD ----------*/
    table thead tr:first-child{
        background-color: hsla(215, 38%, 39%, 0.77);
        color: hsl(215, 0%, 94%);
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    .table th, .table td {
        vertical-align: middle !important;
        font-size: .9rem;
    }
    .table2 td{
        font-weight: bold !important;
    }
    table.table1 td:first-child, table.table1 th:first-child{
        padding-left: 4%;
    }
    table.table td a {
        color: #1a6093 !important;
        text-decoration: underline !important;
    }
    table.table td a:hover {
        color: #1a6193b3 !important;
        text-decoration: none !important;
    }
	table.table td a.view {
        color: #03A9F4;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
    .separation, .separation td {
        background-color: #6b82a4 !important;
        border-top-color: none !important;
        border-top-width: 0 !important;
    }
    .table-striped tbody tr:nth-of-type(2n+1) {
    background-color: #e9e9e9 !important;
}
    .table-striped-perso tbody tr:nth-of-type(3n+1) {
        background-color: rgba(0, 0, 0, 0.05) !important;
    }
    .va-super{vertical-align: super !important;}

    /*----------  CUSTOM RADIO ----------*/
    .custom-radio {
		position: relative;
	}
	.custom-radio input[type="radio"] {
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-radio label:before{
		width: 18px;
		height: 18px;
	}
	.custom-radio label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-radio input[type="radio"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-radio input[type="radio"]:checked + label:before {
		border-color: #1db954;
		background: #1db954;
	}
	.custom-radio input[type="radio"]:checked + label:after {
		border-color: #fff;
	}
	.custom-radio input[type="radio"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
    }


    /*
    ==========================================
    #               RESPONSIVE               #
    ==========================================
    */
    @media screen and (max-width: 991px){
        .explication{margin-right: 10% !important;}
        .fz-150{margin-left: 20% !important}
        .btn-sm, .btn-group-sm > .btn{line-height: 1 !important;}
    }


    @media screen and (max-width: 767px){
        .container{
            width: 95% !important;
        }
        .mTab{
            margin-left: 0 !important;
            margin-right: 0 !important;
        }
        h2{
            font-size: 120% !important;
        }
        .style-btn-jouer{font-size: 150%;}
        .d-inline{ padding: 1%;}

        .table{
            margin: 0;
        }
        table.table {
            table-layout: fixed;
        }
        table.table1{
            width: 100%;
        }

        *, *::before, *::after {
            box-sizing: border-box;
        }

        .table th, .table td {
            padding: 0.3vw 0.1vw;
            vertical-align: middle !important;
            border-top: none;
        }
        .table th {
            font-size: .8rem !important;
        }
        table.table td a {
            margin: 0;
        }
        table.table2 tr:last-child {
            width: auto;
        }
        table.table1 td:first-child {
            width: auto;
        }
        .table-title {
            color: #fff;
            background: hsl(215, 50%, 23%);
            border-radius:0 !important;
            color: white;
            padding: .1rem 0 !important;
            margin: 0 !important;
        }
        .table-wrapper{
            padding: 0 !important;
            margin-left: -15px !important;
            margin-right: -15px !important;
            border-radius: 0 !important;
        }
        table{font-size: 80%;}

        .small-edit{
            margin-top: 2rem !important;
            margin-bottom: auto !important;
            margin-left :auto;
            margin-right: auto;
            line-height: .8rem;
            font-size: 0.8rem;
            color: #212529;
            width: 95%;
        }
    }

    @media screen and (max-width: 575px){
        h2{
            width: 90%;
        }
        .visibility1{
            width: 100%;
            height: 150%;
        }
        .table td {
            font-size: .8rem !important;
        }
        .explication{margin-right: 0 !important;}
        .fz-150{margin-left: 0 !important}
    }

    @media screen and (max-width: 400px){
        .fz-150{font-size: 100% !important;}
        .explication{font-size: .7rem !important;}
    }
</style>
@endsection

@section('content')
<main class="pt-2 pb-1">
    {{-- START CONTAINER 1 --}}
    <div class="container">

        {{------------ START ROW 1 - ENTETE ------------}}
        <div class="row mb-3">
            <span class="fz-150 mr-auto">Administration Parents</span>
            <button id="explication" class="btn btn-light btn-sm ml-auto align-self-baseline explication"><i class="fas fa-question text-success mr-2"></i>Besoin d'aide</a></button>
        </div>
        {{------------ START ROW 1 - ENTETE ------------}}



        {{------------ START ROW 2 - NOTIFICATIONS ------------}}
        <div class="row">
            <div class="col-12 mx-auto">
                @if(session()->has('info'))
                    <div class="alert alert-info alert-dismissible fade show mt-2 mb-0" role="alert">
                        {{ session('info') }}
                        @if(session()->has('info1'))
                            <br>{{ session('info1') }}
                        @endif
                        @if(session()->has('info2'))
                            <br>{{ session('info2') }}
                        @endif
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        {{------------ END ROW 2 - NOTIFICATIONS ------------}}

        {{------------ START ROW 3 - MESSAGE NOUVEAU INSCRIT ------------}}
        <div class="row ">
            <?php
                $nbJoueurs = count($players);
                if($nbJoueurs == 0){
            ?>
            <div class="alert alert-success mx-auto px-auto pt-3 alert-dismissible fade show my-2">
                <button type="button" class="close" data-dismiss="alert">&times;</button>

                <h2 class="mb-3 centre-txt bg-perso">Bienvenue sur Color-Drop ! </h2>
                <p class="text-intro font-weight-bold">Merci de vous être enregistré <?= ucfirst($users->name); ?>. Pour cette première partie, nous allons vous expliquer comment procéder.</p>
                <ul class="text-intro mx-3">
                    <li class="pl-3">
                        Commencez par enregistrer un joueur en cliquant sur "ajouter un enfant". <br>
                        Puis choisissez un prénom et un degré de difficulté (facile, moyen, difficile). <br>
                        Nous vous conseillons de débuter avec le mode facile, puis de modifier si besoin (vous pouvez changer le niveau de difficulté entre chaque partie sur cet écran, en cliquant sur "modifier", à la ligne correspondant à votre enfant).
                    </li>
                    <br>
                    <li class="pl-3">
                        Vous avez la possibilité d'enregistrer plusieurs joueurs, en suivant la même démarche. <br>
                        {{-- Il vous faudra dans ce cas sélectionner l'enfant qui va jouer en cochant la case correspondante. --}}
                    </li>
                </ul>
                <p class="text-intro text-ind">Vous pourrez revoir ces informations à tout moment en cliquant sur "Aide" dans le menu (d'autres informations sont également présentes, ainsi qu'une vidéo d'explication du fonctionnement du jeu).<br>
                </p>
                <h2 class="my-3 centre-txt bg-perso">Bon jeu !!</h2>

            </div>

            <?php
                } elseif ($nbJoueurs == 2 && $users->message2players ==1 ){
            ?>

            <div class="alert alert-success mx-auto px-auto pt-3 alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>

                <p class="text-intro font-weight-bold">
                    Félicitations <?= ucfirst($users->name); ?>, vous avez correctement entré 2 joueurs différents. <br>
                    Pour sélectionner l'enfant qui va jouer la prochaine partie, il vous suffit de cocher la case correspondant à son nom !
                </p>
                <p class="small">
                    Vous pouvez maintenant fermer cette fenêtre. <br>
                    Pour ne plus voir ce message lorsque vous arrivez sur cette page, il vous suffit de cliquer <a href="{{ route('msg2players') }}" onclick="return confirm('Etes-vous certain de supprimer ce message ?');">ICI</a>
                </p>
            </div>
        <?php
            }
        ?>
        {{------------ END ROW 3 - MESSAGE NOUVEAU INSCRIT ------------}}

        {{------------ START ROW 4 - AIDE ------------}}
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div id="notif" class="visibyOff alert bg-card txt-card fade show my-2 mb-0 fz-95" role="alert">
                    <p class="col-orange fz-140 text-center mb-4">Informations concernant la page d'accueil</p>
                    <p class="fz-115p font-weight-bold">Elle comporte deux éléments&nbsp;:</p>
                    <ul class="mx-auto puces">
                        <li class="text-darkos">
                            <h5 class="text-darkos fz-105r font-weight-bold">Une partie utilisateur (section des parents)</h5>
                            <span class="txt-card fz-95r">
                                <i class="fas fa-caret-right mx-2"></i> Pour mettre à jour les données enregistrées, cliquez sur "modifier" <br>
                                <i class="fas fa-caret-right mx-2"></i> Vous pouvez ici modifier vos données personnelles (nom et adresse mail) et choisir de recevoir ou non un email lorsqu'une partie a été réalisée.
                            </span>
                        </li>
                        <br>
                        <li class="text-darkos">
                            <h5 class="text-darkos fz-105r font-weight-bold">Une partie joueur(s) (section des enfants)</h5>
                            <span class="txt-card fz-95r">
                                <i class="fas fa-caret-right mx-2"></i> Quatre actions sont possibles&nbsp;:
                                <ul class="mx-auto list-pers">
                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Résumé&nbsp;: </span> Des statistiques et des graphiques relatifs aux parties jouées</li>
                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Détail&nbsp;: </span> Des tableaux pour connaître plus en détail les scores et les temps réalisés dans le jeu par votre ou vos enfant(s)  </li>
                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Modifier&nbsp;: </span> Mettre à jour le pseudo des joueurs, ainsi que le niveau de difficulté choisi</li>
                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Supprimer&nbsp;: </span> Supprime le joueur du jeu (ainsi que toutes ses données)</li>
                                </ul>
                            </span>
                            <br>
                            <span class="txt-card font-italic">
                                <i class="fas fa-caret-right mx-2"></i>Remarque&nbsp;:</span>
                                <p class="ml-4 pl-4 txt-card">Si vous avez enregistré plusieurs joueurs, sélectionnez celui qui va jouer en cochant la case "sélection" de l'enfant en question. <br>
                            Il ne vous reste plus qu'à cliquer sur "Aller vers le jeu" pour que la partie commence !!</p>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        {{------------ END ROW 4 - AIDE ------------}}

        {{------------ START ROW 5 - TABLE USER ------------}}
        </div>
        <div class="row mb-3 mTab">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-lg-8">
                            <h2 class="d-inline">Informations personnelles</h2>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table1 table-striped table-sm">
                        {{-- THEAD --}}
                        <thead>
                            <tr>
                                <th style="width: 20%">Nom</th>
                                <th style="width: 40%">Email</th>
                                <th style="width: 20%" class="text-center">Recevoir mail</th>
                                <th style="width: 20%" class="text-center nowrap">Actions</th>
                            </tr>
                        </thead>

                        {{-- TBODY --}}
                        <tbody>
                            <tr>
                                <td>{{ ucfirst($users->name) }}</td>
                                <td>{{ $users->email }}</td>
                                <td class="text-center">{{ $users->newsletter == 1 ? "Oui" : "Non"}}</td>
                                <td class="text-center text-nowrap">
                                    <a href="https://project-color.fgainza.fr/pmail?id={{$users->id}}" data-toggle="tooltip"><i class="far fa-edit text-dark mr-1"></i>Modifier</a> &nbsp;
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{------------ END ROW 5 - TABLE USER ------------}}

        {{------------ START ROW 6 - TABLE PLAYER ------------}}
        <div class="row mb-3 mTab">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row flex-nowrap justify-content-between">
                        <h2 class="ml-4 mr-auto text-left">Enfants enregistrés</h2>
                        <a href="https://project-color.fgainza.fr/padd" class="btn btn-info btn-sm ml-auto mr-3 my-1"><i class="material-icons">&#xE147;</i> <span class="line-h-1 my-auto">Ajouter un enfant</span></a>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table2 table-striped-perso table-sm">
                        {{-- THEAD --}}




                        {{-- TBODY --}}

                            <?php $i = 0; ?>
                            @foreach ($players as $player)
                                <?php $i++; ?>
                            <thead>
                                <tr class="text-center">
                                    <th class="pl-1">Select.</th>
                                    <th>Prénom</th>
                                    <th>Niveau de difficulté</th>
                                    <th>Nombre de parties</th>
                                    <th>Score cumulé</th>
                                    <th class="pr-1">Score moyen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td class="pad-perso">
                                        <span class="custom-radio">
                                        <input type="radio" id="radio{{$i}}" name="playerId" value="{{$player->id}}"<?= $i==1 ? 'checked' : '' ?> >
                                            <label for="radio{{$i}}"></label>
                                        </span>
                                    </td>
                                    <td class="fz-110r text-bdx">{{ ucfirst($player->name) }}</td>
                                    <td>{{ ucfirst($player->difficulty) }}</td>
                                    <td>{{ $player->nbGames }}</td>
                                    <td>{{ $player->score }}</td>
                                    <td>
                                        @if($player->nbGames)
                                            {{ round($player->score / $player->nbGames, 2) }}
                                        @else
                                            {{ "-" }}
                                        @endif
                                    </td>
                                </tr>
                                <tr class="line-h-5">

                                    <td colspan="6" class="text-nowrap-resp w-100 px-2">
                                        <div class="text-nowrap d-inline-block w-25 text-center px-2 va-supper">
                                            <a href="https://project-color.fgainza.fr/presume?id={{$player->id}}&chart=1" class="mb-3 text-nowrap line-h-2-5"><i class="fas fa-chart-line text-info fa-lg mr-2 fz-110r"></i>Resumé</a> &nbsp;
                                        </div>
                                        <div class="text-nowrap d-inline-block w-25 text-center px-2 va-supper">
                                            <a href="https://project-color.fgainza.fr/pscore?id={{$player->id}}" class="mb-3 text-nowrap line-h-2-5"><i class="far fa-file-alt text-success mr-2 fz-1r"></i>Détail</a> &nbsp;
                                        </div>
                                        <div class="text-nowrap d-inline-block w-25 text-center px-2 va-supper">
                                            <a href="https://project-color.fgainza.fr/pedit?id={{$player->id}}" class="mb-3 text-nowrap line-h-2-5"><i class="far fa-edit text-dark mr-1"></i>Modifier</a> &nbsp;
                                        </div>
                                        <div class="text-nowrap d-inline-block w-25 text-center px-2 va-supper">
                                            <a href="https://project-color.fgainza.fr/pdelete?id={{$player->id}}" class="mb-3 text-nowrap line-h-2-5" onclick="return confirm('Confirmez la suppression de cet élément')"><i class="far fa-times-circle text-danger mr-1 fa-lg fz-105r"></i>Supprimer</a>&nbsp;
                                        </div>
                                    </td>


                                </tr>
                            </tbody>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
        {{------------ END ROW 6 - TABLE PLAYER ------------}}

    </div>
    {{-- END CONTAINER 1 --}}

    {{-- START CONTAINER 2 & 3 - BOUTON ALLER AU JEU + TEXTE --}}
    <div class="container mt-4">
        <span id="goToGame" class="color-btn my-4" onclick="window.location='games?id='+document.querySelector('input[name=playerId]:checked').value"><button class="btn btn-block w-100 text-white style-btn-jouer mt-2">Aller vers le jeu</button></span>
    </div>
    <div class="container text-center small-edit mb-3">
        <small>Pour un meilleur confort à l'usage, le jeu se lancera en mode "Plein Ecran" si votre résolution est faible (moins de 900 px en longueur).<br>
        Une icone en haut à droite de l'écran apparaîtra et il vous suffira de cliquer dessus pour revenir en mode normal (et inversement).</small>
    </div>
    {{-- END CONTAINER 2 & 3 - BOUTON ALLER AU JEU + TEXTE --}}
</main>
@endsection

@section('scripts-footer')

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
@endsection
