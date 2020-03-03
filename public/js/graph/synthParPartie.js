var color = Chart.helpers.color;
        var barChartData = {

            labels:  <?php echo $labelJson; ?>,
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
        window.onload = function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
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
                        text: 'Données synthétisées par partie',
                        padding: 30,
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                fontColor: '#edededf7',
                                labelString: 'Numéro de la partie'
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
                            id: 'y-axis-1',
                            ticks: {
                                min: 0,
                                max: 30,
                                stepSize: 5,
                                fontColor: '#edededf7'
                            }
                        }, {
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            scaleLabel: {
                                display: true,
                                fontColor: '#edededf7',
                                labelString: 'Durée'
                            },
                            position: 'right',
                            id: 'y-axis-2',
                            ticks: {
                                min: 0,
                                fontColor: '#edededf7'
                            }
                        }],
                    }
                }
            });

        };
