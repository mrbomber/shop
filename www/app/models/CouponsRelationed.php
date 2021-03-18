<?php

class CouponsRelationed
{

	private $db;
	private $table = 'coupons_relationed';
	private $coupons = 'coupons';


	public function __construct()
	{
		$this->db = new Database;
	}

	public function getCategories($coupon_id)
	{
		$this->db->query("SELECT * FROM {$this->table}  WHERE coupon_id = {$coupon_id} AND category_id > 0");
		return $this->db->resultSet();
	}


	public function getBrands($coupon_id)
	{
		$this->db->query("SELECT * FROM {$this->table}  WHERE coupon_id = {$coupon_id} AND brand_id > 0");
		return $this->db->resultSet();
	}

	public function store($coupon_id, $category_id, $brand_id)
	{
		$this->db->query("INSERT INTO {$this->table} (coupon_id, category_id, brand_id) VALUES (:coupon_id,  :category_id, :brand_id)");

		$this->db->bind(':coupon_id', $coupon_id);
		$this->db->bind(':category_id', $category_id);
		$this->db->bind(':brand_id', $brand_id);

		return $this->db->execute();
	}



	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE coupon_id = {$id}");
		return $this->db->execute();
	}

	public function destroyRelated($locale, $id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE {$locale} = {$id}");
		return $this->db->execute();
	}
}
