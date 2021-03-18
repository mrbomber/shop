<?php

class CouponsTypes
{

	private $db;
	private $table = 'coupons_types';


	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAll()
	{
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->resultSet();
	}


	
}
