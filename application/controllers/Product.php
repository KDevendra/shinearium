<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (!isset($this->db)) {
            $this->load->database();
        }
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index($slug = 'list') {
        if ($slug) {
            $category_details = $this->Category_Model->get_category_by_slug($slug);
            if ($category_details != null) {
                // $parent_category = $this->Category_Model->get_category_by_id($category_details->parent_category_id);
                $child_category = $this->Category_Model->get_child_category($category_details->category_id);
                if (count($child_category) > 0) {
                    $this->product_list($child_category[0]['slug']);
                } else {
                    $this->product_list($slug);
                }               
            } else {
                $data['title'] = "Home |  Shinearium";
                $data['keywords'] = "";
                $data['desc'] = "";
                $data['menu'] = "home";
                $this->load->view('index', $data);
            }
        } else {
            $data['title'] = "Home |  Shinearium";
            $data['keywords'] = "";
            $data['desc'] = "";
            $data['menu'] = "home";
            $this->load->view('index', $data);
        }
    }
    public function product_list($slug) {
        if ($slug) {
            $category_details = $this->Category_Model->get_category_by_slug($slug);
            if ($category_details != null) {
                $parent_category = $this->Category_Model->get_category_by_id($category_details->parent_category_id);
                $parent_parent_category = $this->Category_Model->get_category_by_id($parent_category->parent_category_id);
                $menu_child_category = $this->Category_Model->get_child_category($parent_category->category_id);
                $product_listing = array();
                if ($parent_parent_category) {
                    $product_listing = $this->Product_Model->get_data_by_sub_sub_category_id($category_details->category_id);
                    $data['menu'] = $parent_parent_category->slug;
                } else {
                    $product_listing = $this->Product_Model->get_data_by_sub_category_id($category_details->category_id);
                    $data['menu'] = $parent_category->slug;
                }
                $data['category_details'] = $category_details;
                $data['parent_parent_category'] = $parent_parent_category;
                $data['parent_category'] = $parent_category;
                $data['child_category'] = $menu_child_category;
                $data['product_data'] = $product_listing;
                $data['title'] = $category_details->title . " | Shinearium";
                $data['keywords'] = "";
                $data['desc'] = "";
                $this->load->view('product/product-index', $data);
            } else {
                $data['title'] = "Home |  Shinearium";
                $data['keywords'] = "";
                $data['desc'] = "";
                $this->load->view('index', $data);
            }
        } else {
            $data['title'] = "Home |  Shinearium";
            $data['keywords'] = "";
            $data['desc'] = "";
            $this->load->view('index', $data);
        }
    }
    public function product($slug) {
        if ($slug) {
            $category_details = $this->db->where(array('slug' => $slug))->get('products')->row();
            $category_id = $category_details->sub_category_id;
            $parent_category_id = $this->db->where(array('parent_category_id' => $category_id))->get('categories')->result_array();
            $product_details = $this->Product_Model->get_data_by_product_slug($slug);
            $category = $this->Category_Model->get_category_by_id($product_details->category_id);
            $sub_category = $this->Category_Model->get_category_by_id($product_details->sub_category_id);
            $sub_sub_category = $this->Category_Model->get_category_by_id($product_details->sub_sub_category_id);
            $related_products = array();
            if ($sub_sub_category) {
                $related_products = $this->Product_Model->get_data_by_sub_sub_category_id($product_details->sub_sub_category_id, $product_details->product_id);
            } else {
                $related_products = $this->Product_Model->get_data_by_sub_category_id($product_details->sub_category_id, $product_details->product_id);
            }
            if ($product_details->datasheet_file) {
                $product_details->datasheet_file_url = $this->Common_Model->get_file_url($product_details->datasheet_file, 'uploads/products/');
            }
            if ($product_details->reference_manual_file) {
                $product_details->reference_manual_file_url = $this->Common_Model->get_file_url($product_details->reference_manual_file, 'uploads/products/');
            }
            if ($product_details->quick_installation_guide_file) {
                $product_details->quick_installation_guide_file_url = $this->Common_Model->get_file_url($product_details->quick_installation_guide_file, 'uploads/products/');
            }
            $data['product_details'] = $product_details;
            $data['category'] = $category;
            $data['sub_category'] = $sub_category;
            $data['sub_sub_category'] = $sub_sub_category;
            $data['related_products'] = $related_products;
            $data['title'] = $product_details->title . " | Shinearium";
            $data['keywords'] = "";
            $data['desc'] = "";
            $data['menu'] = $category->slug;
            $data['child_category'] = $parent_category_id;
            $this->load->view('product/product-details', $data);
        } else {
            $data['title'] = "Home |  Shinearium";
            $data['keywords'] = "";
            $data['desc'] = "";
            $this->load->view('index', $data);
        }
    }
    public function product_pdf($slug) {
        if ($slug) {
            $product_details = $this->Product_Model->get_data_by_product_slug($slug);
            $category = $this->Category_Model->get_category_by_id($product_details->category_id);
            $sub_category = $this->Category_Model->get_category_by_id($product_details->sub_category_id);
            $sub_sub_category = $this->Category_Model->get_category_by_id($product_details->sub_sub_category_id);
            $data['product_details'] = $product_details;
            $data['category'] = $category;
            $data['sub_category'] = $sub_category;
            $data['sub_sub_category'] = $sub_sub_category;
            $data['title'] = $product_details->title . " | Shinearium";
            $data['keywords'] = "";
            $data['desc'] = "";
            // $this->load->view('product/product-pdf', $data);
            $this->load->view('product/product-pdf-new', $data);
            $html = $this->output->get_output();
            $this->load->library('pdf');
            $this->pdf->loadHtml($html);
            $this->pdf->setPaper('A4', 'portrait');
            $this->pdf->render();
            $this->pdf->stream($slug . '.pdf', array("Attachment" => 0));
        }
    }
    public function delete($id) {
        if ($id != NULL) {
            $cond = array('product_id' => $id);
            $query = $this->Product_Model->dbDeleteProduct('products', $cond);
            if ($query == TRUE) {
                $this->session->set_flashdata('success', 'You have deleted the product successfully.');
                return redirect('admin/product');
            } else {
                $this->session->set_flashdata('error', 'An attempt to delete the product has failed.');
                return redirect('admin/product');
            }
        }
    }
}
