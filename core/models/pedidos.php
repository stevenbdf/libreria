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
		return true;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	//Metodos para manejar el CRUD
	public function insertBitacora($accion)
	{
		$sql = 'call insertBitacora ( ? , ?)';
		$params = array($_SESSION['idEmpleado'], $accion);
		return Database::executeRow($sql, $params);
	}

	public function readPedidos()
	{
		$sql = 'SELECT idPedido, nombreCliente, apellidoCliente, correo, fecha, pedido.estado,
				(SELECT SUM((cantidad * precioVenta)) FROM detallepedido d WHERE d.idPedido = pedido.idPedido) as montoTotal
				FROM pedido 
				INNER JOIN cliente ON pedido.idCliente = cliente.idCliente
				ORDER BY idPedido DESC';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function readPedidosFecha($fecha1, $fecha2, $estado)
	{
		$sql = 'SELECT idPedido, nombreCliente, apellidoCliente, correo, fecha, pedido.estado,
				(SELECT SUM((cantidad * precioVenta)) FROM detallepedido d WHERE d.idPedido = pedido.idPedido) as montoTotal
				FROM pedido 
				INNER JOIN cliente ON pedido.idCliente = cliente.idCliente
				WHERE pedido.estado = ' . $estado . ' AND pedido.fecha BETWEEN ' . $fecha1 . ' AND ' . $fecha2 . ' ORDER BY idPedido DESC';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	//Metodos para manejar el CRUD
	public function readPedidosCliente()
	{
		$sql = 'SELECT idPedido, nombreCliente, apellidoCliente, fecha, pedido.estado, 
				(SELECT SUM((cantidad * precioVenta)) FROM detallepedido d WHERE d.idPedido = pedido.idPedido) as montoTotal
				FROM pedido 
				INNER JOIN cliente ON pedido.idCliente = cliente.idCliente
				WHERE pedido.idCliente = ?
				ORDER BY idPedido DESC';
		$params = array($_SESSION['idCliente']);
		return Database::getRows($sql, $params);
	}

	public function getPedido()
	{
		$sql = 'SELECT idPedido, pedido.idCliente, nombreCliente, apellidoCliente, direccion, fecha, pedido.estado 
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
		$sql = 'SELECT SUM(precioVenta*cantidad) as totalPedido
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

	public function updateEstadoPedido()
	{
		$sql = 'UPDATE pedido SET estado = ? WHERE idPedido = ?';
		$params = array($this->estado, $this->id);
		if (Database::executeRow($sql, $params)) {
			$this->insertBitacora('Modifico el estado de un pedido');
			return true;
		} else {
			return false;
		}
	}

	public function readPedidosByMonth()
	{
		$sql = 'SELECT COUNT(idPedido) cantidad , MONTH(fecha) mes
		FROM pedido WHERE YEAR(fecha) = YEAR(CURRENT_DATE()) GROUP BY MONTH(fecha)';
		$params = array(null);
		$dataset = Database::getRows($sql, $params);
		foreach ($dataset as $key => $value) {
			$dataset[$key]['cantidad'] = (int) $value['cantidad'];
			$dataset[$key]['mes'] = $this->getMonthName($value['mes']);
		}
		return $dataset;
	}

	private function getMonthName($monthNum)
	{
		switch ((int) $monthNum) {
			case 1:
				return 'Enero';
				break;
			case 2:
				return 'Febrero';
				break;
			case 3:
				return 'Marzo';
				break;
			case 4:
				return 'Abril';
				break;
			case 5:
				return 'Mayo';
				break;
			case 6:
				return 'Junio';
				break;
			case 7:
				return 'Julio';
				break;
			case 8:
				return 'Agosto';
				break;
			case 9:
				return 'Septiembre';
				break;
			case 10:
				return 'Octubre';
				break;
			case 11:
				return 'Noviembre';
				break;
			case 12:
				return 'Diciembre';
				break;
			default:
				return 'Mes incorrecto';
				break;
		}
	}
}
