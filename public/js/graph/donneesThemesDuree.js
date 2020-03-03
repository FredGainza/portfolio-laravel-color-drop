<?php
    $score = [];
    $dureeGraph = [];

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


var color = Chart.helpers.color;
var donneesThemesDuree = {
    labels:  ['couleurs (niv 1 à 4)', 'formes (niv 5 à 8)', 'objets (niv 9 et 10)'],

    datasets:[{
        <?php for($j=0; $j<$nbParties; $j++) : ?>
        label: "Partie <?= $j+1; ?>",
        <?php $coul = $couleurs[$j%$nbCouleurs]; ?>
        backgroundColor: color(window.chartColors.<?= $coul; ?>).alpha(0.5).rgbString(),
        borderColor: window.chartColors.<?= $coul; ?>,
        borderWidth: 1,
        data:   <?= $dureeGraph[$j]; ?>
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
                text: 'Analyse du score - Données synthétisées par thèmes',
                padding: 30,
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        fontColor: '#edededf7',
                        labelString: 'Thème'
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
                text: 'Analyse du score - Données synthétisées par thèmes',
                padding: 30,
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        fontColor: '#edededf7',
                        labelString: 'Thème'
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

};
