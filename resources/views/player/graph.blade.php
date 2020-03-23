<?php
// graph1 : Données synthétisées par partie
$nbParties = count($games) / 10;
$score = [];
$duree = [];
$label = [];
// dd($nbParties);
for ($i = 0; $i < $nbParties; $i++) {
    $label[$i] = $i + 1 . ' ('.$games[10*$i + 5]->created_at->format('d/m/Y').')';
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
    {{-- <link rel="stylesheet" href="css/parents.min.css"> --}}
    <link rel="stylesheet" href="css/hamburger.css">
    <style>
    body{
        margin: 0 !important;
        min-height: 100vh !important;
        background-color: #1e282a;
        box-sizing: content-box;

    }
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
    }
    .w-85{width: 80% !important;}
	</style>
</head>

<body>
    <button class="btn btn-sm btn-dark py-0 mt-2 ml-3" onclick="history.back()">Retour</button>
	<div class="mx-auto" style="position: relative; height:90vh; width:90vw"">
		<canvas id="myChart"></canvas>
    </div>

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
                label: "Partie <?= $j + 1  . ' ('.$games[10*$j + 5]->created_at->format('d/m/Y').')'; ?>",
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
            label: "Partie <?= $j + 1  . ' ('.$games[10*$j + 5]->created_at->format('d/m/Y').')'; ?>",
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
            window.myBar = new Chart(ctx, {
                type: 'line',
                data: synthParPartie,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            fontSize: 16,
                            fontColor: '#edededf7',
                            padding: 10
                        }
                    },
                    title: {
                        display: true,
                        fontColor: '#fda77c',
                        fontSize: '26',
                        fontStyle: false,
                        text: 'Données synthétiques par partie',
                        padding: 20
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                fontSize: 16,
                                padding: 10,
                                fontColor: '#edededf7',
                                labelString: 'Numéro de la partie'
                            },
                            ticks: {
                                fontSize: 14,
                                fontColor: '#edededf7'
                            }
                        }],
                        yAxes: [{
                            type: 'linear',
                            gridLines: {
                                color: 'rgba(50, 55, 57, 0.94)',
                            },
                            display: true,
                            scaleLabel: {
                                display: true,
                                fontSize: 16,
                                padding: 10,
                                fontColor: '#edededf7',
                                labelString: 'Score'
                            },
                            position: 'left',
                            id: 'y-axis-1',
                            ticks: {
                                min: 0,
                                max: 30,
                                stepSize: 5,
                                fontSize: 14,
                                fontColor: '#edededf7'
                            }
                        }, {
                            type: 'linear',
                            gridLines: {
                                color: 'rgba(50, 55, 57, 0.94)',
                            },
                            display: true,
                            scaleLabel: {
                                display: true,
                                fontSize: 16,
                                padding: 10,
                                fontColor: '#edededf7',
                                labelString: 'Durée'
                            },
                            position: 'right',
                            id: 'y-axis-2',
                            ticks: {
                                min: 0,
                                fontSize: 14,
                                fontColor: '#edededf7'
                            }
                        }],
                    }
                }
            });
        <?php endif; ?>
        // CREATION GRAPHIQUE 2
        <?php if (isset($_GET['chart']) && $_GET['chart'] == 2) : ?>
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: donneesThemesScore,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            fontSize: 16,
                            fontColor: '#edededf7',
                            padding: 20
                        }
                    },
                    title: {
                        display: true,
                        fontColor: '#fda77c',
                        fontSize: '26',
                        fontStyle: false,
                        text: 'Analyse du score par thème',
                        padding: 20,
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                fontSize: 16,
                                padding: 10,
                                fontColor: '#edededf7',
                                labelString: 'Thèmes'
                            },
                            ticks: {
                                fontSize: 18,
                                fontColor: '#edededf7'
                            }
                        }],
                        yAxes: [{
                            type: 'linear',
                            gridLines: {
                                color: 'rgba(50, 55, 57, 0.94)',
                            },
                            display: true,
                            scaleLabel: {
                                display: true,
                                fontSize: 16,
                                padding: 10,
                                fontColor: '#edededf7',
                                labelString: 'Score'
                            },
                            position: 'left',
                            ticks: {
                                min: 0,
                                max: 12,
                                stepSize: 1,
                                fontSize: 14,
                                fontColor: '#edededf7'
                            }

                        }],
                    }
                }
            });
        <?php endif; ?>
        // CREATION GRAPHIQUE 3
        <?php if (isset($_GET['chart']) && $_GET['chart'] == 3) : ?>
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: donneesThemesDuree,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            fontSize: 16,
                            fontColor: '#edededf7',
                            padding: 10
                        }
                    },
                    title: {
                        display: true,
                        fontColor: '#fda77c',
                        fontSize: '26',
                        fontStyle: false,
                        text: 'Analyse du temps par thème',
                        padding: 20,
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                fontSize: 16,
                                padding: 10,
                                fontColor: '#edededf7',
                                labelString: 'Thèmes'
                            },
                            ticks: {
                                fontSize: 18,
                                fontColor: '#edededf7'
                            }
                        }],
                        yAxes: [{
                            type: 'linear',
                            gridLines: {
                                color: 'rgba(50, 55, 57, 0.94)',
                            },
                            display: true,
                            scaleLabel: {
                                display: true,
                                fontSize: 16,
                                padding: 10,
                                fontColor: '#edededf7',
                                labelString: 'Durée'
                            },
                            position: 'left',
                            ticks: {
                                fontSize: 14,
                                fontColor: '#edededf7'
                            }
                        }],
                    }
                }
            });
        <?php endif; ?>

    };
    </script>

</body>

</html>
