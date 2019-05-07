<?php
class Pedidos extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $idCliente = null;
	private $idProducto = null;
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

	public function setIdProducto($value)
	{
		if ($this->validateId($value)) {
			$this->idProducto = $value;
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
		$sql = 'SELECT idPedido, nombreCliente, fecha, estado 
							FROM pedido 
							INNER JOIN cliente ON pedido.idCliente = cliente.idCliente
							ORDER BY idPedido';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function getPedido()
	{
		$sql = 'SELECT idPedido, pedido.idCliente, nombreCliente, fecha, estado 
							FROM pedido 
							INNER JOIN cliente ON pedido.idCliente = cliente.idCliente
							WHERE idPedido = ?
							ORDER BY idPedido';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function readDetallePedido()
	{
		$sql = 'SELECT idDetalle, idPedido, nombreL, cantidad, precioVenta,
							(SELECT SUM(precioVenta) FROM detallePedido) as total 
							FROM detallepedido 
							INNER JOIN libro ON detallepedido.idLibro = libro.idLibro
							WHERE idPedido = ?
							ORDER BY idDetalle';
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}

	public function getTotalPedido()
	{
		$sql = 'SELECT SUM(precioVenta) as totalPedido
							FROM detallePedido
							WHERE idPedido = ?';
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}

	public function createPedido()
	{
		$sql = 'INSERT INTO pedido(idCliente, fecha, estado) VALUES( ?, (SELECT NOW()), 0)';
		$params = array($this->idCliente);
		return Database::executeRow($sql, $params);
	}

	public function createDetallePedido($cantidad, $precioVenta)
	{
	$sql = 'INSERT INTO detallePedido(idPedido, idLibro, cantidad, precioVenta)
					VALUES(?, ?, ?, ?)';
		$params = array($this->id, $this->idProducto, $cantidad, $precioVenta);
		return Database::executeRow($sql, $params);
	}
}
