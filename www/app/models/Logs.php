<?php

class Logs
{

	private $db;
	private $table = 'logs';


	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAll()
	{
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->resultSet();
	}


	public function store($type, $local, $row,  $login, $ip)
	{
		$this->db->query("INSERT INTO {$this->table} (type, local , row, login, ip) VALUES (:type, :local, :row,  :login, :ip)");

		$this->db->bind(':type', $type);
		$this->db->bind(':local', $local);
		$this->db->bind(':row', $row);
		$this->db->bind(':login', $login);
		$this->db->bind(':ip', $ip);

		return $this->db->execute();
	}
}
