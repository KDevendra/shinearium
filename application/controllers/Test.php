<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Web_Flowmechs_Model');
        date_default_timezone_set('Asia/Kolkata');
    }
    public function category_menu() {
        $parent_category = $this->Category_Model->get_parent_category();
        $child_category = $this->Category_Model->get_non_parent_category();
        $final_data = array();
        foreach ($parent_category as $parent) {
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
                        $temp1['url'] = $child['slug'];
                        $temp1['title'] = $child['title'];
                        array_push($temp['child'], $temp1);
                    }
                }
            }
            array_push($final_data, $temp);
        }
        echo '<pre>';
        print_r($final_data);
        echo '</pre>';
    }
    public function category_by_slug($slug) {
        $category_details = $this->Category_Model->get_category_by_slug($slug);
        $parent_category = $this->Category_Model->get_category_by_id($category_details->parent_category_id);
        $parent_parent_category = $this->Category_Model->get_category_by_id($parent_category->parent_category_id);
        $menu_child_category = $this->Category_Model->get_child_category($parent_category->category_id);
        echo 'result:- <pre>';
        print_r($parent_parent_category);
        echo '</pre>';
    }
    public function category_by_slug_details($category) {
        $final_data = array();
        $final_data['details'] = $category;
        if ($category->parent_category_id > 0) {
            $parent_category = $this->Category_Model->get_category_by_id($category->parent_category_id);
            $final_data['parent_category'] = $parent_category;
            if ($parent_category->parent_category_id == 0) {
                $child_category = $this->Category_Model->get_child_category($category->category_id);
                $final_data['child_category'] = $child_category;
            } else {
                $final_data['child_category'] = null;
            }
        } else {
            $final_data['parent_category'] = null;
        }
        return $final_data;
    }
    function get_category_menu($category_id) {
        $parent_category = $this->Category_Model->get_parent_category();
        $child_category = $this->Category_Model->get_non_parent_category();
        $final_data = array();
        foreach ($parent_category as $parent) {
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
}
