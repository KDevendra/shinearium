<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_Model extends CI_Model {
    private $table = 'categories';
    function __construct() {
        parent::__construct();
        if (!isset($this->db)) {
            $this->load->database();
        }
    }
    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    function get_all_list() {
        $data = $this->db->get($this->table)->result_array();
        return $data;
    }
    function get_parent_category() {
        $data = $this->db->where('parent_category_id', 0)->get($this->table)->result_array();
        return $data;
    }
    function get_child_category($parent_id) {
        $data = $this->db->where('parent_category_id', $parent_id)->get($this->table)->result_array();
        return $data;
    }
    function get_non_parent_category() {
        $data = $this->db->where('parent_category_id <>', 0)->get($this->table)->result_array();
        return $data;
    }
    function get_category_menu() {
        $parent_category = $this->get_parent_category();
        $child_category = $this->get_non_parent_category();
        $final_data = array();
        foreach ($parent_category as $parent) {
            $temp['slug'] = $parent['slug'];
            $temp['url'] = 'javascript:void(0);';
            $temp['title'] = $parent['title'];
            $temp['child'] = array();
            $count = 0;
            foreach ($child_category as $child) {
                if ($child['parent_category_id'] == $parent['category_id']) {
                    $count++;
                }
            }
            if ($count > 0) {
                foreach ($child_category as $child) {
                    if ($child['parent_category_id'] == $parent['category_id']) {
                        $temp1['url'] = base_url($child['slug']);
                        // 'product/'.
                        $temp1['title'] = $child['title'];
                        array_push($temp['child'], $temp1);
                    }
                }
            }
            array_push($final_data, $temp);
        }
        return $final_data;
    }
    public function get_category_by_slug($slug) {
        $data = $this->db->get_where($this->table, array('slug' => $slug))->row();
        return $data;
    }
    public function get_category_by_id($category_id) {
        $data = $this->db->get_where($this->table, array('category_id' => $category_id))->row();
        return $data;
    }
    // public function get_category_list_no_child(){
    // 	$data = $this->db->query('SELECT cat.* FROM categories cat
    // 	LEFT JOIN categories scat ON cat.category_id = scat.parent_category_id
    // 	WHERE scat.title IS NULL ORDER BY cat.parent_category_id')->result_array();
    // 	return $data;
    // }
    function get_data_by_category_slug($slug = '-1', $category_id = '-1') {
        if ($category_id != '-1') {
            $this->db->where('category_id <>', $category_id);
        }
        $data = $this->db->get_where($this->table, array('slug' => $slug))->row();
        return $data;
    }
    public function get_category_list_no_child() {
        $data = $this->db->query('SELECT cat.* FROM categories cat
		LEFT JOIN categories scat ON cat.category_id = scat.parent_category_id
		WHERE scat.title IS NULL ORDER BY cat.created_at DESC')->result_array();
        return $data;
    }
    function get_parent_categories($parent_category_id, $pcat) {
        $pcategory = $this->get_category_by_id($parent_category_id);
        array_push($pcat, $pcategory->title);
        if ($pcategory->parent_category_id == 0) {
            $final_data = implode(',', $pcat);
            return $final_data;
        } else {
            return $this->get_parent_categories($pcategory->parent_category_id, $pcat);
        }
    }
}
