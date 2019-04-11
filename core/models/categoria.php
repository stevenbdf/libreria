<?php
class Categoria extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
    private $descuento = null;

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

	public function setDescuento($value)
	{
		$this->descuento=$value;
		return true;
	}

	public function getDescuento()
	{
		return $this->descuento;
    }


	//Metodos para manejar el CRUD
	public function readCategoria()
	{
		$sql = 'SELECT idCategoria, nombreCat, descuento FROM categoria ORDER BY idCategoria';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createCategoria()
	{
		$sql = 'INSERT INTO categoria(nombreCat, descuento) VALUES(?, ?)';
		$params = array($this->nombre, $this->descuento);
		return Database::executeRow($sql, $params);
	}

	public function getCategoria()
	{
		$sql = 'SELECT idCategoria, nombreCat, descuento FROM categoria WHERE idCategoria = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateCategoria()
	{
		$sql = 'UPDATE categoria SET nombreCat = ?, descuento = ? WHERE idCategoria = ?';
		$params = array($this->nombre, $this->descuento, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteCategoria()
	{
		$sql = 'DELETE FROM categoria WHERE idCategoria = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

}
?>
