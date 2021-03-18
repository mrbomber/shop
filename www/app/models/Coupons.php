<?php

class Coupons
{

	private $db;
	private $table = 'coupons';
	private $products_categories = 'products_categories';
	private $categories = 'categories';
	private $coupons_types = 'coupons_types';
	private $coupons_relationed = 'coupons_relationed';



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
		$this->db->query("SELECT  A.id As id, A.name, A.value , B.id as type_id, B.name as type      					
								FROM {$this->table} AS A
								INNER JOIN {$this->coupons_types}  AS B ON A.coupon_type = B.id
								;");

		return $this->db->resultSet();
	}

	public function store($name, $coupon_type, $value)
	{
		$this->db->query("INSERT INTO {$this->table} (name, coupon_type, value) VALUES (:name,  :coupon_type, :value)");

		$this->db->bind(':name', $name);
		$this->db->bind(':coupon_type', $coupon_type);
		$this->db->bind(':value', $value);
		$this->db->execute();

		return		$this->db->lastID();
	}

	public function edit($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
		return $this->db->single();
	}

	public function update($id, $name, $coupon_type, $value)
	{
		$this->db->query("UPDATE {$this->table} SET name = :name, coupon_type = :coupon_type, value = :value WHERE id = {$id}");

		$this->db->bind(':name', $name);
		$this->db->bind(':coupon_type', $coupon_type);
		$this->db->bind(':value', $value);

		return $this->db->execute();
	}

	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE id = {$id}");
		return $this->db->execute();
	}

	public function getCoupon($coupon_id, $cats, $brand_id)
	{
		if ($cats) :
			$this->db->query("SELECT * FROM {$this->table} as A 
						 INNER JOIN {$this->coupons_relationed} AS B ON A.id = B.coupon_id
						 WHERE ( B.category_id IN ($cats) OR brand_id = $brand_id) 
						 AND  A.name = '$coupon_id'
 						 LIMIT 1");
		else :
			$this->db->query("SELECT * FROM {$this->table} as A 
						 INNER JOIN {$this->coupons_relationed} AS B ON A.id = B.coupon_id
						 WHERE  brand_id = $brand_id 
						 AND  A.name = '$coupon_id'
 						 LIMIT 1");
		endif;
		return $this->db->resultSet();
	}
}
