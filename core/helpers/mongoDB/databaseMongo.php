<?php
require 'vendor/autoload.php';
// $db = (new MongoDB\Client("mongodb://127.0.0.1:27017"))->dbname->libreria;
// $result = $db->autor->find();

// $document = $collection->insertOne(['idAutor' => 1, 'nombre' => 'Manuel', 'apellido' => 'Gonzalez', 'pais' => 'Mexico']);
// $cursor = $collection->find();
// $autores = array();
// foreach ($cursor as $id => $value) {
//     array_push($autores, array($value['idAutor']  =>
//     array('nombre' => $value['nombre'], 'apellido' => $value['apellido'], 'pais' => $value['pais'])));
// }
if (isset($_GET['action'])) {
    $result = array('status' => 0, 'exception' => '');
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
    }
    print(json_encode($result));
} else {
    exit('Acceso no disponible');
}
