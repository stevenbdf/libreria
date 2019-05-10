<?php
require 'vendor/autoload.php';
require_once('../../../core/helpers/validator.php');
require_once('../../../core/models/productos.php');

if (isset($_GET['action'])) {
    $result = array('status' => 0, 'exception' => '');
    $producto = new Productos;
    switch ($_GET['action']) {
        case 'readProductos':
            $collection = (new MongoDB\Client)->libreria->libro;
            $tuberia = array(
                array('$lookup' => array(
                    'from' => "autor",
                    'localField' => "idAutor",
                    'foreignField' => "idAutor",
                    'as' => "autor"
                )),
                array('$unwind' => '$autor'),
                array('$lookup' => array(
                    'from' => "editorial",
                    'localField' => "idEditorial",
                    'foreignField' => "idEditorial",
                    'as' => "editorial"
                )),
                array('$unwind' => '$editorial'),
                array('$lookup' => array(
                    'from' => "categoria",
                    'localField' => "idCat",
                    'foreignField' => "idCategoria",
                    'as' => "categoria"
                )),
                array('$unwind' => '$categoria'),
                array('$project' => array(
                    'idLibro' => 1,
                    'editorial' => '$editorial.nombreEdit',
                    'nombreAutor' => '$autor.nombre',
                    'apellidoAutor' => '$autor.apellido',
                    'NombreL' => 1,
                    'Idioma' => 1,
                    'NoPag' => 1,
                    'encuadernacion' => 1,
                    'resena' => 1,
                    'precio' => 1,
                    'categoria' => '$categoria.nombreCat',
                    'img' => 1,
                    'cant' => 1,
                    'descuento' => '$categoria.descuento'
                ))
            );

            $salida = $collection->aggregate($tuberia);
            $result['dataset'] = array();
            foreach ($salida as $id => $value) {
                array_push($result['dataset'], $value);
            }
            if ($result['dataset']) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'Error no tiene nada';
            }
            break;
        case 'getProducto':
            if (isset($_POST['idProducto'])) {
                $collection = (new MongoDB\Client)->libreria->libro;
                $tuberia = array(
                    array('$lookup' => array(
                        'from' => "autor",
                        'localField' => "idAutor",
                        'foreignField' => "idAutor",
                        'as' => "autor"
                    )),
                    array('$unwind' => '$autor'),
                    array('$lookup' => array(
                        'from' => "editorial",
                        'localField' => "idEditorial",
                        'foreignField' => "idEditorial",
                        'as' => "editorial"
                    )),
                    array('$unwind' => '$editorial'),
                    array('$lookup' => array(
                        'from' => "categoria",
                        'localField' => "idCat",
                        'foreignField' => "idCategoria",
                        'as' => "categoria"
                    )),
                    array('$unwind' => '$categoria'),
                    array('$match' => array('idLibro' => (int)$_POST['idProducto'])),
                    array('$project' => array(
                        'idLibro' => 1,
                        'idAutor' => '$autor.idAutor',
                        'idEditorial' => '$editorial.idEditorial',
                        'idCategoria' => '$categoria.idCategoria',
                        'editorial' => '$editorial.nombreEdit',
                        'nombreAutor' => '$autor.nombre',
                        'apellidoAutor' => '$autor.apellido',
                        'NombreL' => 1,
                        'Idioma' => 1,
                        'NoPag' => 1,
                        'encuadernacion' => 1,
                        'resena' => 1,
                        'precio' => 1,
                        'categoria' => '$categoria.nombreCat',
                        'img' => 1,
                        'cant' => 1,
                        'descuento' => '$categoria.descuento'
                    ))
                );

                $salida = $collection->aggregate($tuberia);
                $result['dataset'] = array();
                foreach ($salida as $id => $value) {
                    array_push($result['dataset'], $value);
                }
                if ($result['dataset']) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Error no tiene nada';
                }
            } else {
                $result['exception'] = 'Error id producto inexistente';
            }
            break;
        case 'readAutores':
            $collection = (new MongoDB\Client)->libreria->autor;
            $salida = $collection->find();
            $result['dataset'] = array();
            foreach ($salida as $id => $value) {
                array_push($result['dataset'], $value);
            }
            if ($result['dataset']) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'Error no tiene nada';
            }
            break;
        case 'readEditorial':
            $collection = (new MongoDB\Client)->libreria->editorial;
            $salida = $collection->find();
            $result['dataset'] = array();
            foreach ($salida as $id => $value) {
                array_push($result['dataset'], $value);
            }
            if ($result['dataset']) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'Error no tiene nada';
            }
            break;
        case 'readCategoria':
            $collection = (new MongoDB\Client)->libreria->categoria;
            $salida = $collection->find();
            $result['dataset'] = array();
            foreach ($salida as $id => $value) {
                array_push($result['dataset'], $value);
            }
            if ($result['dataset']) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'Error no tiene nada';
            }
            break;
        case 'createProducto':
            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                if ($producto->setImagen($_FILES['imagen'], null)) {
                    $collectionLibro = (new MongoDB\Client)->libreria->libro;
                    $salida = $collectionLibro->find();
                    $libros = array();
                    foreach ($salida as $id => $value) {
                        array_push($libros, $value);
                    }
                    $idNuevo = 1;
                    if (count($libros) > 0) {
                        $idNuevo = $libros[count($libros) - 1]['idLibro'] + 1;
                    }
                    $collection = (new MongoDB\Client)->libreria->libro;
                    $cursor = $collection->insertOne(
                        [
                            'idLibro' => $idNuevo,
                            'idAutor' => (int)$_POST['autorSelect'],
                            'idEditorial' => (int)$_POST['editorialSelect'],
                            'NombreL' => $_POST['titulo'],
                            'Idioma' => $_POST['idioma'],
                            'NoPag' => $_POST['noPaginas'],
                            'encuadernacion' => $_POST['encuadernacion'],
                            'resena' => $_POST['resena'],
                            'precio' => floatval($_POST['precio']),
                            'idCat' => (int)$_POST['categoriaSelect'],
                            'img' => $producto->getImageName(),
                            'cant' => (int)$_POST['cantidad']
                        ]
                    );
                    if ($producto->saveFile($_FILES['imagen'], $producto->getRuta(), $producto->getImagen())) {
                        $result['status'] = 1;
                    } else {
                        $result['status'] = 2;
                        $result['exception'] = 'No se guardó el archivo';
                    }
                } else {
                    $result['exception'] = $producto->getImageError();
                }
            }
            break;
    }
    print(json_encode($result));
} else {
    exit('Acceso no disponible');
}
