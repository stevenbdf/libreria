<?php
class Empleados extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $nombres = null;
	private $apellidos = null;
	private $correo = null;
	private $contrasena = null;
	private $dui = null;

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

	public function setNombres($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->nombres = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombres()
	{
		return $this->nombres;
	}

	public function setApellidos($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->apellidos = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getApellidos()
	{
		return $this->apellidos;
	}

	public function setCorreo($value)
	{
		$this->correo = $value;
		return true;
	}

	public function getCorreo()
	{
		return $this->correo;
	}

	public function setContrasena($value)
	{
		if ($this->validatePassword($value)) {
			$this->contrasena = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getContrasena()
	{
		return $this->contrasena;
	}

	public function setDui($value)
	{
		if ($this->validateAlphaNumeric($value, 1, 10)) {
			$this->dui = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getDui()
	{
		return $this->dui;
	}


	//Metodos para manejar el CRUD

	public function checkCorreo()
	{
		$sql = 'SELECT idEmpleado FROM empleado WHERE correo = ?';
		$params = array($this->correo);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->id = $data['idEmpleado'];
			return true;
		} else {
			return false;
		}
	}

	public function checkPassword()
	{
		$sql = 'SELECT contrasena FROM empleado WHERE idEmpleado = ?';
		$params = array($this->id);
		$data = Database::getRow($sql, $params);
		if (password_verify($this->contrasena, $data['contrasena'])) {
			return true;
		} else {
			return false;
		}
	}

	public function readEmpleados()
	{
		$sql = 'SELECT idEmpleado, nombreEmpleado, apellidoEmpleado, correo, dui FROM empleado ORDER BY idEmpleado';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createEmpleados()
	{
		$hash = password_hash($this->contrasena, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO empleado(nombreEmpleado, apellidoEmpleado, correo, contrasena, dui) VALUES(?, ?, ?, ?, ?)';
		$params = array($this->nombres, $this->apellidos, $this->correo, $hash, $this->dui);
		return Database::executeRow($sql, $params);
	}

	public function getEmpleados()
	{
		$sql = 'SELECT idEmpleado, nombreEmpleado, apellidoEmpleado, correo, contrasena, dui FROM empleado WHERE idEmpleado = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateEmpleados()
	{
		$sql = 'UPDATE empleado SET nombreEmpleado = ?, apellidoEmpleado = ?, 
						correo = ?, dui = ? WHERE idEmpleado = ?';
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->dui, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function updateContrasena()
	{
		$hash = password_hash($this->contrasena, PASSWORD_DEFAULT);
		$sql = 'UPDATE empleado SET contrasena = ? WHERE idEmpleado = ?';
		$params = array($hash, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteEmpleados()
	{
		$sql = 'DELETE FROM empleado WHERE idEmpleado = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
