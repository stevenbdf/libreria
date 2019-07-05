<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Graficas');
?>
<div class="container mt-5">
    <div id="alerts"></div>
    <div class="row shadow-sm p-3 mb-5 bg-white rounded">
        <div class="table-responsive-lg" style="width:100%">
            <h1 class="text-center text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">
                Autores</h1>
            <div class="row">
                <h4 class="center-align blue-text" id="greeting"></h4>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <canvas id="chart"></canvas>
                </div>
            </div>
            <script type="text/javascript" src="../../resources/js/chart.js"></script>


            <?php
            require_once('../../core/helpers/dashboardTemplate.php');
            Dashboard::footerTemplate('autores');
            ?>