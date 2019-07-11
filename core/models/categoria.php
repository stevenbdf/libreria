<?php
class Categoria extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $descripcion = null;
	private $imagen = null;
	private $descuento = null;
	private $ruta = '../../resources/img/categories/';

	//Métodos para sobrecarga de propiedades
	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->id = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNombre($value)
	{
		if ($this->validateAlphabetic($value, 1, 16)) {
			$this->nombre = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setDescripcion($value)
	{
		if ($this->validateAlphabetic($value, 1, 110)) {
			$this->descripcion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getDescription()
	{
		return $this->descripcion;
	}

	public function setImagen($file, $name)
	{
		if ($this->validateImageFile($file, $this->ruta, $name, 640, 480)) {
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

	public function setDescuento($value)
	{
		$this->descuento = $value;
		return true;
	}

	public function getDescuento()
	{
		return $this->descuento;
	}


	//Metodos para manejar el CRUD
	public function insertBitacora($accion)
	{
		$sql = 'call insertBitacora ( ? , ?)';
		$params = array($_SESSION['idEmpleado'], $accion);
		return Database::executeRow($sql, $params);
	}

	public function readCategoria()
	{
		$sql = 'SELECT idCategoria, nombreCat, descripcion, descuento, img FROM categoria ORDER BY idCategoria';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createCategoria()
	{
		$sql = 'INSERT INTO categoria(nombreCat, descripcion, descuento, img) VALUES (?, ?, ?, ?)';
		$params = array($this->nombre, $this->descripcion, $this->descuento, $this->imagen);
		if (Database::executeRow($sql, $params)) {
			$this->insertBitacora('Ingreso una categoria');
			return true;
		} else {
			return false;
		}
	}

	public function getCategoria()
	{
		$sql = 'SELECT idCategoria, nombreCat, descripcion, descuento, img FROM categoria WHERE idCategoria = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateCategoria()
	{
		$sql = 'UPDATE categoria SET nombreCat = ?, descripcion = ?, descuento = ? , img = ? WHERE idCategoria = ?';
		$params = array($this->nombre, $this->descripcion, $this->descuento, $this->imagen, $this->id);
		if (Database::executeRow($sql, $params)) {
			$this->insertBitacora('Modifico una categoria');
			return true;
		} else {
			return false;
		}
	}

	public function deleteCategoria()
	{
		$sql = 'DELETE FROM categoria WHERE idCategoria = ?';
		$params = array($this->id);
		if (Database::executeRow($sql, $params)) {
			$this->insertBitacora('Borro una categoria');
			return true;
		} else {
			return false;
		}
	}

	public function getLibroPedidoCategoria()
	{
		$sql = 'SELECT cat.nombreCat nombreCategoria, COUNT(cat.nombreCat) cantidad FROM detallepedido dp
		INNER JOIN libro l ON dp.idLibro = l.idLibro
		INNER JOIN categoria cat ON l.idCat = cat.idCategoria
		INNER JOIN pedido p ON dp.idPedido = p.idPedido
		WHERE YEAR(p.fecha) = YEAR(CURDATE())
		GROUP BY cat.nombreCat
		ORDER BY cat.nombreCat ASC';
		$params = array(null);
		return Database::getRows($sql,$params);
	}
}
