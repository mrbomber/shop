<?php

class Brands
{

	private $db;
	private $table = 'brands';


	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAll()
	{
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->resultSet();
	}


	public function store($name)
	{
		$this->db->query("INSERT INTO {$this->table} (name) VALUES (:name)");

		$this->db->bind(':name', $name);		

		return $this->db->execute();
	}

	public function edit($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
		return $this->db->single();
	}

	public function update($id, $name)
	{
		$this->db->query("UPDATE {$this->table} SET name = :name WHERE id = {$id}");
		$this->db->bind(':name', $name);	
		return $this->db->execute();
	}

	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE id = {$id}");
		return $this->db->execute();
	}
}
