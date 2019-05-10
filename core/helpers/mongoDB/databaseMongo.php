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

$collection = (new MongoDB\Client)->libreria->libro;

$tuberia = array(
    array('$lookup' => array(
        'from' => "autor",
        'localField' => "idAutor",
        'foreignField' => "idAutor",
        'as' => "autor"
    )),
    array('$lookup' => array(
        'from' => "editorial",
        'localField' => "idEditorial",
        'foreignField' => "idEditorial",
        'as' => "editorial"
    )),
    array('$lookup' => array(
        'from' => "categoria",
        'localField' => "idCat",
        'foreignField' => "idCategoria",
        'as' => "categoria"
    )),
    array('$project' => array(
        'editorial' => '$editorial.nombreEdit',
        'autor' => '$autor.nombre',
        'NombreL' => 1,
        'Idioma' => 1,
        'NoPag' => 1,
        'encuadernacion' => 1,
        'resena' => 1,
        'precio' => 1,
        'categoria' => '$categoria.nombreCat',
        'img' => 1,
        'cant' => 1
    ))
);
$salida = $collection->aggregate($tuberia);
foreach ($salida as $id => $value) {
    var_dump($value);
}
