<?php
require_once '../../core/helpers/modelPage.php';
echo modelPage::header();
?>

<div class="container" style="min-height:77.5vh">
    <h1 class="text-center mt-4 mb-4">Mis Pedidos</h1>
    <div class="row">
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light text-center">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Monto Total</th>
                    </tr>
                </thead>
                <tbody id="tbody-read-pedidos"></tbody>
            </table>
        </div>
    </div>
</div>

<!-- Ventana para ver pedido-->
<div class="modal fade" id="modificarPedidoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Ver pedido</h4>
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
                                    <input name="estado" type="text" class="form-control form-control-alternative" id="estado" readonly>
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
                            <button class="btn btn-warning" data-dismiss="modal">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

<?php
echo modelPage::footer('ordenes');
?>