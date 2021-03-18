<?php

class ProductsCategories
{

	private $db;
	private $table = 'products_categories';


	public function __construct()
	{
		$this->db = new Database;
	}

	public function getCategories($product_id)
	{
		$this->db->query("SELECT * FROM {$this->table}  WHERE product_id = {$product_id}");
		return $this->db->resultSet();
	}


	public function store($product_id, $category_id)
	{
		$this->db->query("INSERT INTO {$this->table} (product_id, category_id) VALUES (:product_id,  :category_id)");

		$this->db->bind(':product_id', $product_id);
		$this->db->bind(':category_id', $category_id);

		return $this->db->execute();
	}



	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE product_id = {$id}");
		return $this->db->execute();
	}

	public function destroyRelated($locale, $id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE {$locale} = {$id}");
		return $this->db->execute();
	}
}
