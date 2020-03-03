var color = Chart.helpers.color;
var donneesThemesScore = {
    labels:  ['couleurs (niv 1 à 4)', 'formes (niv 5 à 8)', 'objets (niv 9 et 10)'],

    datasets:[{
        <?php for($j=0; $j<$nbParties; $j++) : ?>
        label: "Partie <?= $j+1; ?>",
        <?php $coul = $couleurs[$j%$nbCouleurs]; ?>
        backgroundColor: color(window.chartColors.<?= $coul; ?>).alpha(0.5).rgbString(),
        borderColor: window.chartColors.<?= $coul; ?>,
        borderWidth: 1,
        data:   <?= $score[$j]; ?>
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
        data: donneesThemesScore,
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
                        labelString: 'Score'
                    },
                    position: 'left',
                    ticks: {
                        min: 0,
                        max: 12,
                        stepSize: 1,
                        fontColor: '#edededf7'
                    }

                }],
            }
        }
    });

};
