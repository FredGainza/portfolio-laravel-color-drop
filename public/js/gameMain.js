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
    var R = 45
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
    ctx.moveTo(cx, cy - outerRadius)
    for (i = 0; i < spikes; i++) {
        x = cx + Math.cos(rot) * outerRadius;
        y = cy + Math.sin(rot) * outerRadius;
        ctx.lineTo(x, y)
        rot += step

        x = cx + Math.cos(rot) * innerRadius;
        y = cy + Math.sin(rot) * innerRadius;
        ctx.lineTo(x, y)
        rot += step
    }
    ctx.lineTo(cx, cy - outerRadius)
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
let couleurs = ["red", "blue", "yellow", "green", "purple", "maroon", "hotpink", "darkorange"];
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
    })

    /*
    ===============================================
        TABLEAU DES COULEURS JQUERY
    ===============================================
    */
    $couleurs = ["red", "blue", "yellow", "green", "black", "purple", "maroon", "hotpink", "darkorange"];
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
        $snapTolerance = 5;
    }

    $scoreTotal = $('#scoreCumulInit').text();
    $scoreTotalAfficher = parseInt($scoreTotal);
    $('#scoreCumul').text($scoreTotalAfficher);

    $dureePartieParLevel = [];
    $scorePartieParLevel = [];
    $('.ecouteurJeu').click(function () {

        $debut = new Date();
        $debutMs = $debut.getTime();
        $debutPartieMs = $debutMs;
        $nbClick++;
        console.log("Début (en ms) du level "+$nbClick+" : "+$debutMs);
        console.log("le nombre de clicks est de "+$nbClick)

        if($nbClick === 1){
            nbClick = 1;
            $('div').remove('.radialtimer');
            if (window.innerWidth < 890){
                GoInFullscreen($("#element").get(0));
                $('#fullScreen').attr('src', 'img/reduce-128-blue.png');
                $('.fullScreen').css('display', 'initial');
            } else {
                $('#fullScreen').attr('src', 'img/expand-128-blue.png');
                $('.fullScreen').css('display', 'initial');
            }

            $('#lancerJeu').fadeOut(500, function(){
                $('#containerOrigin').fadeIn(600);
            })
            $('#containerCible').css("background-image", "url('../img/tab-f2.png')");

            $('#score').fadeIn(600);
            $('#player').fadeIn(600);
            $nbCarres=3;
            $nbCouleurs=3;
        } else if ($nbClick === 2){
            $('#containerCible').css("background-image", "url('../img/tab-f2.png')");
            $('#containerCible').css("bottom", "10%");
            $('#cible').css("bottom", "52%");
            nbClick = 2;
            $nbCarres=5;
            $nbCouleurs=5;
        } else if ($nbClick === 3){
            $('#containerCible').css("background-image", "url('../img/tab-f2.png')");
            $('#containerCible').css("bottom", "10%");
            $('#cible').css("bottom", "52%");
            nbClick = 3;
            $nbCarres=7;
            $nbCouleurs=7;
        } else if ($nbClick === 4){
            $('#containerCible').css("background-image", "url('../img/tab-f2.png')");
            $('#containerCible').css("bottom", "10%");
            $('#cible').css("bottom", "52%");
            nbClick = 4;
            $nbCarres=9;
            $nbCouleurs=9;
        }

        if($nbClick< 5){
            $('#successLevel').removeAttr('src');
            $('#levelNumber').text('Niveau '+$nbClick);
            $('#nextLevel').fadeOut(500);
            // Random de la palette de couleur
            for($position=$couleurs.length-1; $position>=1; $position--){
                //hasard reçoit un nombre entier aléatoire entre 0 et position
                $hasard=Math.floor(Math.random()*($position+1));

                //Echange
                $sauve=$couleurs[$position];
                $couleurs[$position]=$couleurs[$hasard];
                $couleurs[$hasard]=$sauve;
            }

            /*
            ===================================================================================
                1ERE PARTIE : NIVEAUX 1 A 4 (APPRENTISSAGE DES COULEURS UNIQUEMENT)
            ===================================================================================
            */

            // AJOUT DANS LE DOM DES DIV DES CARRES CIBLES ET DES DIV DE LA PALETTE COLOR

            if ($difficulte == "fit"){
                if (window.innerWidth<1000){
                    $d="18%";
                } else {
                    $d="17%";
                }
            } else {
                $d = "16%";
            }

            for ($i = 0; $i <$nbCarres; $i++) {
                $('#cible').append('<canvas id="carre_'+$i+'" width="100" height="100" style ="width :'+$d+' ; height : auto ;" class="draggable mx-2 mb-2"></canvas>'); // DIV CARRES CIBLES
            }

            $('#origin').empty();
            for ($i = 0; $i < $couleurs.length; $i++){
                $('#origin').append('<canvas id="carre_'+$couleurs[$i]+'" width="80" height="80"  style ="width :8% ; height : auto ;" class="bg-darky mx-2"></canvas>'); // DIV CARRES DE LA COLOR PALETTE
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

            for ($i = 0; $i <9; $i++) {
                $("#carre_"+$couleurs[$i]).draggable ({
                    containment : 'body',
                    snap: '.draggable',
                    snapTolerance: '0',
                    revert : 'invalid',
                    cursor: 'pointer',
                });
            }

            $nb=0;
            for ($i = 0; $i <$nbCarres; $i++) {

                $("#carre_"+$i).droppable ({
                    accept :  "#carre_"+$couleurCibles[$i],
                    tolerance: $difficulte,
                    drop: function(event, ui){
                        if ( $bruit.attr('src') == 'img/audio/bruit-on.png'){
                            ion.sound.play("success");
                        };
                        $(ui.draggable).remove();
                        $('.reussiteCorrespondance').show().fadeIn(500)
                        .delay(1200)
                        .fadeOut(200, function(){
                            $('.reussiteCorrespondance').hide();
                        });
                        // $(this).effect("bounce", { times: 3 }, "slow")
                        $(this).effect("pulsate")
                        .addClass("correct")
                        .delay(1000)
                        .fadeOut(300, function() {
                            $(this).remove();
                            $nb++;
                            if($nb == $nbCarres){
                                $('#containerCible').css("background-image", "none");
                                $('#containerCible').css("bottom", "80%");
                                $('#cible').css("bottom", "72%");
                                $('.reussiteCorrespondance').hide();
                                $fin = new Date();
                                $finMs = $fin.getTime();
                                $duree = ($finMs - $debutMs) / 1000;
                                $dureePartieParLevel.push($duree);
                                $('#nextLevel').fadeIn(500);

                                if ( $bruit.attr('src') == 'img/audio/bruit-on.png'){
                                    ion.sound.play("success_level");
                                };

                                // DETERMINATION DU NOMBRE D'ETOILES
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
                        });
                    }
                });

            };
        }

        /*
        ===================================================================================
            2EME PARTIE : NIVEAUX 5 A 8 (APPRENTISSAGE DES FORMES)
        ===================================================================================
        */

        // FONCTIONS JS POUR AFFICHER FORMES GEOMETRIQUES EN FONCTION DU NIVEAU
        $d=0;

        function formesCible() {
            $formesCibles = [];
            $difficulte =="fit" ? $d = "17%" : $d = "16%";
            for($i=0; $i<$nbFormes; $i++){
                $formesCibles[$i] = '<canvas id="formeCible'+$i+'" width="100" height="100" style ="width :'+$d+' ; height : auto ;" class="draggable mx-3 mb-1"></canvas><br>';
            }
        }

        function formesOrigine() {
            $formes = [];
            for($i=0; $i<$nbFormes; $i++){
                $formes[$i] = '<canvas id="forme'+$i+'" width="100" height="100" style ="width :9% ; height : auto ;" class="bg-darky2 mx-3"></canvas><br>';
            }
        }


        // LEVEL 5 : 3 FIGURES GEOMETRIQUES
        if ($nbClick === 5) {
            nbClick = 5;
            $('#levelNumber').text('Niveau '+$nbClick);
            $('#successLevel').removeAttr('src');
            $('#nextLevel').fadeOut(500);
            $nbFormes = 3;
            nbFormes = 3;
            $('#containerCible').css("background-image", "url('../img/tab-f2.png')");
            $('#containerCible').css("bottom", "10%");
            $('#cible').css("bottom", "52%");
            $('#cible').empty();
            $('#origin').empty();
            let couleursMelange3 = shuffle(couleursOrder);
            couleursMelange3 = [].concat(couleursMelange3);
            let couleursNiv3 = couleursMelange3;
            console.log(couleursNiv3);

            $x1=[];
            $x1 = shuffle([0, 1, 2]);
            $x1 = [].concat($x1);

            formesCible();

            for ($i=0; $i<$formesCibles.length; $i++){
                $('#cible').append($formesCibles[$x1[$i]]);
            }

            cercle("formeCible0", "black", couleursNiv3[0]);
            triangle("formeCible1", "black", couleursNiv3[1]);
            carre("formeCible2", 10, 10, 80, "black", couleursNiv3[2]);

            formesOrigine();

            $x2=[];
            $x2 = shuffle($x1);
            $x2 = [].concat($x2);

            for ($i=0; $i<$formes.length; $i++){
                $('#origin').append($formes[$x2[$i]]);
            }

            cercle("forme0", "black", couleursNiv3[0]);
            triangle("forme1", "black", couleursNiv3[1]);
            carre("forme2", 10, 10, 80, "black", couleursNiv3[2]);

        // LEVEL 6 : 4 FIGURES GEOMETRIQUES
        } else if ($nbClick === 6) {
            nbClick = 6;
            $('#levelNumber').text('Niveau '+$nbClick);
            $('#successLevel').removeAttr('src');
            $('#nextLevel').fadeOut(500);
            $nbFormes = 4;
            nbFormes = 4;
            $('#containerCible').css("background-image", "url('../img/tab-f2.png')");
            $('#containerCible').css("bottom", "10%");
            $('#cible').css("bottom", "52%");
            let couleursMelange4 = shuffle(couleursOrder);
            couleursMelange4 = [].concat(couleursMelange4);
            let couleursNiv4 = couleursMelange4;
            console.log(couleursNiv4);
            $('#cible').empty();
            $('#origin').empty();

            $x1=[];
            $x1 = shuffle([0, 1, 2, 3]);
            $x1 = [].concat($x1);

            formesCible();

            for ($i=0; $i<$formesCibles.length; $i++){
                $('#cible').append($formesCibles[$x1[$i]]);
            }

            cercle("formeCible0", "black", couleursNiv4[0]);
            etoile("formeCible1", 50, 52, 5, 45, 25, "black", couleursNiv4[1]);
            cercle("formeCible2", "black", couleursNiv4[2]);
            triangle("formeCible3", "black", couleursNiv4[3]);

            formesOrigine();

            $x2=[];
            $x2 = shuffle($x1);
            $x2 = [].concat($x2);

            for ($i=0; $i<$formes.length; $i++){
                $('#origin').append($formes[$x2[$i]]);
            }

            cercle("forme0", "black", couleursNiv4[0]);
            etoile("forme1", 50, 52, 5, 45, 25, "black", couleursNiv4[1]);
            cercle("forme2", "black", couleursNiv4[2]);
            triangle("forme3", "black", couleursNiv4[3]);


        // LEVEL 7 : 5 FIGURES GEOMETRIQUES
        } else if ($nbClick === 7) {
            nbClick = 7;
            $('#levelNumber').text('Niveau '+$nbClick);
            $('#successLevel').removeAttr('src');
            $('#nextLevel').fadeOut(500);
            $nbFormes = 5;
            nbFormes = 5;
            $('#containerCible').css("background-image", "url('../img/tab-f2.png')");
            $('#containerCible').css("bottom", "10%");
            $('#cible').css("bottom", "52%");
            let couleursMelange5 = shuffle(couleursOrder);
            couleursMelange5 = [].concat(couleursMelange5);
            let couleursNiv5 = couleursMelange5;
            console.log(couleursNiv5);
            $('#cible').empty();
            $('#origin').empty();

            $x1=[];
            $x1 = shuffle([0, 1, 2, 3, 4]);
            $x1 = [].concat($x1);

            formesCible();

            for ($i=0; $i<$formesCibles.length; $i++){
                $('#cible').append($formesCibles[$x1[$i]]);
            }

            cercle("formeCible0", "black", couleursNiv5[0]);
            etoile("formeCible1", 50, 52, 5, 45, 25, "black", couleursNiv5[1]);
            cercle("formeCible2", "black", couleursNiv5[2]);
            triangle("formeCible3", "black", couleursNiv5[3]);
            carre("formeCible4", 10, 10, 80, "black", couleursNiv5[4]);

            formesOrigine();

            $x2=[];
            $x2 = shuffle($x1);
            $x2 = [].concat($x2);

            for ($i=0; $i<$formes.length; $i++){
                $('#origin').append($formes[$x2[$i]]);
            }

            cercle("forme0", "black", couleursNiv5[0]);
            etoile("forme1", 50, 52, 5, 45, 25, "black", couleursNiv5[1]);
            cercle("forme2", "black", couleursNiv5[2]);
            triangle("forme3", "black", couleursNiv5[3]);
            carre("forme4", 10, 10, 80, "black", couleursNiv5[4]);

        // LEVEL 8 : 6 FIGURES GEOMETRIQUES
        } else if ($nbClick === 8) {
            nbClick = 8;
            $('#levelNumber').text('Niveau '+$nbClick);
            $('#successLevel').removeAttr('src');
            $('#nextLevel').fadeOut(500);
            $nbFormes = 6;
            nbFormes = 6;
            $('#containerCible').css("background-image", "url('../img/tab-f2.png')");
            $('#containerCible').css("bottom", "10%");
            $('#cible').css("bottom", "52%");
            let couleursMelange6 = shuffle(couleursOrder);
            couleursMelange6 = [].concat(couleursMelange6);
            let couleursNiv6 = couleursMelange6;
            console.log(couleursNiv6);
            $('#cible').empty();
            $('#origin').empty();

            $x1=[];
            $x1 = shuffle([0, 1, 2, 3, 4, 5]);
            $x1 = [].concat($x1);

            formesCible();

            for ($i=0; $i<$formesCibles.length; $i++){
                $('#cible').append($formesCibles[$x1[$i]]);
            }

            cercle("formeCible0", "black", couleursNiv6[0]);
            etoile("formeCible1", 50, 52, 5, 45, 25, "black", couleursNiv6[1]);
            cercle("formeCible2", "black", couleursNiv6[2]);
            carre("formeCible3", 10, 10, 80, "black", couleursNiv6[4]);
            triangle("formeCible4", "black", couleursNiv6[3]);
            triangle("formeCible5", "black", couleursNiv6[5]);

            formesOrigine();

            $x2=[];
            $x2 = shuffle($x1);
            $x2 = [].concat($x2);

            for ($i=0; $i<$formes.length; $i++){
                $('#origin').append($formes[$x2[$i]]);
            }

            cercle("forme0", "black", couleursNiv6[0]);
            etoile("forme1", 50, 52, 5, 45, 25, "black", couleursNiv6[1]);
            cercle("forme2", "black", couleursNiv6[2]);
            carre("forme3", 10, 10, 80, "black", couleursNiv6[4]);
            triangle("forme4", "black", couleursNiv6[3]);
            triangle("forme5", "black", couleursNiv6[5]);
        }

        /*
        ===================================================================================
            TECHNIQUE DU DRAG & DROP (LEVELS 5 A 8)
        ===================================================================================
        */

        for ($i = 0; $i < $nbFormes; $i++) {
            $('#forme' + $i).draggable({
                containment: 'body',
                snap: '.draggable',
                snapTolerance: '0',
                revert: 'invalid',
                cursor: 'pointer',
            });
        }

        $nb = 0;
        for ($i = 0; $i < $nbFormes; $i++) {
            $('#formeCible' + $i).droppable({
                accept: '#forme' + $i,
                tolerance: $difficulte,
                drop: function (event, ui) {
                    if ( $bruit.attr('src') == 'img/audio/bruit-on.png'){
                        ion.sound.play("success");
                    };
                    $(ui.draggable).remove();
                    // $('.reussiteCorrespondance').show().fadeIn(500)
                    $('.reussiteCorrespondance2').show().fadeIn(500)
                    .delay(1200)
                    .fadeOut(200, function () {
                        $('.reussiteCorrespondance2').hide();
                    });
                    $(this).effect("pulsate")
                    .addClass("correct")
                    .delay(500)
                    .fadeOut(300, function () {
                        $(this).remove();
                        $nb++;
                        console.log($nb);
                        if ($nb == $nbFormes) {
                            $('#containerCible').css("background-image", "none");
                            $('#containerCible').css("bottom", "80%");
                            $('#cible').css("bottom", "72%");
                            $fin = new Date();
                            $finMs = $fin.getTime();
                            $duree = ($finMs - $debutMs) / 1000;
                            $dureePartieParLevel.push($duree);
                            $('#nextLevel').fadeIn(500);

                            if ( $bruit.attr('src') == 'img/audio/bruit-on.png'){
                                ion.sound.play("success_level");
                            };

                            // DETERMINATION DU NOMBRE D'ETOILES
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
                            $scoreEtoiles += $nbEtoiles;
                            $('#scoreAffiche').text($scoreEtoiles);
                            $scoreTotalAfficher = parseInt($scoreTotal) + parseInt($scoreEtoiles);
                            $('#scoreCumul').text($scoreTotalAfficher);
                            console.log("####################################################################################################");
                            // console.log("Couleurs random pour le niveau "+nbClick+" : "+couleursMelange+nbFormes);
                            // console.log("Couleurs Niv"+nbClick+" = "+couleurNiv+nbFormes);
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
                    });
                }
            });
        };

        /*
        ===================================================================================
            3EME PARTIE : NIVEAUX 9 A 10 (ASSOCIER COULEURS ET FRUITS)
        ===================================================================================
        */

        $nbFruits = 6;
        $ordre = [0, 1, 2, 3, 4, 5]
        $desordre = shuffle($ordre);
        $desordreFix = [].concat($desordre);

        // LEVEL 9 : 6 FRUITS AVEC COULEURS ORANGE ET VERT
        if ($nbClick === 9) {
            nbClick = 9;
            $('.rowFlex').css('flex-wrap', 'nowrap');
            $('.cible').css('position', 'static').css('width', '100%').css('margin-top', '3vw');

            $('#levelNumber').text('Niveau '+$nbClick);
            $('#successLevel').removeAttr('src');
            $('#nextLevel').fadeOut(500);
            $('body').css("background-image", "url('../img/fond-sans-soleil.png')");
            $('#cible').removeClass('align-items-center justify-content-center');
            $('#cible').append('<div id="panier_1" class="draggable panier-gauche d-inline-block"><img src="../img/game/orange_ok.png" width="200" class="panier panier-flex img-fluid" alt="Panier de fruits"></div>');
            $('#cible').append('<div id="panier_2" class="draggable panier-droite d-inline-block"><img src="../img/game/vert_ok.png" width="200" class="panier panier-flex img-fluid" alt="Panier de fruits"></div>');
            $('.correct').css('display', 'none');

            $('#origin').empty();
            $panier1Drop = [];
            $panier2Drop = [];
            $('#origin').removeClass('origin').addClass('originFruits');
            $fruitsImg = ['vert-avocat', 'vert-citron', 'vert-kiwi', 'orange-ananas', 'orange-carotte', 'orange-orange'];
            for ($i = 0; $i < $nbFruits; $i++) {
                $('#origin').append('<img id="fruitCible_' + $i + '" src="../img/game/fruits/' + $fruitsImg[$desordreFix[$i]] + '.png" class="maxHeigth mx-3" width="50" alt="Fruit"></div>');
                $x = ($('#fruitCible_' + $i).attr('src').slice(19, 22));
                $id = "fruitCible_" + $i;
                $x === 'ora' ? $panier1Drop.push($id) : $panier2Drop.push($id);
            }
            for ($i = 0; $i < $nbFruits; $i++) {
                if (($('#fruitCible_' + $i).attr('src').slice(19, 22)) == 'ora'){
                    $('#fruitCible_' + $i).addClass('drop1');
                }else{
                    $('#fruitCible_' + $i).addClass('drop2');
                }
            }
        }

        // LEVEL 10 : 6 FRUITS AVEC COULEURS JAUNE ET ROUGE
        if ($nbClick === 10) {
            nbClick = 10;
            $('#levelNumber').text('Niveau '+$nbClick);
            $('#nextLevel').fadeOut(500);
            $('#containerCible').css("bottom", "10%");
            $('#cible').css("bottom", "52%");
            $('#successLevel').removeAttr('src');
            $('#panier_1').empty();
            $('#panier_2').empty();
            $('#cible').append('<div id="panier_1" class="draggable panier-gauche d-inline-block"><img src="../img/game/jaune_ok.png" class="panier panier-flex img-fluid" alt="Panier de fruits"></div>');
            $('#cible').append('<div id="panier_2" class="draggable panier-droite d-inline-block"><img src="../img/game/rouge_ok.png" class="panier panier-flex img-fluid" alt="Panier de fruits"></div>');
            $('.correct').css('display', 'none');

            $('#origin').empty();
            $panier1Drop = [];
            $panier2Drop = [];
            $('#origin').removeClass('origin').addClass('originFruits');
            $fruitsImg = ['jaune-ananas', 'jaune-banane', 'jaune-citron', 'rouge-pomme', 'rouge-cerises', 'rouge-fraise'];
            for ($i = 0; $i < $nbFruits; $i++) {
                $('#origin').append('<img id="fruitCible_' + $i + '" src="../img/game/fruits/' + $fruitsImg[$desordreFix[$i]] + '.png" class="maxHeigth mx-3" width="50" alt="Fruit"></div>');
                $x = ($('#fruitCible_' + $i).attr('src').slice(19, 22));
                $id = "fruitCible_" + $i;
                $x === 'jau' ? $panier1Drop.push($id) : $panier2Drop.push($id);
            }
            for ($i = 0; $i < $nbFruits; $i++) {
                if (($('#fruitCible_' + $i).attr('src').slice(19, 22)) == 'jau'){
                    $('#fruitCible_' + $i).addClass('drop1');
                }else{
                    $('#fruitCible_' + $i).addClass('drop2');
                }
            }
        }

        /*
        ===================================================================================
            TECHNIQUE DU DRAG & DROP (LEVELS 9 ET 10)
        ===================================================================================
        */

        $nb = 0;
        for ($i = 0; $i < $nbFruits; $i++) {
            $('#fruitCible_' + $i).draggable({
                containment: 'body',
                snap: '.draggable',
                snapTolerance: '0',
                revert: 'invalid',
            });
        }

        for ($i = 1; $i < 3; $i++) {
            $('#panier_' + $i).droppable({
                accept: '.drop'+$i,
                tolerance: $difficulte,
                drop: function (event, ui) {
                    if ( $bruit.attr('src') == 'img/audio/bruit-on.png'){
                        ion.sound.play("success");
                    };
                    $(ui.draggable).remove();
                    $('.reussiteCorrespondance').show().fadeIn(500)
                        .delay(1200)
                        .fadeOut(200, function () {
                            $('.reussiteCorrespondance').hide();
                        });

                    $(this).addClass("correct").effect("pulsate")
                    .delay(500)
                    .fadeOut(300, function () {
                        $(this).removeClass("correct").delay(1500).fadeOut();
                        $nb++;
                        if ($nb == $nbFruits) {
                            $('#panier_1').remove();
                            $('#panier_2').remove();
                            $fin = new Date();
                            $finMs = $fin.getTime();
                            $duree = ($finMs - $debutMs) / 1000;
                            $dureePartieParLevel.push($duree);
                            $finPartieMs = $finMs;

                            if($nbClick <= 10){
                                if($nbClick == 9){
                                    $('#containerCible').css("bottom", "80%");
                                    $('#cible').css("bottom", "72%");
                                    $('#nextLevel').fadeIn(500);
                                    if ( $bruit.attr('src') == 'img/audio/bruit-on.png'){
                                        ion.sound.play("success_level");
                                    };
                                }

                                // DETERMINATION DU NOMBRE D'ETOILES
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
                                $scoreEtoiles += $nbEtoiles
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
                                ("####################################################################################################");
                                let score = $nbEtoiles;
                                document.cookie = 'score'+nbClick+'='+score+'; path=/; expires=' + date;
                                let temps = $duree;
                                document.cookie = 'temps'+nbClick+'='+temps+'; path=/; expires=' + date;
                            }
                            if($nbClick == 10){
                                $('#successLevel').delay(2500).hide();
                                $('#containerCible').css("bottom", "70%");
                                $dureePartie = 0;
                                $dureePartieMinutes = 0;
                                $dureePartieSecondes = 0;

                                if ( $icon.attr('src') == 'img/audio/music-on.png' && $bruit.attr('src') == 'img/audio/bruit-on.png'){
                                    var myMusic = document.getElementById("music")
                                    myMusic.pause();
                                    ion.sound.play("success_game");
                                }


                                /*
                                ===================================================================================
                                    ANIMATION FIN DE JEU
                                ===================================================================================
                                */
                                // Some random colors
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
                                // Keyframes
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


                                for ($i=0; $i<$dureePartieParLevel.length; $i++){
                                    $dureePartie += $dureePartieParLevel[$i];
                                }
                                $dureePartie = Math.round($dureePartie);
                                $dureePartieMinutes = Math.floor($dureePartie/60);
                                $dureePartieSecondes = $dureePartie % 60;
                                ("####################################################################################################");
                                console.log("Temps total en secondes : "+$dureePartie);
                                console.log("Temps total en min:s : "+$dureePartieMinutes+" : "+$dureePartieSecondes);
                                console.log("Nombre d'étoiles cumulées au cours de la partie : "+$scoreEtoiles);
                                console.log("Tab qui renvoie le temps réalisé par level : " +$dureePartieParLevel);
                                console.log("####################################################################################################");
                                $('#gameFinished').show(100);
                                $('#gameEnd').show(300);

                                $('#gameFinished').append('<span id="msgGameFinished" class="msgVictoire">Bravo, tu as gagné '+$scoreEtoiles+' etoiles au cours de cette partie !"</span><br>');
                                $('#gameFinished').append('<span id="msgGameFinished" class="msgVictoire">Tu as terminé Color-Drop en '+$dureePartieMinutes+' minutes et '+$dureePartieSecondes+ ' secondes. (soit '+$dureePartie+' secondes au total")</span>');

                                let scoreTotal = $scoreEtoiles;
                                document.cookie = 'scoreTotal='+scoreTotal+'; path=/; expires=' + date;

                            }
                        }
                        $('#panier_' + $i).removeClass("correct");

                    });
                }
            });
        };
    })

});
/**********************************************************************/
