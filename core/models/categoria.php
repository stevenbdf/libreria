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
		if ($this->validateAlphabetic($value, 1, 30)) {
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
		$this->descripcion = $value;
		return true;
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
		return Database::executeRow($sql, $params);
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
		$params = array($this->nombre,$this->descripcion, $this->descuento, $this->imagen, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteCategoria()
	{
		$sql = 'DELETE FROM categoria WHERE idCategoria = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
