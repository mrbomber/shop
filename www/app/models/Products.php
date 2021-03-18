<?php

class Products
{

	private $db;
	private $table = 'products';
	private $products_categories = 'products_categories';
	private $categories = 'categories';
	private $brands = 'brands';

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAll()
	{
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->resultSet();
	}
	public function getAllAdmin()
	{
		$this->db->query("SELECT  A.id as id, A.name as product_name, A.sku, A.qty, A.price, A.img, D.name as brand, 
        					(Select GROUP_CONCAT(DISTINCT(B.name) SEPARATOR '<br>') 
            					FROM    {$this->categories} AS B ,
										{$this->products_categories} AS C 
            					WHERE   C.category_id = B.id
								AND		(C.product_id= A.id)  ) AS categories
								FROM {$this->table} AS A
								LEFT JOIN {$this->brands} AS D ON A.brand_id = D.id
								;");

		return $this->db->resultSet();
	}

	public function store($brand_id, $name, $sku, $description, $qty, $price, $img)
	{
		$this->db->query("INSERT INTO {$this->table} (brand_id, name, sku, description, qty, price, img) VALUES (:brand_id, :name,  :sku, :description, :qty, :price, :img)");

		$this->db->bind(':brand_id', $brand_id);
		$this->db->bind(':name', $name);
		$this->db->bind(':sku', $sku);
		$this->db->bind(':description', $description);
		$this->db->bind(':qty', $qty);
		$this->db->bind(':price', $price);
		$this->db->bind(':img', $img);
		$this->db->execute();

		return		$this->db->lastID();
	}

	public function edit($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
		return $this->db->single();
	}
	public function getSingle($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
		return $this->db->single();
	}

	public function update($id, $brand_id, $name, $sku, $description, $qty, $price, $img)
	{
		$this->db->query("UPDATE {$this->table} SET brand_id = :brand_id, name = :name, sku = :sku, description = :description, qty = :qty, price = :price , img = :img WHERE id = {$id}");

		$this->db->bind(':brand_id', $brand_id);
		$this->db->bind(':name', $name);
		$this->db->bind(':sku', $sku);
		$this->db->bind(':description', $description);
		$this->db->bind(':qty', $qty);
		$this->db->bind(':price', $price);
		$this->db->bind(':img', $img);

		return $this->db->execute();
	}

	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE id = {$id}");
		return $this->db->execute();
	}
}
