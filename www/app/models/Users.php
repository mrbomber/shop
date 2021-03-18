<?php

class Users
{

	private $db;
	private $table = 'users';


	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAll()
	{
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->resultSet();
	}


	public function store($login, $password)
	{
		$this->db->query("INSERT INTO {$this->table} (login, password) VALUES (:login,  :password)");

		$this->db->bind(':login', $login);
		$this->db->bind(':password', $password);

		return $this->db->execute();
	}

	public function edit($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
		return $this->db->single();
	}

	public function update($id,  $password)
	{
		$this->db->query("UPDATE {$this->table} SET password = :password WHERE id = {$id}");

		$this->db->bind(':password', $password);
		return $this->db->execute();
	}

	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE id = {$id}");
		return $this->db->execute();
	}

	public function getLogin($login)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE login = '{$login}'");
		return $this->db->single();
	}
}
