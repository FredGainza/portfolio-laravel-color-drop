@extends('layouts.parents')
@section('title', 'Informations')
@section('scripts-header')
    <style>
        body{
            overflow-y: scroll;
        }
        .fz-95{font-size: .95rem;}
        .col-or{color: hsla(360, 84%, 2%, 0.92);}

        h5{
            font-size: 1.05rem !important;
        }
        .fz-110{
            font-size: 115%;
            font-weight: 500;
            color: #ebebeb;
        }
        .card-body ul {
            list-style-type: square ;
            list-style-position: outside ;
            list-style-image: none ;
        }
        .bg-card{background-color:#37696dcc !important;}
        .txt-card{
            color: #e6e6e6;
            font-size: .95rem;
            line-height: 1.5 !important;
        }
        .btn-desinscription {
            vertical-align: middle;
        }
        .fz-90{
            font-size: 90%;
        }
        .ml--2{
            margin-left: -2rem;
        }
        .bg-txt{
            background-color: #4f8b8ce6;
            padding: 1rem 1.25rem;
            border-radius: 4px;
            -webkit-box-shadow: 9px 9px 8px -9px rgba(8,8,8,0.58);
            -moz-box-shadow: 9px 9px 8px -9px rgba(8,8,8,0.58);
            box-shadow: 9px 9px 8px -9px rgba(8,8,8,0.58);
        }
        .puces {
            list-style-type: square ;
            list-style-position: outside ;
            list-style-image: none ;
        }
        .puces2 {
            list-style-type: square !important;
            list-style-position: outside !important;
            list-style-image: none !important;
        }
        .list-pers{list-style: none !important;}

        .btn-previous{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 700;
            width: -moz-fit-content;
            padding-top: .2rem !important;
            padding-bottom: .2rem !important;
            background-color: #b3dbbf80;
            display: inline-flex;
            flex-wrap: nowrap;
            align-items: center;
            color: #242424 !important;
        }
        .btn-previous:hover{
            background-color: #5b9a6fba;
            color: #d4d4d4d4 !important;
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
        .card-header{
            padding: 0.25rem 1rem !important;
            background-color: #4f8b8ce6 !important;
        }
        .btn-desinscription{
            border-radius: 7px;
            vertical-align: top;
            background-color: hsla(1, 85%, 65%, 0.95);
            color: #eaebeb;
        }
        .btn-desinscription:hover{
            background-color: hsla(1, 83%, 55%, 0.86);
            color: #cbcdcce0;
        }
        @media screen and (max-width: 575px){
            main{
                margin: auto 5%;
            }
        }
    </style>

@endsection
@section('content')
<main class="py-2">
    <div class="container fz-110">

        <div class="row flex-column">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    @if(session()->has('info'))
                        <div class="alert alert-info alert-dismissible fade show mt-5 mb-0" role="alert">
                            {{ session('info') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <a class="btn btn-previous mt-1" href="{{ route('pindex') }}"><i class="fas fa-angle-double-left mr-2"></i>Précédent</a>
            <div class="col-12 col-lg-8 offset-lg-2 bg-txt my-3">
                <h2 class="text-dark font-weight-bold text-center mb-3">Partie Information</h2>
                <p><i class="fas fa-caret-right mx-2"></i>Retrouvez ici l'ensemble des ressources et aides nécessaires pour ce jeu</p>
                    <ul class="fz-100 mx-3 puces">

                        <div class="accordion" id="accordionExample">
                            <div class="card mt-2 ml--2">
                                <div class="card-header" id="headingVideo">
                                    <h3 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVideo" aria-expanded="false" aria-controls="collapseVideo">
                                            <li class="links fz-110"><a href="video/webforce/projet-webforce_player.html" target="_blank"> Vidéo d'explication du fonctionnement du jeu</a></li>
                                        </button>
                                    </h3>
                                </div>
                            </div>

                            <div class="card ml--2">
                                <div class="card-header" id="headingCGU">
                                    <h3 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseCGU" aria-expanded="false" aria-controls="collapseCGU">
                                            <li class="links fz-110"><a href="rules" target="_blank"> Conseils d'utilisation d'ordre général</a></li>
                                        </button>
                                    </h3>
                                </div>
                            </div>

                            <div class="card ml--2">
                                <div class="card-header" id="headingOne">
                                <h3 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <li class="links fz-110">L'ajout et la configuration de joueurs</li>
                                    </button>
                                </h3>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body bg-card txt-card">
                                        <p class="font-weight-bold col-or">Méthode à appliquer lorsque l'on s'inscrit sur Color-Drop :</p>
                                        <ul class="text-intro mx-3 puces">
                                            <li class="pl-2">
                                                Commencez par enregistrer un joueur en cliquant sur "ajouter un enfant". <br>
                                                Vous pourrez alors choisir un prénom et un degré de difficulté (facile, moyen, difficile) : plus le mode est facile, plus l'élément bougé par le joueur va facilement correspondre avec son élément-cible. <br>
                                                Nous vous conseillons de débuter avec le mode facile, puis de modifier si besoin (vous pouvez changer le niveau de difficulté entre chaque partie en cliquant sur "modifier", à la ligne de votre enfant).
                                            </li>
                                            <br>
                                            <li class="pl-2">
                                                Vous avez la possibilité d'enregistrer plusieurs joueurs, en suivant la même démarche. <br>
                                                Il vous faudra dans ce cas sélectionner l'enfant qui jouera la prochaine partie en cochant la case correspondant à son nom.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card ml--2">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <li class="links fz-110">La rubrique "détail" du joueur (explications des tableaux)</li>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body bg-card txt-card">
                                        <p class="fz-95 font-weight-bold col-or">La rubrique "détail" comporte 4 types de tableaux différents :</p>
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

                            <div class="card ml--2">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <li class="links fz-110">La rubrique "résumé" du joueur (statistiques et graphiques)</li>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body bg-card txt-card">
                                        <p class="font-weight-bold col-or">La rubrique "résumé" est constituée de 2 éléments :</p>
                        <ul class="text-intro mx-3">
                            <li class="pl-2">
                                Des statistiques qui résument en quelques chiffres-clés l'activité de votre enfant sur Color-Drop<br>
                            </li>
                            <br>
                            <li class="pl-2">
                                Des graphiques qui permettent de visualiser plus facilement les données des tableaux de la rubrique "détail". <br>
                            </li>
                        </ul>
                        <br>
                        <span class="pl-2">
                            <b>Remarque :</b></span>
                            <p class="ml-4 pl-4">Vous pouvez modifier ces graphiques en excluant certaines données. Il vous suffit pour cela de cliquer sur le (ou les) jeu(x) de données à exclure dans la partie située sous le graphique.</p>
                        <span class="pl-2">
                            <i>Exemple :</i>
                        </span>
                        <p  class="ml-4 pl-4">Votre enfant a réalisé 5 parties, mais vous ne voulez que seules les 3 dernières parties soient représentées graphiquement. Il vous suffit alors de cliquer sur "Partie 1" et sur "Partie 2" pour qu'elles n'apparaissent pas sur le graphique.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>

                <p class="my-4">
                    <i class="fas fa-caret-right mx-2"></i>Nous vous enverrons un email à chaque fois que votre enfant aura effectué une partie. <br>
                    Si vous ne souhaitez pas recevoir de mail de notre part, vous pouvez vous désinscrire en cliquant sur le bouton suivant :

                <button class="btn bg-red btn-desinscription btn-sm ml-3 mb-0"><a href="{{ route('newsletter') }}" class="link-unsub" onclick="return confirm('Confirmez-vous ne plus vouloir recevoir de mail après chaque partie de votre enfant ?');"><i class="far fa-times-circle mr-1"></i>Désinscription</a></button>
                </p>

                <p class="mb-4">
                    <i class="fas fa-caret-right mx-2"></i>Pour toute question ou demande supplémentaire, vous pouvez nous contacter à l'adresse mail suivante : <a href="mailto:project-color@fgainza.fr">project-color@fgainza.fr</a>
                </p>


                    <i class="fas fa-caret-right mx-2"></i>Mentions légales :
                    <ul>
                        <li>l'ensemble des ressources graphiques proviennent de &copy; <a href="https://www.freepik.com" target="_blank">Freepik.com</a></li>
                        <li>Les sounds effects du jeu proviennent de &copy; <a href="https://freesound.org">FreeSound.org</a></li>
                        <li>La musique du jeu, "<b>Twinkle Twinkle Little Star (Instrumental) by The Green Orbs | Lullaby</b>", est extraite de l' <a href="https://www.youtube.com/watch?v=FSS7Ml9F6P0">Audio Library de Youtube</a></li>
                    </ul>


                    <i class="fas fa-caret-right mx-2 mt-4"></i>Caractéristiques techniques :
                        <ul>
                            <li>Pour jouer à Color-Drop, il vous faut une version récente d'un des 3 navigateurs suivants : Chrome, Firefox ou Safari.</li>
                            <li>La résolution minimale est de 768 × 576 px. Le jeu ne peut se jouer qu'en mode "paysage", le mode "portrait" est proscrit.</li>
                        </ul>

            </div>
        </div>
    </div>

</main>
@endsection
