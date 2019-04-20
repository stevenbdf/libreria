<?php
class Pedidos extends Validator
{
	//Declaración de propiedades
    private $id = null;
    private $idCliente = null;
    private $fecha = null;
    private $estado = null;

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
    
    public function setIdCliente($value)
	{
		if ($this->validateId($value)) {
			$this->idCliente = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIdCliente()
	{
		return $this->idCliente;
    }

	public function setFecha($value)
	{
		if ($this->validateAlphabetic($value, 1, 100)) {
			$this->fecha = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getFecha()
	{
		return $this->fecha;
    }
    
    public function setEstado($value)
	{
        $this->estado = $value;
	}

	public function getEstado()
	{
		return $this->estado;
    }

	//Metodos para manejar el CRUD
	public function readPedidos()
	{
		$sql = 'SELECT idPedido,  FROM autor ORDER BY idAutor';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createAutor()
	{
		$sql = 'INSERT INTO autor(nombre, apellido, pais) VALUES(?, ?, ?)';
		$params = array($this->nombres, $this->apellidos,$this->pais);
		return Database::executeRow($sql, $params);
	}

	public function getAutor()
	{
		$sql = 'SELECT idAutor, nombre, apellido, pais FROM autor WHERE idAutor = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateAutor()
	{
		$sql = 'UPDATE autor SET nombre = ?, apellido = ?, pais = ? WHERE idAutor = ?';
		$params = array($this->nombres, $this->apellidos,$this->pais, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteAutor()
	{
		$sql = 'DELETE FROM autor WHERE idAutor = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

}
?>
