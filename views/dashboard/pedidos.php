<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Pedidos');
?>
<main>
    <div class="container mt-5">
        <div id="alerts"></div>
        <div class="row shadow-sm p-3 mb-5 bg-white rounded">
            <div class="table-responsive-lg" style="width:100%">
                <h1 class="text-center text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">Pedidos</h1>

                <div class="row d-flex justify-content-center">
                    <div class="col-6 col-md-4 text-center">
                        <button type="button" class="ml-lg-2 btn btn-info" id="reload">
                            <i class="material-icons mr-2">sync</i>
                            Recargar
                        </button>
                    </div>
                </div>
                <table id="pedidos" class="table table-responsive">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Monto Total</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-read-pedidos"></tbody>
                </table>
            </div>
        </div>
        <div class="row shadow-sm p-3 mb-5 bg-white rounded">
            <h1 class="text-center w-100 text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">Reportes</h1>
            <p class="text-center w-100">Genera un reporte en PDF de los pedidos por un rango de fecha especifico, organizados por estado</p>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="fecha1">Fecha Inicio</label>
                    <input type="date" class="form-control" id="fecha1" placeholder="Fecha Inicio">
                    <small class="form-text text-muted">Ej. 19/05/2019</small>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="fecha2">Fecha Final</label>
                    <input type="date" class="form-control" id="fecha2" placeholder="Fecha Final">
                    <small class="form-text text-muted">Ej. 30/05/2019</small>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center my-4">
                <button type="button" onclick="enviarReporte()" class="btn btn-success py-3">Generar Reporte
                    <i class="material-icons">insert_drive_file</i>
                </button>
            </div>
        </div>
    </div>
</main>

<!-- Ventana para ver pedido-->
<div class="modal fade" id="modificarPedidoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Modificar Pedido</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-pedidos">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Codigo pedido:</label>
                                <input name="idPedido" type="text" class="form-control form-control-alternative" id="idPedido" readonly>
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Codigo cliente:</label>
                                <input name="idCliente" type="text" class="form-control form-control-alternative" id="idCliente" readonly>
                            </div>
                        </div>
                        <label for="recipient-name" class="col-form-label">Cliente:</label>
                        <input name="cliente" type="text" class="form-control form-control-alternative" id="cliente" readonly>
                        <div class="row">
                            <div class="col-6 col-md-4">
                                <label for="recipient-name" class="col-form-label">Fecha:</label>
                                <input name="fecha" type="text" class="form-control form-control-alternative" id="fecha" readonly>
                            </div>
                            <div class="col-6 col-md-4">
                                <label for="recipient-name" class="col-form-label">Estado:</label>
                                <select class="form-control" name="estado" id="estado">
                                    <option value="0">Pagado</option>
                                    <option value="1">Enviado</option>
                                    <option value="2">Cancelado</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="recipient-name" class="col-form-label">Total $:</label>
                                <input name="total" type="text" class="form-control form-control-alternative" id="total" readonly>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 table-responsive">
                                <table id="detalle-pedidos" class="table ">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Libro</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">$ Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-read-detalle-pedidos"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::footerTemplate('pedidos');
?>