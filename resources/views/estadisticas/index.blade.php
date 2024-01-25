@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Usuarios registrados en este mes</h1>

        @if ($usersByDay->isEmpty())
            <p>No hay datos para mostrar.</p>
        @else
            <p>Total de personas registradas este mes: {{ $totalRegistradosEsteMes }}</p>
            <canvas id="barChart" width="30" height="15"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var ctx = document.getElementById('barChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: {!! json_encode($usersByDay->pluck('date')) !!},
                            datasets: [{
                                label: 'Usuarios Nuevos por Día',
                                data: {!! json_encode($usersByDay->pluck('count')) !!},
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            maintainAspectRatio: true // Ajusta para permitir dimensiones personalizadas
                        }
                    });
                });
            </script>
        @endif
    </div>

    <div class="container">
        <h1>Reservas por Actividad en Este Mes</h1>

        @if ($reservasPorActividad->isEmpty())
            <p>No hay datos para mostrar.</p>
        @else
            <p>Total de reservas este mes: {{ $totalReservasEsteMes }}</p>
            <canvas id="barChartReservas" width="30" height="15"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var ctx = document.getElementById('barChartReservas').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: {!! json_encode($reservasPorActividad->pluck('actividad')) !!},
                            datasets: [{
                                label: 'Reservas por Actividad',
                                data: {!! json_encode($reservasPorActividad->pluck('cantidad')) !!},
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            maintainAspectRatio: true // Ajusta para permitir dimensiones personalizadas
                        }
                    });
                });
            </script>
        @endif
    </div>


    <div class="container">
        <h1>Reservas por Instalación en Este Mes</h1>

        @if ($reservasPorInstalacion->isEmpty())
            <p>No hay datos para mostrar.</p>
        @else
            <p>Total de reservas este mes: {{ $totalReservasEsteMesI }}</p>
            <canvas id="barChartReservasInstalacion" width="30" height="15"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var ctx = document.getElementById('barChartReservasInstalacion').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: {!! json_encode($reservasPorInstalacion->pluck('instalacion')) !!},
                            datasets: [{
                                label: 'Reservas por Instalación',
                                data: {!! json_encode($reservasPorInstalacion->pluck('cantidad')) !!},
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            maintainAspectRatio: true // Ajusta para permitir dimensiones personalizadas
                        }
                    });
                });
            </script>
        @endif
    </div>

@endsection
