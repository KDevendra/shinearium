<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Shinearium extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!isset($this->db)) {
      $this->load->database();
    }
    $this->ip_address = $this->Common_Model->get_ip_address();
    date_default_timezone_set('Asia/Kolkata');
    $this->load->model('Shinearium_Model');
  }
  public function index()
    {
        // Get categories with condition and order
        $data['categories_list'] = $this->Shinearium_Model->getCategoriesWithConditionAndOrder();
        if (empty($data['categories_list'])) {
          // Handle the case where no categories are found
          $data['error_message'] = "No categories found.";
        }
        // SEO elements
        $data['title'] = "Exquisite Jewelry - Necklaces, Pendants, Bracelets, Earrings, Rings";
        $data['description'] = "Explore a world of elegance and style with our exquisite jewelry collection. Shop for necklaces, pendants, bracelets, earrings, and rings that are designed to dazzle and delight.";
        $data['canonical'] = base_url(); // Set your canonical URL
        // Load the view with SEO data
        $this->load->view('shinearium/index', $data);
    }
}
