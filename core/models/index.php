<?php

class Index
{
	//Metodos para manejar el CRUD
	public function countProductos()
	{
		$sql = 'SELECT COUNT(*) AS count FROM libros';
		$params = array(null);
		return Database::getRows($sql, $params);	
    }

	public function countNoticias()
	{
		$sql = 'SELECT COUNT(*) AS count FROM noticias';
		$params = array(null);
		return Database::getRows($sql, $params);
    }
    
    public function countCategorias()
	{
		$sql = 'SELECT COUNT(*) AS count FROM categoria';
		$params = array(null);
		return Database::getRows($sql, $params);
    }
    
    public function countEmpleados()
	{
		$sql = 'SELECT COUNT(*) AS count FROM empleados';
		$params = array(null);
		return Database::getRows($sql, $params);
    }
    
    public function countClientes()
	{
		$sql = 'SELECT COUNT(*) AS count FROM cliente';
		$params = array(null);
		return Database::getRows($sql, $params);
    }
    
    public function countPedidos()
	{
		$sql = 'SELECT COUNT(*) AS count FROM pedidos';
		$params = array(null);
		return Database::getRows($sql, $params);
    }
}
?>