<?php
class Editorial extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
    private $direccion = null;
    private $pais = null;
    private $telefono = null;

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
		if ($this->validateAlphabetic($value, 1, 50)) {
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

	public function setDireccion($value)
	{
		if ($this->validateAlphanumeric($value, 1, 255)) {
			$this->direccion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getDireccion()
	{
		return $this->direccion;
    }
    
    public function setPais($value)
	{
		if ($this->validateAlphabetic($value, 1, 15)) {
			$this->pais = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getTelefono()
	{
		return $this->telefono;
	}
	public function setTelefono($value)
	{
		$this->telefono=$value;
		return true;
	}
	

	public function getPais()
	{
		return $this->pais;
	}


	//Metodos para manejar el CRUD
	public function readEditorial()
	{
		$sql = 'SELECT idEditorial, nombreEdit, direccion, pais, tel FROM editorial ORDER BY idEditorial';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createEditorial()
	{
		$sql = 'INSERT INTO editorial(nombreEdit, direccion, pais, tel) VALUES(?, ?, ?, ?)';
		$params = array($this->nombre, $this->direccion, $this->pais, $this->telefono);
		return Database::executeRow($sql, $params);
	}

	public function getEditorial()
	{
		$sql = 'SELECT idEditorial, nombreEdit, direccion, pais, tel FROM editorial WHERE idEditorial = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateEditorial()
	{
		$sql = 'UPDATE editorial SET nombreEdit = ?, direccion = ?, pais = ?, tel= ? WHERE idEditorial = ?';
		$params = array($this->nombre, $this->direccion,$this->pais,$this->telefono, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteEditorial()
	{
		$sql = 'DELETE FROM editorial WHERE idEditorial = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

}
?>
