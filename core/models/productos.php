<?php
class Productos extends Validator
{
    //Declaración de propiedades
    private $idLibro = null;
    private $idAutor = null;
    private $idEditorial = null;
    private $titulo = null;
    private $idioma = null;
    private $noPags = null;
    private $encuadernacion = null;
    private $resena = null;
    private $precio = null;
    private $idCategoria = null;
    private $cantidad = null;
    private $imagen = null;
    private $ruta = '../../resources/img/books/';

    //Métodos para sobrecarga de propiedades
    public function setIdLibro($value)
    {
        if ($this->validateId($value)) {
            $this->idLibro = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIdLibro()
    {
        return $this->idLibro;
    }

    public function setIdAutor($value)
    {
        if ($this->validateId($value)) {
            $this->idAutor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIdAutor()
    {
        return $this->idAutor;
    }

    public function setIdEditorial($value)
    {
        if ($this->validateId($value)) {
            $this->idEditorial = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIdEditorial()
    {
        return $this->idEditorial;
    }

    public function setIdCategoria($value)
    {
        if ($this->validateId($value)) {
            $this->idCategoria = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdioma($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->idioma = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIdioma()
    {
        return $this->idioma;
    }

    public function setNoPags($value)
    {
        if ($this->validateId($value)) {
            $this->noPags = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEncuadernacion($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->encuadernacion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setResena($value)
    {
        $this->resena = $value;
        return true;
    }

    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTitulo($value)
    {
        if ($this->validateAlphanumeric($value, 1, 100)) {
            $this->titulo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCantidad($value)
    {
        if ($this->validateId($value)) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setImagen($file, $name)
    {
        if ($this->validateImageFile($file, $this->ruta, $name, 480, 640)) {
            $this->imagen = $this->getImageName();
            return true;
        } else {
            return false;
        }
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function getImagen()
    {
        return $this->imagen;
    }


    //Metodos para manejar el CRUD
    public function insertBitacora($accion)
	{
		$sql = 'call insertBitacora ( ? , ?)';
		$params = array($_SESSION['idEmpleado'], $accion);
		return Database::executeRow($sql, $params);
    }
    
    public function readProductos()
    {
        $sql = "SELECT idLibro,  autor.nombre as 'nombreAutor', autor.apellido as 'apellidoAutor', NombreL,
        editorial.nombreEdit as 'editorial', categoria.nombreCat, cant as 'cantidad', 
        Idioma, NoPag, encuadernacion, resena,ROUND ( precio ,2 ) as 'precio', categoria.descuento,
        ROUND( precio - ( precio * ( categoria.descuento / 100 ) ), 2) as 'precioFinal',libro.img,
        getAprobacionLibro(idLibro) as 'aprobacion', getLikes(idLibro) as 'likes', getDislikes(idLibro) as 'dislikes'
        FROM libro INNER JOIN autor ON libro.idAutor = autor.idAutor
        INNER JOIN categoria ON libro.idCat = categoria.idCategoria
        INNER JOIN editorial ON libro.idEditorial = editorial.idEditorial
        ORDER BY idLibro";
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    //Metodos para manejar el CRUD
    public function readProductosByCategory($idCategoria)
    {
        $sql = "SELECT idLibro,  autor.nombre as 'nombreAutor', autor.apellido as 'apellidoAutor', NombreL,
            editorial.nombreEdit as 'editorial', categoria.nombreCat, cant as 'cantidad', 
            Idioma, NoPag, encuadernacion, resena,ROUND ( precio ,2 ) as 'precio', categoria.descuento,
            ROUND( precio - ( precio * ( categoria.descuento / 100 ) ), 2) as 'precioFinal',libro.img,
            getAprobacionLibro(idLibro) as 'aprobacion', getLikes(idLibro) as 'likes', getDislikes(idLibro) as 'dislikes'
            FROM libro INNER JOIN autor ON libro.idAutor = autor.idAutor
            INNER JOIN categoria ON libro.idCat = categoria.idCategoria
            INNER JOIN editorial ON libro.idEditorial = editorial.idEditorial
            WHERE libro.idCat = ? ORDER BY idLibro ";
        $params = array($idCategoria);
        return Database::getRows($sql, $params);
    }

    public function getProducto($idLibro)
    {
        $sql = "SELECT idLibro, libro.idAutor, autor.pais, autor.nombre as 'nombreAutor', autor.apellido as 'apellidoAutor', NombreL,
        libro.idEditorial, editorial.nombreEdit as 'editorial', libro.idCat, categoria.nombreCat, cant as 'cantidad',
        Idioma, NoPag, encuadernacion, resena,ROUND ( precio ,2 ) as 'precio', categoria.descuento,
        ROUND( precio - ( precio * ( categoria.descuento / 100 ) ), 2) as 'precioFinal', libro.img,
        getAprobacionLibro(idLibro) as 'aprobacion', getLikes(idLibro) as 'likes', getDislikes(idLibro) as 'dislikes'
        FROM libro INNER JOIN autor ON libro.idAutor = autor.idAutor
        INNER JOIN categoria ON libro.idCat = categoria.idCategoria
        INNER JOIN editorial ON libro.idEditorial = editorial.idEditorial
        WHERE idLibro = ?";
        $params = array($idLibro);
        return Database::getRow($sql, $params);
    }

    public function createProducto()
    {
        $sql = 'INSERT INTO libro(idAutor, idEditorial, NombreL, Idioma, NoPag, encuadernacion, resena,
        precio, idCat, img, cant)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array(
            $this->idAutor, $this->idEditorial, $this->titulo, $this->idioma, $this->noPags,
            $this->encuadernacion, $this->resena, $this->precio, $this->idCategoria, $this->imagen, $this->cantidad
        );
        if (Database::executeRow($sql, $params)) {
			$this->insertBitacora('Ingreso un producto');
			return true;
		} else {
			return false;
		}
    }

    public function updateProducto()
    {
        $sql = 'UPDATE libro SET idAutor = ?, idEditorial = ?, NombreL = ?, Idioma = ?, NoPag = ?, encuadernacion = ?, resena = ?,
        precio = ?, idCat = ?, img = ?, cant = ? WHERE idLibro = ?';
        $params = array(
            $this->idAutor, $this->idEditorial, $this->titulo, $this->idioma, $this->noPags,
            $this->encuadernacion, $this->resena, $this->precio, $this->idCategoria, $this->imagen, $this->cantidad, $this->idLibro
        );
        if (Database::executeRow($sql, $params)) {
			$this->insertBitacora('Modifico un producto');
			return true;
		} else {
			return false;
		}
    }

    public function deleteProducto()
    {
        $sql = 'DELETE FROM libro WHERE idLibro = ?';
        $params = array($this->idLibro);
        if (Database::executeRow($sql, $params)) {
			$this->insertBitacora('Borro un producto');
			return true;
		} else {
			return false;
		}
    }

    public function getNombre($idCategoria)
    {
        $sql='SELECT nombreCat FROM categoria WHERE idCategoria= ?';
        $params = array($idCategoria);
        return Database::getRow($sql, $params);
    }

    public function getNombreL($idLibro)
    {
        $sql='SELECT NombreL FROM libro WHERE idLibro=?';
        $params = array($idLibro);
        return Database::getRow($sql, $params);
    }

}
