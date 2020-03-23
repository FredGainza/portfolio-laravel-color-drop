/*
===============================================
    FONCTIONS CONSTRUCTION FIGURES (CANVAS)
===============================================
*/

/********** CERCLE **********/
function cercle(id, colorC = 0, color = 0) {
    var canvas = document.getElementById(id);
    var context = canvas.getContext("2d");
    var X = canvas.width / 2;
    var Y = canvas.height / 2;
    var R = 45;
    context.beginPath(); // Initialisation du dessin
    if (colorC != 0) {
        context.strokeStyle = colorC; // Couleur du trait
    }
    if (color != 0) {
        context.fillStyle = color; // Couleur du fond
    }
    context.lineWidth = "8"; // Epaisseur du trait
    context.arc(X, Y, R, 0, 2 * Math.PI, false);  // Tracé du cercle de rayon r
    if (colorC != 0) {
        context.stroke(); //Enregistrement du tracé
    }
    if (color != 0) {
        context.fill(); // Enregistrement du fond
    }
}


/********** TRIANGLE **********/
function triangle(id, colorC, color) {
    var canvas = document.getElementById(id);
    var ctx = canvas.getContext('2d');
    ctx.beginPath();
    ctx.strokeStyle = colorC; // Couleur du trait
    ctx.lineWidth = "7";
    ctx.moveTo(50, 7);
    ctx.lineTo(5, 95);
    ctx.lineTo(95, 95);
    ctx.lineTo(50, 7);
    ctx.closePath();
    ctx.stroke(); //Enregistrement du tracé
    ctx.fillStyle = color; // Couleur du fond
    ctx.fill();
}


/********** CARRE **********/
function carre(id, x, y, w, colorC = 0, color = 0) {
    var canvas = document.getElementById(id);
    var context = canvas.getContext("2d");
    context.beginPath(); // Initialisation du dessin
    if (colorC != 0) {
        context.strokeStyle = colorC; // Couleur du trait
    }
    context.lineWidth = "8"; // Epaisseur du trait
    context.rect(x, y, w, w); // Tracé de la forme (coordonnées de l'origine x, y, longueur et largeur)
    if (color != 0) {
        context.fillStyle = color; // Couleur du fond
    }
    if (colorC != 0) {
        context.stroke(); //Enregistrement du tracé
    }
    if (color != 0) {
        context.fill(); // Enregistrement du fond
    }
}


/********** ETOILE **********/
 function etoile(id, cx, cy, spikes, outerRadius, innerRadius, colorC = 0, color = 0) {
    var canvas = document.getElementById(id);
    var ctx = canvas.getContext('2d');
    var rot = Math.PI / 2 * 3;
    var x = cx;
    var y = cy;
    var step = Math.PI / spikes;
    if (colorC != 0) {
        ctx.strokeStyle = colorC; // Couleur du trait
    }
    ctx.beginPath();
    ctx.moveTo(cx, cy - outerRadius);
    for (i = 0; i < spikes; i++) {
        x = cx + Math.cos(rot) * outerRadius;
        y = cy + Math.sin(rot) * outerRadius;
        ctx.lineTo(x, y);
        rot += step;

        x = cx + Math.cos(rot) * innerRadius;
        y = cy + Math.sin(rot) * innerRadius;
        ctx.lineTo(x, y);
        rot += step;
    }
    ctx.lineTo(cx, cy - outerRadius);
    ctx.closePath();
    ctx.lineWidth=7;
    if (colorC != 0) {
        ctx.strokeStyle = colorC; // Couleur du trait
    }
    ctx.stroke();
    if (color != 0) {
        ctx.fillStyle= color; // Enregistrement du fond
    }
    ctx.fill();
}


/*
===============================================
    FONCTION SCHUFFLE JS
===============================================
*/
// Tri aléatoire des éléments d'un tableau
function shuffle(a) {
    var j = 0;
    var valI = '';
    var valJ = valI;
    var l = a.length - 1;
    while (l > -1) {
        j = Math.floor(Math.random() * l);
        valI = a[l];
        valJ = a[j];
        a[l] = valJ;
        a[j] = valI;
        l = l - 1;
    }
    return a;
}


/*
===============================================
    TABLEAU DES COULEURS JS
===============================================
*/
// let couleurs = ["red", "blue", "yellow", "green", "purple", "maroon", "#ff0080", "darkorange"];
let couleurs = ["red", "MediumBlue", "yellow", "darkgreen", "Indigo", "DarkRed", "deeppink", "DarkOrange"];
let couleursOrder = [].concat(couleurs);

let nbFormes = 0;
let couleursNiv = couleurs.slice(0, nbFormes);


/*
===============================================
    GESTION AUDIO
===============================================
*/
function toggleSound() {
    var myMusic = document.getElementById("music");
    myMusic.loop = true;
    if (myMusic.paused) {
        myMusic.play();
    } else {
        myMusic.pause();
    }
}

function GoInFullscreen(element) {
	if(element.requestFullscreen)
		element.requestFullscreen();
	else if(element.mozRequestFullScreen)
		element.mozRequestFullScreen();
	else if(element.webkitRequestFullscreen)
		element.webkitRequestFullscreen();
	else if(element.msRequestFullscreen)
		element.msRequestFullscreen();
}

/*
###############################################
    SCRIPT JQUERY
###############################################
*/

$(document).ready(function () {

    /*
    ===============================================
        RECUPERATION TABLE LEVELS
    ===============================================
    */
    for ($i=1; $i<=10; $i++){
        $2et = $("#2et_level_"+$i).html();
        $3et = $("#3et_level_"+$i).html();
        console.log("level "+$i+ " : "+$2et+ " " +$3et);
    }

    /*
    ===============================================
        GESTION BTN AUDIO
    ===============================================
    */

    $icon = $('#playerMusic');
    $music = $('#music');
    $music.prop("volume", 0.7);

    $icon.mouseenter(function(){
        $music.prop("controls", true);
    });
    $('#audioTool').mouseleave(function(){
        $music.prop("controls", false);
    });
    $icon.click(function(){
        if ( $icon.attr('src') == 'img/audio/music-off.png'){
            $icon.removeAttr('src');
            $icon.attr('src', 'img/audio/music-on.png');
        } else {
            $icon.removeAttr('src');
            $icon.attr('src', 'img/audio/music-off.png');
        }
    });

    /*
    ===============================================
        TABLEAU DES COULEURS JQUERY
    ===============================================
    */
    $couleurs = ["red", "MediumBlue", "yellow", "darkgreen", "black", "Indigo", "DarkRed", "deeppink", "DarkOrange"];
    $couleursOrder = [].concat($couleurs);


    /*
    ===============================================
        FONCTION SCHUFFLE JQUERY
    ===============================================
    */
    // Tri aléatoire des éléments d'un tableau
    function shuffle($tab) {
        $j = 0;
        $valI = '';
        $valJ = $valI;
        $l = $tab.length - 1;
        while ($l > -1) {
            $j = Math.floor(Math.random() * $l);
            $valI = $tab[$l];
            $valJ = $tab[$j];
            $tab[$l] = $valJ;
            $tab[$j] = $valI;
            $l = $l - 1;
        }
        return $tab;
    }

    /*
    ===============================================
        FONCTION SUITE RANDOM
    ===============================================
    */
    // Position aléatoire d'un tableau
    function suiteRandom() {
        $suites=[];
        $x1=[];
        $x2=[];

        for($y=0; $y<$nbFormes; $y++){
            $suites[$y]=$y;
        }
    }

    /*
    ===============================================
        INITIALISATION DU PLUGIN ION.SOUNDS
    ===============================================
    */
    ion.sound({
        sounds: [
            {
                name: "success",
                volume: 0.1
            },
            {
                name: "success_level",
                volume: 0.1
            },
            {
                name: "success_game",
                volume: 0.2
            }
        ],
        volume: 0.2,
        path: "sounds/",
        preload: true
    });

    $bruit = $('#toggleBruit');
    $bruit.click(function(){
        if ( $bruit.attr('src') == 'img/audio/bruit-off.png'){
            $bruit.removeAttr('src');
            $bruit.attr('src', 'img/audio/bruit-on.png');
        } else {
            $bruit.removeAttr('src');
            $bruit.attr('src', 'img/audio/bruit-off.png');
        }
    });

    /*
    ###############################################
    ==================== JEU ======================
    ###############################################
    */

    // début du jeu
    $nbEtoiles = '';
    $nbClick = 0;
    $nbCarres = 3;
    $nbFormes = 0;
    $nbCouleurs = 0;
    $dureeTotale = 0;
    $scoreEtoiles = 0;
    $nbLevels = 10;

    let nbClick = $nbClick;

    // Variable date pour les cookies
    let date = new Date(Date.now() + 86400000); //86400000ms = 1 jour
    date = date.toUTCString();

    // Niveau de difficulté
    $difficulte = '';
    $choixJoueur = $('#choixDiff').text();
    $snapTolerance = 0;
    console.log($choixJoueur);
    if ($choixJoueur == 'facile'){
        $difficulte = "pointer";
        $snapTolerance = 20;
    }
    if ($choixJoueur == 'moyen'){
        $difficulte = "intersect";
        $snapTolerance = 10;
    }
    if ($choixJoueur == 'difficile'){
        $difficulte = "fit";
        $snapTolerance = 0;
    }


/*
===================================================================================
    DEBUT FONCTIONS AFFICHAGE 2EME PARTIE : NIVEAUX 5 A 8
===================================================================================
*/
    // Fonctions JS pour afficher les formes géométriques en fonction du niveau
    $d=0;
    function formesCible() {
        $formesCibles = [];
        // $difficulte =="fit" ? $d = "17%" : $d = "16%";
        if ($difficulte == "fit"){
            if (window.innerWidth<1000){
                $d="17%";
            } else {
                $d="16%";
            }
        } else {
            $d = "15%";
        }
        for($z=0; $z<$nbFormes; $z++){
            $formesCibles[$z] = '<canvas id="formeCible'+$z+'" width="100" height="100" style ="width :'+$d+' ; height : auto ;" class="draggable mx-3 mb-2"></canvas><br>';
        }
    }

    function formesOrigine() {
        $formes = [];
        for($z=0; $z<$nbFormes; $z++){
            $formes[$z] = '<canvas id="forme'+$z+'" width="100" height="100" style ="width :8% ; height : auto; z-index: 999" class="bg-darky2 mx-3"></canvas><br>';
        }
    }
/*
===================================================================================
    FIN FONCTIONS AFFICHAGE 2EME PARTIE : NIVEAUX 5 A 8
===================================================================================
*/



/*
===============================================
    DEBUT FONCTION DRAG AND DROP TERMINE
===============================================
*/
    function affich(){
        $('#containerOrigin').hide();
        if ($nbClick > 8 && $nbClick <= 10){
            $('#panier_1').remove();
            $('#panier_2').remove();
        }

        // Détermination de la durée
        $fin = new Date();
        $finMs = $fin.getTime();
        $duree = ($finMs - $debutMs) / 1000;
        $dureePartieParLevel.push($duree);
        if ($nbClick == 10){
            $finPartieMs = $finMs;
        }

        if ($nbClick <= 9){
            //Gestion des affichages
            $('#containerCible').css("background-image", "none");
            if (($nbClick < 9)){
                $('#containerCible').css("bottom", "80%");
            } else {
                $('#containerCible').css("bottom", "80%").css("right", "80%");
            }
            $('#cible').css("bottom", "72%");
            $('.reussiteCorrespondance_'+$rand).hide();
            $('#nextLevel').fadeIn(500);

            // Gestion des effets audio
            if ( $bruit.attr('src') == 'img/audio/bruit-on.png'){
                ion.sound.play("success_level");
            }
        }

        // Détermination du score (= le nombre d'étoiles)
        $('#successLevel').removeAttr('src');
        if ($duree < parseInt($("#3et_level_"+$nbClick).html())){
            $nbEtoiles = 3;
            $('#successLevel').attr('src', 'img/game/3etoiles-500.png');
        } else if ($duree > parseInt($("#2et_level_"+$nbClick).html())){
            $nbEtoiles = 1;
            $('#successLevel').attr('src', 'img/game/1etoile-500.png');
        } else {
            $nbEtoiles = 2;
            $('#successLevel').attr('src', 'img/game/2etoiles-500.png');
        }

        $scorePartieParLevel.push($nbEtoiles);
        $scoreEtoiles = $scoreEtoiles + $nbEtoiles;
        $('#scoreAffiche').text($scoreEtoiles);
        $scoreTotalAfficher = parseInt($scoreTotal) + parseInt($scoreEtoiles);
        $('#scoreCumul').text($scoreTotalAfficher);
        console.log("####################################################################################################");
        console.log("level "+$nbClick);
        console.log("Temps réalisé (en s) : " +$duree);
        console.log("Nombre d'étoiles gagnées dans ce niveau: "+$nbEtoiles);
        console.log("Nombre d'étoiles cumulées au cours de la partie : "+$scoreEtoiles);
        console.log("Tab qui renvoie le score par niveau : "+$scorePartieParLevel);
        console.log("Tab qui renvoie le temps réalisé par level : " +$dureePartieParLevel);
        console.log("####################################################################################################");
        let score = $nbEtoiles;
        document.cookie = 'score'+nbClick+'='+score+'; path=/; expires=' + date;
        let temps = $duree;
        document.cookie = 'temps'+nbClick+'='+temps+'; path=/; expires=' + date;
    }
/*
===============================================
    FIN FONCTION DRAG AND DROP TERMINE
===============================================
*/

    //Déclaration des variables relatives au score
    $scoreTotal = $('#scoreCumulInit').text();
    $scoreTotalAfficher = parseInt($scoreTotal);
    $('#scoreCumul').text($scoreTotalAfficher);

    //Déclaration des tableaux qui vont contenir le score et la durée de chaque niveau
    $dureePartieParLevel = [];
    $scorePartieParLevel = [];

    //Ecouteur sur le clic "niveau suivant"
    $('.ecouteurJeu').click(function () {

        //Préparation pour création de cokkie de durée avec Date()
        $debut = new Date();
        $debutMs = $debut.getTime();
        $debutPartieMs = $debutMs;
        $nbClick++;
        console.log("Début (en ms) du level "+$nbClick+" : "+$debutMs);
        console.log("le nombre de clicks est de "+$nbClick);

            $i=$nbClick;
            nbClick = $i;
            if($nbClick<9){
                $('#containerCible').css("background-image", "url('../img/tab-f2.png')");
                $('#containerCible').css("bottom", "10%");
                $('#cible').css("bottom", "52%");
                couleurTab=[];
            }

            if ($nbClick==1){
                $('div').remove('.radialtimer');
                // Passage en fullscreen si le viewport est inférieur à 890px de large + mise en place des icones "fullscreen"
                if (window.innerWidth < 890){
                    GoInFullscreen($("#element").get(0));
                    $('#fullScreen').attr('src', 'img/reduce-128-blue.png');
                    $('.fullScreen').css('display', 'initial');
                } else {
                    $('#fullScreen').attr('src', 'img/expand-128-blue.png');
                    $('.fullScreen').css('display', 'initial');
                }

                // Gestion des 2 containers du jeu : Origine (cf. drag) et Cible (cf. drop)
                $('#lancerJeu').fadeOut(500, function(){
                    $('#containerOrigin').fadeIn(600);
                });
                $('#score').fadeIn(600);
                $('#player').fadeIn(600);
            }
            if($nbClick>1){
                $('#containerOrigin').fadeIn(600);
                $('#levelNumber').text('Niveau '+$i);
                $('#successLevel').removeAttr('src');
                $('#nextLevel').fadeOut(500);
            }
            if($nbClick<5){
                /*
                ===================================================================================
                    1ERE PARTIE : NIVEAUX 1 A 4 (APPRENTISSAGE DES COULEURS UNIQUEMENT)
                ===================================================================================
                */
                $nbCarres=3+2*($i-1);
                $nbCouleurs=3+2*($i-1);
                $couleurs = shuffle($couleurs);
                $couleursNiv = $couleursOrder.slice(0,$nbCouleurs);
                $couleurCibles = shuffle($couleursNiv);

                // Gestion de la difficulté (plus le niveau est facile, plus le magnétisme est important)
                $d=0;
                if ($difficulte == "fit"){
                    if (window.innerWidth<1000){
                        $d="18%";
                    } else {
                        $d="16%";
                    }
                } else {
                    $d = "15%";
                }

                // Ajout dans le DOM des DIV des carrés cibles et des DIV de la palette color
                for ($i = 0; $i <$nbCarres; $i++) {
                    $('#cible').append('<canvas id="carre_'+$i+'" width="100" height="100" style ="width :'+$d+' ; height : auto ;" class="draggable mx-2 mb-2"></canvas>'); // DIV CARRES CIBLES
                }
                $('#origin').empty();
                for ($i = 0; $i < $couleurs.length; $i++){
                    $('#origin').append('<canvas id="carre_'+$couleurs[$i]+'" width="80" height="80"  style ="width :8% ; height : auto ; z-index: 999;" class="bg-darky mx-2"></canvas>'); // DIV CARRES DE LA COLOR PALETTE
                }

                // CALCUL DU RANDOM DES COULEURS DE LA COLOR PALETTE
                for($i=0;$i<$couleurs.length;$i++){
                    carre("carre_"+$couleurs[$i], 0, 0, 80, 0, $couleurs[$i]);
                }

                // RANDOM DES $nbCouleurs PREMIERES COULEURS DU TABLEAU
                $couleursNiv = $couleursOrder.slice(0,$nbCouleurs);
                $couleurCibles = shuffle($couleursNiv);
                for($i=0;$i<$nbCouleurs;$i++){
                    carre("carre_"+$i, 10, 10, 80, "black", $couleurCibles[$i]);
                }
                console.log("$couleurCibles : random des n premieres couleurs de la palette (par level) : "+$couleurCibles);
                console.log("$couleurs : doit censé renvoyé un random de la color palette : "+$couleurs);
                console.log (window.innerWidth);

                /*
                ===================================================================================
                    TECHNIQUE DU DRAG & DROP (LEVELS 1 A 4)
                ===================================================================================
                */

                // Caractéristiques des éléments "draggable"
                for ($i = 0; $i <9; $i++) {
                    $("#carre_"+$couleurs[$i]).draggable ({
                        containment : 'body',
                        snap: '.draggable',
                        snapTolerance: $snapTolerance,
                        revert : 'invalid',
                        cursor: 'pointer',
                    });
                }

                $nb=0;
                // Caractéristiques des éléments "droppables"
                for ($i = 0; $i <$nbCarres; $i++) {
                    // $rand = Math.floor(Math.random() * Math.floor(6));
                    // $reussite = '.reussiteCorrespondance_'+$possibilites[$rand-1];
                    $("#carre_"+$i).droppable ({
                        // Détermination du "match" entre le drop et le drag
                        accept :  "#carre_"+$couleurCibles[$i],
                        // Prise en compte de la difficulté
                        tolerance: $difficulte,
                        // Evenements lorsqu'un drag & drop est réalisé
                        drop: function(event, ui){
                            if ( $bruit.attr('src') == 'img/audio/bruit-on.png'){
                                ion.sound.play("success");
                            }
                            $(ui.draggable).remove();
                            $rand=Math.floor(Math.random() * Math.floor(13)) + 1;
                            console.log($rand);
                            $('.reussiteCorrespondance_'+$rand).show().fadeIn(500)
                            .delay(1200)
                            .fadeOut(200, function(){
                                $(this).hide();
                            });
                            $(this).effect("pulsate")
                            .addClass("correct")
                            .delay(1000)
                            .fadeOut(300, function() {
                                $(this).remove();
                                $nb++;

                                // Evenements lorsque tous les drag & drop sont réalisés (= lorsque le niveau est terminé)
                                if($nb == $nbCarres){
                                    affich();
                                }
                            });
                        }
                    });
                }
            }

            if($nbClick >4 && $nbClick<9){
                /*
                ===================================================================================
                    2EME PARTIE : NIVEAUX 5 A 8 (APPRENTISSAGE DES FORMES)
                ===================================================================================
                */
                $nbFormes = -2+$i;
                nbFormes = -2+$i;
                couleurTab[$i-5] = [];
                $('#cible').empty();
                $('#origin').empty();

                // On mélange les positions du tableau de couleurs :
                couleurTab[$i-5] = shuffle(couleursOrder);
                couleurTab[$i-5] = [].concat(couleurTab[$i-5]);
                console.log(couleurTab);
                suiteRandom();

                // On random l'ordre d'apparition :
                // - des formes Cibles : x1
                $x1 = shuffle($suites);
                $x1 = [].concat($x1);
                formesCible();
                for ($j=0; $j<$formesCibles.length; $j++){
                    $('#cible').append($formesCibles[$x1[$j]]);
                }

                // - des formes Origines : x2
                $x2 = shuffle($x1);
                $x2 = [].concat($x2);
                formesOrigine();
                for ($j=0; $j<$formes.length; $j++){
                    $('#origin').append($formes[$x2[$j]]);
                }

                // Affichage random des couleurs et de la position des figures (et random du type de figure pour la dernière)
                if($i >= 5){
                    cercle("formeCible0", "black", couleurTab[$i-5][0]);
                    triangle("formeCible1", "black", couleurTab[$i-5][3]);
                    carre("formeCible2", 10, 10, 80, "black", couleurTab[$i-5][2]);

                    cercle("forme0", "black", couleurTab[$i-5][0]);
                    triangle("forme1", "black", couleurTab[$i-5][3]);
                    carre("forme2", 10, 10, 80, "black", couleurTab[$i-5][2]);

                    if ($i >= 6){
                        etoile("formeCible3", 50, 52, 5, 45, 25, "black", couleurTab[$i-5][1]);
                        etoile("forme3", 50, 52, 5, 45, 25, "black", couleurTab[$i-5][1]);

                        if ($i >= 7){
                            carre("formeCible4", 10, 10, 80, "black", couleurTab[$i-5][4]);
                            carre("forme4", 10, 10, 80, "black", couleurTab[$i-5][4]);

                            if ($i == 8){
                                $random = Math.floor(Math.random() * Math.floor(3));
                                if ($random == 0){
                                    triangle("formeCible5", "black", couleurTab[$i-5][5]);
                                    triangle("forme5", "black", couleurTab[$i-5][5]);
                                }
                                if ($random == 1){
                                    cercle("formeCible5", "black", couleurTab[$i-5][5]);
                                    cercle("forme5", "black", couleurTab[$i-5][5]);
                                }
                                if ($random == 2){
                                    etoile("formeCible5", 50, 52, 5, 45, 25, "black", couleurTab[$i-5][5]);
                                    etoile("forme5", 50, 52, 5, 45, 25, "black", couleurTab[$i-5][5]);
                                }
                            }
                        }
                    }
                }
                /*
                ===================================================================================
                    TECHNIQUE DU DRAG & DROP (LEVELS 5 A 8)
                ===================================================================================
                */
                // Caractéristiques des éléments "draggable"
                for ($j = 0; $j < $nbFormes; $j++) {
                    $('#forme' + $j).draggable({
                        containment: 'body',
                        snap: '.draggable',
                        snapTolerance: $snapTolerance,
                        revert: 'invalid',
                        cursor: 'pointer',
                    });
                }

                $nb = 0;
                // Caractéristiques des éléments "droppables"
                for ($j = 0; $j < $nbFormes; $j++) {
                    $('#formeCible' + $j).droppable({
                        // Détermination du "match" entre le drop et le drag
                        accept: '#forme' + $j,
                        // Prise en compte de la difficulté
                        tolerance: $difficulte,
                        // Evenements lorsqu'un drag & drop est réalisé
                        drop: function (event, ui) {
                            if ($bruit.attr('src') == 'img/audio/bruit-on.png'){
                                ion.sound.play("success");
                            }
                            $(ui.draggable).remove();
                            $rand=Math.floor(Math.random() * Math.floor(13)) + 1;
                            console.log($rand);
                            $('.reussiteCorrespondance_'+$rand).show().fadeIn(500)
                            .delay(1200)
                            .fadeOut(200, function () {
                                $(this).hide();
                            });
                            $(this).effect("pulsate")
                            .addClass("correct")
                            .delay(500)
                            .fadeOut(300, function () {
                                $(this).remove();
                                $nb++;

                                // Evenements lorsque tous les drag & drop sont réalisés (= lorsque le niveau est terminé)
                                if ($nb == $nbFormes) {
                                    affich();
                                }
                            });
                        }
                    });
                }
            }
            if($nbClick>=9){
                $nbFruits = 6;
                $ordre = [0, 1, 2, 3, 4, 5];
                $desordre = shuffle($ordre);
                $desordreFix = [].concat($desordre);
                $coul_ok=[['orange_ok', 'vert_ok'], ['jaune_ok', 'rouge_ok']];

                $('#levelNumber').text('Niveau '+$nbClick);
                $('#containerOrigin').css("background-image", "url('../img/wood2.png')");
                $('#containerOrigin').fadeIn(600);
                $('#nextLevel').fadeOut(500);
                $('#successLevel').removeAttr('src');

                // Gestion affichage
                if ($nbClick === 9) {
                    nbClick = 9;
                    $('.rowFlex').css('flex-wrap', 'nowrap');
                    $('#containerCible').css('bottom', '10%').css('width', '90%').css('right', '5%');
                    $('.cible').css('position', 'static').css('width', '100%').css('margin-top', '3vw');
                    $('body').css("background-image", "url('../img/fond-sans-soleil.png')");
                    $('#cible').removeClass('align-items-center justify-content-center');
                }

                // Gestion affichage
                if ($nbClick === 10) {
                    nbClick = 10;
                    $('#containerCible').css("bottom", "10%").css('width', '90%').css('right', '5%');
                    $('#cible').css("bottom", "52%");
                    $('#panier_1').empty();
                    $('#panier_2').empty();
                }

                // Injection dans le DOM des bonnes couleurs aux paniers 1 et 2
                $('#cible').append('<div id="panier_1" class="draggable panier-gauche d-inline-block"><img src="../img/game/'+$coul_ok[$nbClick-9][0]+'.png" width="200" class="panier panier-flex img-fluid" alt="Panier de fruits"></div>');
                $('#cible').append('<div id="panier_2" class="draggable panier-droite d-inline-block"><img src="../img/game/'+$coul_ok[$nbClick-9][1]+'.png" width="200" class="panier panier-flex img-fluid" alt="Panier de fruits"></div>');
                $('.correct').css('display', 'none');

                // Préparation des éléments drop
                $('#origin').empty();
                $panier1Drop = [];
                $panier2Drop = [];
                $('#origin').removeClass('origin').addClass('originFruits');

                // Pour chacun des 2 niveaux, on fixe un ordre de référence des éléments sources
                if ($nbClick === 9) {
                    $fruitsImg = ['vert-avocat', 'vert-citron', 'vert-kiwi', 'orange-ananas', 'orange-carotte', 'orange-orange'];
                }
                if ($nbClick === 10) {
                    $fruitsImg = ['jaune-ananas', 'jaune-banane', 'jaune-citron', 'rouge-pomme', 'rouge-cerises', 'rouge-fraise'];
                }

                // On affiche les éléments cibles de façon random, à la position $desordreFix[$i]
                for ($i = 0; $i < $nbFruits; $i++) {
                    $('#origin').append('<img id="fruitCible_' + $i + '" src="../img/game/fruits/' + $fruitsImg[$desordreFix[$i]] + '.png" class="maxHeigth mx-3" width="50" alt="Fruit"></div>');
                    $x = ($('#fruitCible_' + $i).attr('src').slice(19, 22));
                    $id = "fruitCible_" + $i;
                    $x === 'ora' ? $panier1Drop.push($id) : $panier2Drop.push($id);
                }
                for ($i = 0; $i < $nbFruits; $i++) {
                    if (($('#fruitCible_' + $i).attr('src').slice(19, 22)) == 'ora' || ($('#fruitCible_' + $i).attr('src').slice(19, 22)) == 'jau') {
                        $('#fruitCible_' + $i).addClass('drop1');
                    }else{
                        $('#fruitCible_' + $i).addClass('drop2');
                    }
                }

                /*
                ===================================================================================
                TECHNIQUE DU DRAG & DROP (LEVELS 9 ET 10)
                ===================================================================================
                */
                $nb = 0;
                // Caractéristiques des éléments "draggable"
                for ($i = 0; $i < $nbFruits; $i++) {
                    $('#fruitCible_' + $i).draggable({
                        containment: 'body',
                        snap: '.draggable',
                        snapTolerance: $snapTolerance,
                        revert: 'invalid',
                    });
                }

                // Caractéristiques des éléments "droppables"
                for ($i = 1; $i < 3; $i++) {
                    $('#panier_' + $i).droppable({
                        // Détermination du "match" entre le drop et le drag
                        accept: '.drop'+$i,
                        // Prise en compte de la difficulté
                        tolerance: $difficulte,
                        // Evenements lorsqu'un drag & drop est réalisé
                        drop: function (event, ui) {
                            if ( $bruit.attr('src') == 'img/audio/bruit-on.png'){
                                ion.sound.play("success");
                            }
                            $(ui.draggable).remove();
                            $rand=Math.floor(Math.random() * Math.floor(13)) + 1;
                            console.log($rand);
                            $('.reussiteCorrespondance_'+$rand).show().fadeIn(500)
                                .delay(1200)
                                .fadeOut(200, function () {
                                    $(this).hide();
                                });

                            $(this).addClass("correct").effect("pulsate")
                            .delay(500)
                            .fadeOut(300, function () {
                                $(this).removeClass("correct").delay(1500).fadeOut();
                                $nb++;

                                // Evenements lorsque tous les drag & drop sont réalisés (= lorsque le niveau est terminé)
                                if ($nb == $nbFruits) {
                                    affich();
                                    if($nbClick == 10){
                                        $('#successLevel').delay(2500).hide();
                                        $('#containerCible').css("bottom", "70%");
                                        $dureePartie = 0;
                                        $dureePartieMinutes = 0;
                                        $dureePartieSecondes = 0;

                                        if ( $icon.attr('src') == 'img/audio/music-on.png' && $bruit.attr('src') == 'img/audio/bruit-on.png'){
                                            var myMusic = document.getElementById("music");
                                            myMusic.pause();
                                            ion.sound.play("success_game");
                                        }

                                        /*
                                        ===================================================================================
                                            ANIMATION FIN DE JEU
                                        ===================================================================================
                                        */
                                        // On fait un random d couleurs
                                        const colors = ["#3CC157", "#2AA7FF", "#1B1B1B", "#FCBC0F", "#F85F36"];
                                        const numBalls = 100;
                                        const balls = [];
                                        for (let i = 0; i < numBalls; i++) {
                                            let ball = document.createElement("div");
                                            ball.classList.add("ball");
                                            ball.style.background = colors[Math.floor(Math.random() * colors.length)];
                                            ball.style.left = `${Math.floor(Math.random() * 100)}vw`;
                                            ball.style.top = `${Math.floor(Math.random() * 100)}vh`;
                                            ball.style.transform = `scale(${Math.random()})`;
                                            ball.style.width = `${Math.random()}em`;
                                            ball.style.height = ball.style.width;
                                            balls.push(ball);
                                            document.body.append(ball);
                                        }

                                        // Keyframes : séquences de l'animation
                                        balls.forEach((el, i, ra) => {
                                        let to = {
                                            x: Math.random() * (i % 2 === 0 ? -11 : 11),
                                            y: Math.random() * 12
                                        };
                                        let anim = el.animate(
                                            [
                                                { transform: "translate(0, 0)" },
                                                { transform: `translate(${to.x}rem, ${to.y}rem)` }
                                            ],
                                                {
                                                duration: (Math.random() + 1) * 2000, // random duration
                                                direction: "alternate",
                                                fill: "both",
                                                iterations: Infinity,
                                                easing: "ease-in-out"
                                                }
                                            );
                                        });
                                        /*
                                        ===================================================================================
                                            FIN ANIMATION FIN DE JEU
                                        ===================================================================================
                                        */

                                        //Récap des données avec enregistrement des données de la partie (pas eulement des niveaux)
                                        for ($i=0; $i<$dureePartieParLevel.length; $i++){
                                            $dureePartie += $dureePartieParLevel[$i];
                                        }
                                        $dureePartie = Math.round($dureePartie);
                                        $dureePartieMinutes = Math.floor($dureePartie/60);
                                        $dureePartieSecondes = $dureePartie % 60;
                                        console.log("####################################################################################################");
                                        console.log("Temps total en secondes : "+$dureePartie);
                                        console.log("Temps total en min:s : "+$dureePartieMinutes+" : "+$dureePartieSecondes);
                                        console.log("Nombre d'étoiles cumulées au cours de la partie : "+$scoreEtoiles);
                                        console.log("Tab qui renvoie le temps réalisé par level : " +$dureePartieParLevel);
                                        console.log("####################################################################################################");
                                        $('#gameFinished').show(100);
                                        $('#gameEnd').show(300);

                                        // Affichage de fin de jeu
                                        $('#gameFinished').append('<span id="msgGameFinished" class="msgVictoire">Bravo, tu as gagné '+$scoreEtoiles+' etoiles au cours de cette partie !"</span><br>');
                                        $('#gameFinished').append('<span id="msgGameFinished" class="msgVictoire">Tu as terminé Color-Drop en '+$dureePartieMinutes+' minutes et '+$dureePartieSecondes+ ' secondes.</span>');

                                        let scoreTotal = $scoreEtoiles;
                                        document.cookie = 'scoreTotal='+scoreTotal+'; path=/; expires=' + date;
                                    }
                                }
                                $('#panier_' + $i).removeClass("correct");
                            });
                        }
                    });
                }
            }

    });
});
/**********************************************************************/
