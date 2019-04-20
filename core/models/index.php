<?php

class Index
{
	//Metodos para manejar el CRUD
	public function countProductos()
	{
		$sql = 'SELECT COUNT(*) AS count FROM libro';
		$params = array(null);
		return Database::getRows($sql, $params);	
    }

	public function countNoticias()
	{
		$sql = 'SELECT COUNT(*) AS count FROM noticia';
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
		$sql = 'SELECT COUNT(*) AS count FROM empleado';
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
		$sql = 'SELECT COUNT(*) AS count FROM pedido';
		$params = array(null);
		return Database::getRows($sql, $params);
    }
}
?>