<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product_Model extends CI_Model
{
	private $table = 'products';
	function __construct()
	{
		parent::__construct();
		if (!isset($this->db)) {
			$this->load->database();
		}
	}
	function clear_cache()
	{
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}
	function get_all_list()
	{
		$this->db->order_by("updated_at", "desc");
		$data = $this->db->get_where($this->table)->result_array();
		return $data;
	}
	function get_data_by_product_id($product_id = '-1')
	{
		$data = $this->db->get_where($this->table, ['product_id' => $product_id])->row();
		return $data;
	}
	function get_data_by_product_slug($slug = '-1', $product_id = '-1')
	{
		if ($product_id != '-1') {
			$this->db->where('product_id <>', $product_id);
		}
		$data = $this->db->get_where($this->table, ['slug' => $slug])->row();
		return $data;
	}
	function get_data_by_category_id($category_id = '-1')
	{
		$this->db->order_by("order_by", "asc");
		$data = $this->db->get_where($this->table, ['category_id' => $category_id, 'active_status' => 'active'])->result_array();
		return $data;
	}
	function get_data_by_sub_category_id($sub_category_id = '-1', $product_id = '-1')
	{
		$this->db->order_by("order_by", "asc");
		if ($product_id != '-1') {
			$this->db->where('product_id <>', $product_id);
		}
		$data = $this->db
			->select('slug,title,images')
			->get_where($this->table, ['sub_category_id' => $sub_category_id, 'active_status' => 'active'])
			->result_array();
		return $data;
	}
	function get_data_by_sub_sub_category_id($sub_sub_category_id = '-1', $product_id = '-1')
	{
		$this->db->order_by("order_by", "asc");
		if ($product_id != '-1') {
			$this->db->where('product_id <>', $product_id);
		}
		$data = $this->db
			->select('slug,title,images')
			->get_where($this->table, ['sub_sub_category_id' => $sub_sub_category_id, 'active_status' => 'active'])
			->result_array();
		return $data;
	}
	function dbDeleteProduct($tbl, $cond)
	{
		if ($cond != null) {
			$this->db->where($cond);
		}
		return $this->db->delete($tbl);
	}

}
