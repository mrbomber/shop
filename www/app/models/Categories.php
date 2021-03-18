<?php

class Categories
{

	private $db;
	private $table = 'categories';


	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAll()
	{
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->resultSet();
	}


	public function store($name, $code)
	{
		$this->db->query("INSERT INTO {$this->table} (name, code) VALUES (:name,  :code)");

		$this->db->bind(':name', $name);
		$this->db->bind(':code', $code);

		return $this->db->execute();
	}

	public function edit($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
		return $this->db->single();
	}

	public function update($id, $name, $code)
	{
		$this->db->query("UPDATE {$this->table} SET name = :name, code = :code WHERE id = {$id}");
		$this->db->bind(':name', $name);
		$this->db->bind(':code', $code);
		return $this->db->execute();
	}

	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE id = {$id}");
		return $this->db->execute();
	}
}
