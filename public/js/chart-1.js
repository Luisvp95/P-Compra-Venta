$(function() {
            var varCompra = document.getElementById('compras').getContext('2d');

            var charCompra = new Chart(varCompra, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($comprasmes as $reg) {
                        setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                        $mes_traducido = strftime('%B', strtotime($reg->mes));
                        echo '"' . $mes_traducido . '",';
                    } ?>],
                    datasets: [{
                        label: 'Compras',
                        data: [<?php foreach ($comprasmes as $reg) {
                            echo '' . $reg->totalmes . ',';
                        } ?>],
                        backgroundColor: 'rgba(20, 204, 20, 1)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var varVenta = document.getElementById('ventas').getContext('2d');

            var charVenta = new Chart(varVenta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventasmes as $reg) {
                        setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                        $mes_traducido = strftime('%B', strtotime($reg->mes));
                        echo '"' . $mes_traducido . '",';
                    } ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasmes as $reg) {
                            echo '' . $reg->totalmes . ',';
                        } ?>],
                        backgroundColor: 'rgba(20, 204, 20, 1)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var varVenta = document.getElementById('ventas_diarias').getContext('2d');
            var colores = ['rgba(20, 204, 20, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
            ]; // Puedes agregar más colores aquí

            var charVenta = new Chart(varVenta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventasdia as $ventadia) {
                        $dia = $ventadia->dia;
                        echo '"' . $dia . '",';
                    } ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasdia as $ventadia) {
                            echo '' . $ventadia->totaldia . ',';
                        } ?>],
                        backgroundColor: function() {
                            var backgroundColors = [];
                            for (var i = 0; i < <?php echo count($ventasdia); ?>; i++) {
                                backgroundColors.push(colores[i % colores.length]);
                            }
                            return backgroundColors;
                        }(),
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });


        });