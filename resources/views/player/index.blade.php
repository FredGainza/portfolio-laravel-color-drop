@extends('layouts.parents')
@section('title', 'Gestion des joueurs')
@section('scripts-header')
<style>
    /*
    ==========================================
    #               GENERAL                  #
    ==========================================
    */

    /*----------  FONTS ----------*/
    .text-intro{
        font-size: 110%;
    }

    /*----------  PADDING ----------*/
    .pl-10px{padding-left: 1.5rem !important;}
    .alert-dismissible{
        padding-left: 4.5rem !important;
    }

    /*----------  MARGIN ----------*/
    .ml-49p {
        margin-left: 49%
    }

    /*----------  TEXT ----------*/
    .line-h-1-5{line-height: 1.5 !important;}
    .line-h-2{line-height: 2 !important;}
    .line-h-2-5{line-height: 2.5 !important;}
    .line-h-1-2{line-height: 1.2 !important;}
    .line-h-0-5{line-height: 0.3 !important;}
    .line-h-1{line-height: 1 !important;}
    .text-ind{
        text-indent: 1.5em;
        margin-top: 0;
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

    /*----------  LISTS ----------*/
    .alert-success ul {
        list-style-type: square !important;
        list-style-position: outside !important;
        list-style-image: none !important;
    }

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
    }
    table.table {
        table-layout: fixed;
        /* margin-top: 15px; */
    }
    .table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
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
    }
    table.table th:last-child {
        width: 25%;
    }
    table.table2 td:last-child {
        padding-bottom: 0 !important;
    }
    table.table1 td:first-child, table.table1 th:first-child{
        padding-left: 4%;
    }
    table.table td a {
        color: #a0a5b1;
        /* display: inline-block; */
        margin: 0 5px;
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
    @media screen and (max-width: 767px){
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
        table thead th {
            font-size: 90%;
        }
        table tbody td {
            font-size: 95%;
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }

        .table th, .table td {
            padding: 0.3vw 0.1vw;
            vertical-align: middle !important;
            border-top: none;
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
            background:
            hsl(215, 50%, 23%);
            border-radius:0 !important;
            color: white;
            padding: .1rem 0 !important;
            margin: 0 !important;
        }
        .table-wrapper{
            padding: 0 !important;
            margin-left: 2%;
            margin-right: 2%;
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
</style>
@endsection

@section('content')
<main class="pt-2 pb-1">
    {{-- START CONTAINER 1 --}}
    <div class="container">
        <div class="fz-150">Administration Parents</div>
        {{------------ START ROW 1 - NOTIFICATIONS ------------}}
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                @if(session()->has('info'))
                    <div class="alert alert-info alert-dismissible fade show mt-5 mb-0" role="alert">
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
        {{------------ END ROW 1 - NOTIFICATIONS ------------}}

        {{------------ START ROW 2 - MESSAGE NOUVEAU INSCRIT ------------}}
        <div class="row ">
            <?php
                $nbJoueurs = count($players);
                if($nbJoueurs == 0){
            ?>
            <div class="alert alert-success mx-auto px-auto pt-3 alert-dismissible fade show my-3">
                <button type="button" class="close" data-dismiss="alert">&times;</button>

                <h2 class="mb-3 centre-txt bg-perso">Bienvenue sur Color-Drops ! </h2>
                <p class="text-intro font-weight-bold">Merci de vous être enregistré <?= $users->name; ?>. Pour cette première partie, nous allons vous expliquer comment procéder.</p>
                <ul class="text-intro mx-3">
                    <li class="pl-3">
                        Commencez par enregistrer un joueur en cliquant sur "ajouter un enfant". <br>
                        Vous pourrez alors choisir un prénom et un degré de difficulté (facile, moyen, difficile). Nous vous conseillons de débuter avec le mode facile, puis de modifier si besoin (vous pouvez changer le niveau de difficulté entre chaque partie sur cet écran, en cliquant sur "modifier", à la ligne correspondant à votre enfant).
                    </li>
                    <br>
                    <li class="pl-3">
                        Vous avez la possibilité d'enregistrer plusieurs joueurs, en suivant la même démarche. <br>
                        {{-- Il vous faudra dans ce cas sélectionner l'enfant qui va jouer en cochant la case correspondante. --}}
                    </li>
                </ul>
                <p class="text-intro text-ind">Vous pourrez revoir ces informations à tout moment en cliquant sur l'icone "didactitiel" (d'autres informations sont également présentes, ainsi qu'une vidéo d'explication du fonctionnement du jeu).<br>
                </p>
                <h2 class="my-3 centre-txt bg-perso">Bon jeu !!</h2>

            </div>

            <?php
                } elseif ($nbJoueurs == 2 && $users->message2players ==1 ){
            ?>

            <div class="alert alert-success mx-auto px-auto pt-3 alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>

                <p class="text-intro font-weight-bold">
                    Félicitations <?= $users->name; ?>, vous avez correctement entré 2 joueurs différents. <br>
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
        {{------------ END ROW 2 - MESSAGE NOUVEAU INSCRIT ------------}}

        {{------------ START ROW 3 - TABLE USER ------------}}
        </div>
        <div class="row mb-3 mx-4">
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
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        {{-- TBODY --}}
                        <tbody>
                            <tr>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>
                                    <a href="https://project-color.fgainza.fr/pmail?id={{$users->id}}" data-toggle="tooltip"><i class="far fa-edit text-dark mr-1"></i>Modifier</a> &nbsp;
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{------------ END ROW 3 - TABLE USER ------------}}

        {{------------ START ROW 4 - TABLE PLAYER ------------}}
        <div class="row mb-3 mx-4">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row justify-content-between">
                        <h2 class="ml-3 mr-auto text-right">Enfants enregistrés</h2>
                        <a href="https://project-color.fgainza.fr/padd" class="btn btn-info btn-sm ml-auto mr-3 my-1"><i class="material-icons">&#xE147;</i> <span>Ajouter un enfant</span></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table2 table-striped table-sm">
                        {{-- THEAD --}}
                        <thead>
                            <tr class="text-center">
                                <th>Sélection</th>
                                <th>Prénom</th>
                                <th>Niveau de difficulté</th>
                                <th>Nombre de parties</th>
                                <th>Score cumulé</th>
                                <th>Score moyen</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        {{-- TBODY --}}
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($players as $player)
                                <?php $i++; ?>
                                <tr class="text-center">
                                    <td>
                                        <span class="custom-radio">
                                        <input type="radio" id="radio{{$i}}" name="playerId" value="{{$player->id}}"<?= $i==1 ? 'checked' : '' ?> >
                                            <label for="radio{{$i}}"></label>
                                        </span>
                                    </td>
                                    <td>{{ $player->name }}</td>
                                    <td>{{ $player->difficulty }}</td>
                                    <td>{{ $player->nbGames }}</td>
                                    <td>{{ $player->score }}</td>
                                    <td>
                                        @if($player->nbGames)
                                            {{ round($player->score / $player->nbGames, 2) }}
                                        @else
                                            {{ "-" }}
                                        @endif
                                    </td>
                                    <td class="text-wrap text-left ml-2">
                                        <a href="https://project-color.fgainza.fr/presume?id={{$player->id}}&chart=1" class="pb-3 text-nowrap line-h-2-5"><i class="far fa-chart-bar text-info mr-1"></i>Resumé</a> &nbsp;<br>
                                        <a href="https://project-color.fgainza.fr/pscore?id={{$player->id}}" class="mb-3 text-nowrap line-h-2-5"><i class="far fa-file-alt text-success mr-1"></i>Détail</a> &nbsp;<br>
                                        <a href="https://project-color.fgainza.fr/pedit?id={{$player->id}}" class="mb-3 text-nowrap line-h-2-5"><i class="far fa-edit text-dark mr-1"></i>Modifier</a> &nbsp;<br>
                                        <a href="https://project-color.fgainza.fr/pdelete?id={{$player->id}}" class="mb-3 text-nowrap line-h-2-5" onclick="return confirm('Confirmez la suppression de cet élément')"><i class="far fa-times-circle text-danger mr-1"></i>Supprimer</a>&nbsp;
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{------------ END ROW 4 - TABLE PLAYER ------------}}

    </div>
    {{-- END CONTAINER 1 --}}

    {{-- START CONTAINER 2 - BOUTON ALLER AU JEU + TEXTE --}}
    <div class="container mt-4">
        <span id="goToGame" class="color-btn my-4" onclick="window.location='games?id='+document.querySelector('input[name=playerId]:checked').value"><button class="btn btn-block w-75 text-white style-btn-jouer mt-2">Aller vers le jeu</button></span>

    </div>
    <div class="text-center small-edit ">
        <small>Pour un meilleur confort à l'usage, le jeu se lancera en mode "Plein Ecran" si votre résolution est faible (moins de 900 px en longueur).<br>
        Une icone en haut à droite de l'écran apparaîtra et il vous suffira de cliquer dessus pour revenir en mode normal (et inversémeent).</small>
    </div>
    {{-- END CONTAINER 2 - BOUTON ALLER AU JEU + TEXTE --}}
</main>
@endsection

@section('scripts-footer')
{{-- SCRIPTS JS - CREATION DR COOKIES --}}
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
