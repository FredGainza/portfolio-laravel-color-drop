@extends('layouts.parents')
@section('title', 'Informations')
@section('scripts-header')
    <style>
        body{
            overflow-y: scroll;
        }
        .fz-95{font-size: .95rem;}
        .fz-110{font-size: 1.1rem;}
        .col-or{color: hsla(360, 84%, 2%, 0.92);}
        .text-grise{
            color: #283158;
            font-size: 115%;
            font-weight: bold;
        }
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
        .text-darkos{color: #07162e;}
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
        .marg-drop{
            margin-left: 1rem !important;
            margin-right: 1rem !important;
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
        .btn{text-align: left !important;}
        .btn-previous{
            font-family: Verdana, "Geneva", Tahoma, sans-serif;
            font-weight: 700;
            font-size: .8rem !important;
            width: -moz-fit-content;
            width: -webkit-fit-content;
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

        ul li a:hover, .links:hover, .btn-link:hover {
            color: hsl(47, 97%, 18%);
            font-weight: 600;
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
            padding: 0.25rem 0 0.25rem 1rem !important;
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

        @media screen and (max-width: 991px){
            .ml--2 {
                margin-left: -3.5rem;
                margin-right: -1rem;
            }
            .marg-drop{
                margin-left: .25rem !important;
                margin-right: .25rem !important;
            }
            .pad-int{padding: .1rem 0 .1rem 1rem}
        }
        @media screen and (max-width: 575px){
            main{
                margin: auto 5%;
            }
            .btn-previous{
                font-size: .7rem !important;
            }
            h2{
                font-size: 1.5rem !important;
            }
        }
    </style>

@endsection
@section('content')
<main class="py-2">
    <div class="container fz-110">

        <div class="row flex-column">
            <div class="row">
                <div class="col-md-8 mx-auto">

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
            <div class="col-lg-8 bg-txt mx-auto my-3">
                <h2 class="text-dark font-weight-bold text-center mb-3">Partie Information</h2>
                <p><i class="fas fa-caret-right mx-2"></i>Retrouvez ici l'ensemble des ressources et aides nécessaires pour ce jeu</p>
                <ul class="fz-100 marg-drop puces">

                    <div class="accordion" id="accordionExample">
                        <div class="card mt-2 ml--2">
                            <div class="card-header" id="headingVideo">
                                <h3 class="mb-0">
                                    <button class="btn btn-link collapsed ml-2" type="button" data-toggle="collapse" data-target="#collapseVideo" aria-expanded="false" aria-controls="collapseVideo">
                                        <li class="links fz-110"><a href="video/webforce/projet-webforce_player.html" target="_blank"> Vidéo d'explication du fonctionnement du jeu</a></li>
                                    </button>
                                </h3>
                            </div>
                        </div>

                        <div class="card ml--2">
                            <div class="card-header" id="headingCGU">
                                <h3 class="mb-0">
                                    <button class="btn btn-link collapsed ml-2" type="button" data-toggle="collapse" data-target="#collapseCGU" aria-expanded="false" aria-controls="collapseCGU">
                                        <li class="links fz-110"><a href="rules" target="_blank"> Conseils d'utilisation d'ordre général</a></li>
                                    </button>
                                </h3>
                            </div>
                        </div>

                        <div class="card ml--2">
                            <div class="card-header" id="headingOneBis">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed ml-2" type="button" data-toggle="collapse" data-target="#collapseOneBis" aria-expanded="false" aria-controls="collapseOneBis">
                                    <li class="links fz-115p">La page d'accueil et ses réglages</li>
                                </button>
                            </h3>
                            </div>

                            <div id="collapseOneBis" class="collapse" aria-labelledby="headingOneBis" data-parent="#accordionExample">
                                <div class="card-body bg-card txt-card">
                                    <p class="font-weight-bold text-grise fz-115p">Elle comporte deux éléments :</p>
                                    <ul class="mx-auto puces pad-int">
                                        <li class="text-darkos">
                                            <h5 class="text-darkos fz-105r font-weight-bold">Une partie utilisateur (section des parents)</h5>
                                            <span class="txt-card fz-95r">
                                                <i class="fas fa-caret-right mx-2"></i> Pour mettre à jour les données enregistrées, cliquez sur "modifier" <br>
                                                <i class="fas fa-caret-right mx-2"></i> Vous pourrez alors modifier vos données personnelles (nom et adresse mail) et choisir de recevoir ou non un email lorsqu'une partie a été réalisée.
                                            </span>
                                        </li>
                                        <br>
                                        <br>
                                        <li class="text-darkos">
                                            <h5 class="text-darkos fz-105r font-weight-bold">Une partie joueur(s) (section des enfants)</h5>
                                            <span class="txt-card fz-95r">
                                                <i class="fas fa-caret-right mx-2"></i> Commencez par enregistrer un joueur en cliquant sur le bouton bleu "Ajouter un enfant". <br>
                                                Vous pourrez alors choisir un prénom et un degré de difficulté (facile, moyen, difficile) : plus le mode est facile, plus l'élément bougé par le joueur va facilement correspondre avec son élément-cible. <br><br>
                                                <i class="fas fa-caret-right mx-2"></i>Nous vous conseillons de débuter avec le mode facile, puis de modifier si besoin (vous pouvez changer le niveau de difficulté entre chaque partie en cliquant sur "modifier", à la ligne de votre enfant). <br>
                                            </span>
                                            <br>
                                            <span class="txt-card fz-95r">
                                                <i class="fas fa-caret-right mx-2"></i>Vous avez la possibilité d'enregistrer plusieurs joueurs, en suivant la même démarche. <br>
                                                Il vous faudra alors sélectionner celui qui va jouer en cochant la case "sélection" dans le tableau. <br>
                                            </span>
                                            <br>
                                            <span class="txt-card mb-3 fz-95r">
                                                <i class="fas fa-caret-right mx-2"></i> Pour chaque joueur, quatre actions sont possibles :
                                                <ul class="mx-auto list-pers">
                                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Résumé : </span> Des statistiques et des graphiques relatifs aux parties jouées</li>
                                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Détail : </span> Des tableaux pour connaître plus en détail les scores et les temps réalisés dans le jeu par votre ou vos enfant(s)  </li>
                                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Modifier : </span> Mettre à jour le pseudo des joueurs, ainsi que le niveau de difficulté choisi</li>
                                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Supprimer : </span> Supprime le joueur du jeu (ainsi que toutes ses données)</li>
                                                </ul>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card ml--2">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed ml-2" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <li class="links fz-110">La rubrique "détail" du joueur (explications des tableaux)</li>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body bg-card txt-card">
                                    <p class="font-weight-bold text-grise fz-115p">La rubrique "détail" comporte 4 types de tableaux différents :</p>
                                    <ul class="mx-auto puces pad-int">
                                        <li class="text-dark">
                                            <h5 class="text-dark fz-105r font-weight-bold">Totalité par partie et Totalité par niveau</h5>
                                            <span class="txt-card fz-95r"><i class="fas fa-caret-right mx-2"></i> Les données de ces 2 tableaux sont les mêmes mais elles sont présentées de manière différente : par partie pour le premier tableau, par niveau pour le second. <br>
                                            <i class="fas fa-caret-right mx-2"></i> Vous disposez des données suivantes : les scores (en nombre d'étoiles), les temps (en secondes) , la date de réalisation de la partie ainsi que le niveau de difficulté choisi pour chacun des niveaux et chacune des parties.</span>
                                        </li>
                                        <br>
                                        <li class="text-dark">
                                            <h5 class="text-dark fz-105r font-weight-bold">Regroupement des niveaux par thèmes</h5>
                                            <span class="txt-card fz-95r"><i class="fas fa-caret-right mx-2"></i> Afin de rendre les données plus lisibles, le troisième tableau regroupe les niveaux en 3 thèmes différent, à savoir :
                                                <ul class="mx-auto list-pers">
                                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Thème "Couleur"</span> (niveaux 1, 2, 3 et 4)</li>
                                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Thème "Forme"</span> (niveaux 5, 6, 7 et 8)</li>
                                                    <li><i class="fas fa-share fa-sm mr-2"></i></i><span class="text-theme font-weight-bold">Thème "Objets"</span> (niveaux 9 et 10)</li>
                                                </ul>
                                        </li>
                                        <br>
                                        <li class="text-dark">
                                            <h5 class="text-dark fz-105r font-weight-bold">Seulement les parties</h5>
                                            <span class="txt-card fz-95r"><i class="fas fa-caret-right mx-2"></i> Tableau synthétique, avec 2 valeurs pour chaque partie : le score obtenu et le temps réalisé.<br>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card ml--2">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed ml-2" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <li class="links fz-110">La rubrique "résumé" du joueur (statistiques et graphiques)</li>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body bg-card txt-card">
                                    <p class="font-weight-bold text-grise fz-115p">La rubrique "résumé" est constituée de 2 éléments :</p>
                                    <ul class="text-intro mx-3 pad-int">
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
                                        <b>Remarque :</b>
                                    </span>
                                    <p class="ml-4 pl-4">Vous pouvez modifier ces graphiques en excluant certaines données. Il vous suffit pour cela de cliquer sur le (ou les) jeu(x) de données à exclure dans la partie située sous le graphique.</p>
                                    <span class="pl-4">
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
                    Si vous ne souhaitez pas recevoir de mail de notre part, vous pouvez vous désinscrire sur la page d'accueil, dans la partie "utilisateur", ou en cliquant sur le bouton suivant

                    <button class="btn bg-red btn-desinscription btn-sm ml-0 mb-0"><a href="{{ route('newsletter') }}" class="link-unsub" onclick="return confirm('Confirmez-vous ne plus vouloir recevoir de mail après chaque partie de votre enfant ?');"><i class="far fa-times-circle mr-1"></i>Désinscription</a></button>
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
