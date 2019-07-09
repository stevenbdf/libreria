<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Graficas');
?>
<div class="container mt-5">
    <div class="row shadow-sm p-3 mb-5 bg-white rounded">
        <div class="table-responsive-lg" style="width:100%">
            <h1 class="text-center text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">
                Graficas</h1>
            <p class="text-center">Esta secciónes dedicada a la representacion resumida de la informacion general de diferentes apartados del sistema.</p>
            <div class="row">
                <div class="col-12 col-md-10 offset-1">
                    <canvas id="chart-autores"></canvas>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-10 offset-1">
                    <canvas id="chart-top5-aprobacion"></canvas>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-10 offset-1">
                    <canvas id="chart-libros-editorial"></canvas>
                </div>
            </div>
            <script type="text/javascript" src="../../resources/js/chart.js"></script>
        </div>
    </div>
</div>

<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::footerTemplate('graficas');
?>