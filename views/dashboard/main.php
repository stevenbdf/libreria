<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Principal');
?>
<div class="container">
    <div class="row" style="height: 85vh">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <a href="./productos.php">
                        <div class="card mt-4">
                            <div class="card-body row">
                                <div class="section-info col-12 col-lg-8">
                                    <h5 class="card-title text-center">Productos</h5>
                                    <p id="count-productos" class="text-center"></p>
                                </div>
                                <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center">
                                    <i class="material-icons">
                                        book
                                    </i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <a href="./noticias.php">
                        <div class="card mt-4">
                            <div class="card-body row">
                                <div class="section-info col-12 col-lg-8">
                                    <h5 class="card-title text-center">Noticias</h5>
                                    <p id="count-noticias" class="text-center"></p>
                                </div>
                                <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center">
                                    <i class="material-icons">
                                        library_books
                                    </i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <a href="./categorias.php">
                        <div class="card mt-4">
                            <div class="card-body row">
                                <div class="section-info col-12 col-lg-8">
                                    <h5 class="card-title text-center">Categorias</h5>
                                    <p id="count-categorias" class="text-center"></p>
                                </div>
                                <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center">
                                    <i class="material-icons">
                                        category
                                    </i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <a href="./empleados.php">
                        <div class="card mt-4">
                            <div class="card-body row">
                                <div class="section-info col-12 col-lg-8">
                                    <h5 class="card-title text-center">Empleados</h5>
                                    <p id="count-empleados" class="text-center"></p>
                                </div>
                                <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center">
                                    <i class="material-icons">
                                        people
                                    </i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <a href="./clientes.php">
                        <div class="card mt-4">
                            <div class="card-body row">
                                <div class="section-info col-12 col-lg-8">
                                    <h5 class="card-title text-center">Clientes</h5>
                                    <p id="count-clientes" class="text-center"></p>
                                </div>
                                <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center">
                                    <i class="material-icons">
                                        people_outline
                                    </i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <a href="./pedidos.php">
                        <div class="card mt-4">
                            <div class="card-body row">
                                <div class="section-info col-12 col-lg-8">
                                    <h5 class="card-title text-center">Pedidos</h5>
                                    <p id="count-pedidos" class="text-center"></p>
                                </div>
                                <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center">
                                    <i class="material-icons">
                                        shopping_cart
                                    </i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card mt-4">
                        <div class="card-body row">
                            <div class="section-info col-12 col-lg-8">
                                <a href="./comentariosLibros.php">
                                    <h5 class="card-title text-center small">Comentarios Libros</h5>
                                </a>
                                <a href="./comentariosNoticias.php">
                                    <h5 class="card-title text-center small mt-2">Comentarios Noticias</h5>
                                </a>
                            </div>
                            <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center">
                                <i class="material-icons">
                                    comment
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card mt-4">
                        <div class="card-body row">
                            <div class="section-info col-12 col-lg-8">
                                <a href="./autores.php">
                                    <h5 class="card-title text-center">Autores</h5>
                                </a>
                                <a href="./editoriales.php">
                                    <h5 class="card-title text-center">Editoriales</h5>
                                </a>
                            </div>
                            <div id="important-container" class="col-12 col-lg-4 d-flex align-items-center justify-content-center">
                                <i class="material-icons">
                                    local_library
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::footerTemplate('index');
?>