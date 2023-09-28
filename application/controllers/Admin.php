<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public $ip_address = '127.0.0.1';
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
        if ($this->session->userdata('admin_login') == 'yes') {
            $data['page_name'] = 'dashboard';
            $this->load->view('admin/index', $data);
        } else {
            $data['page_name'] = 'login';
            $this->load->view('admin/login', $data);
        }
    }
    public function product($param1 = 'list', $param2 = 'insert')
    {
        if ($this->session->userdata('admin_login') == 'yes') {
            if ($param1 == 'upload') {
                $data['page_name'] = 'product-upload';
                $data['js_page_name'] = 'product-upload';
                $this->load->view('admin/index', $data);
            } else if ($param1 == 'add') {
                $data['page_name'] = 'product-add';
                $data['js_page_name'] = 'product-add';
                $data['image_crop_css'] = 'yes';
                $data['image_crop_js'] = 'yes';
                // $data['serial_numbers'] = $this->SerialNumber_Model->get_serial_for_dropdown();
                $data['parent_category'] = $this->Category_Model->get_parent_category();
                // $orderby_data = $this->Shinearium_Model->getMaxOrderBy('products');
                // $data['order_by'] = $orderby_data->orderby;
                $this->load->view('admin/index', $data);
            } else if ($param1 == 'edit') {
                $data['page_name'] = 'product-edit';
                $data['js_page_name'] = 'product-edit';
                $data['image_crop_css'] = 'yes';
                $data['image_crop_js'] = 'yes';
                $product_data = $this->Product_Model->get_data_by_product_id($param2);
                $data['parent_category'] = $this->Category_Model->get_parent_category();
                $data['sub_category'] = $this->Category_Model->get_child_category($product_data->category_id);
                $data['sub_sub_category'] = $this->Category_Model->get_child_category($product_data->sub_category_id);
                $image_names = explode(',', $product_data->images);
                $image_urls = array();
                foreach ($image_names as $img) {
                    if ($img) {
                        if (file_exists('uploads/products/thumb/' . $img)) {
                            $temp['file_path'] = $this->Common_Model->get_file_url($img, 'uploads/products/thumb/');
                        } else {
                            $temp['file_path'] = $this->Common_Model->get_file_url($img, 'uploads/products/');
                        }
                        // $temp['file_path'] = $this->Common_Model->get_file_url($img, 'uploads/products/');
                        $temp['file_name'] = $img;
                        array_push($image_urls, $temp);
                    }
                }
                if ($product_data->datasheet_file) {
                    $product_data->datasheet_file_url = $this->Common_Model->get_file_url($product_data->datasheet_file, 'uploads/products/');
                }
                if ($product_data->reference_manual_file) {
                    $product_data->reference_manual_file_url = $this->Common_Model->get_file_url($product_data->reference_manual_file, 'uploads/products/');
                }
                if ($product_data->quick_installation_guide_file) {
                    $product_data->quick_installation_guide_file_url = $this->Common_Model->get_file_url($product_data->quick_installation_guide_file, 'uploads/products/');
                }
                $product_data->images = $image_urls;
                $data['product'] = $product_data;
                $this->load->view('admin/index', $data);
            } else if ($param1 == 'clone') {
                $data['page_name'] = 'product-clone';
                $data['js_page_name'] = 'product-clone';
                $data['image_crop_css'] = 'yes';
                $data['image_crop_js'] = 'yes';
                $product_data = $this->Product_Model->get_data_by_product_id($param2);
                $data['parent_category'] = $this->Category_Model->get_parent_category();
                $data['sub_category'] = $this->Category_Model->get_child_category($product_data->category_id);
                $data['sub_sub_category'] = $this->Category_Model->get_child_category($product_data->sub_category_id);
                $image_names = explode(',', $product_data->images);
                $image_urls = array();
                foreach ($image_names as $img) {
                    if ($img) {
                        if (file_exists('uploads/products/thumb/' . $img)) {
                            $temp['file_path'] = $this->Common_Model->get_file_url($img, 'uploads/products/thumb/');
                        } else {
                            $temp['file_path'] = $this->Common_Model->get_file_url($img, 'uploads/products/');
                        }
                        // $temp['file_path'] = $this->Common_Model->get_file_url($img, 'uploads/products/');
                        $temp['file_name'] = $img;
                        array_push($image_urls, $temp);
                    }
                }
                $product_data->images = $image_urls;
                if ($product_data->datasheet_file) {
                    $product_data->datasheet_file_url = $this->Common_Model->get_file_url($product_data->datasheet_file, 'uploads/products/');
                }
                if ($product_data->reference_manual_file) {
                    $product_data->reference_manual_file_url = $this->Common_Model->get_file_url($product_data->reference_manual_file, 'uploads/products/');
                }
                if ($product_data->quick_installation_guide_file) {
                    $product_data->quick_installation_guide_file_url = $this->Common_Model->get_file_url($product_data->quick_installation_guide_file, 'uploads/products/');
                }
                $data['product'] = $product_data;
                $this->load->view('admin/index', $data);
            } else if ($param1 == 'view') {
                $data['page_name'] = 'product-view';
                $product_data = $this->Product_Model->get_data_by_product_id($param2);
                $categories_db = $this->Category_Model->get_all_list();
                $categories = '';
                foreach ($categories_db as $category) {
                    if ($product_data->category_id == $category['category_id']) {
                        $categories = $category['title'];
                    }
                    if ($product_data->sub_category_id == $category['category_id']) {
                        $categories .= ', ' . $category['title'];
                    }
                    if ($product_data->sub_sub_category_id == $category['category_id']) {
                        $categories .= ', ' . $category['title'];
                    }
                }
                $image_names = explode(',', $product_data->images);
                $image_urls = array();
                foreach ($image_names as $img) {
                    if ($img) {
                        if (file_exists('uploads/products/thumb/' . $img)) {
                            $image_urls[] = $this->Common_Model->get_file_url($img, 'uploads/products/thumb/');
                        } else {
                            $image_urls[] = $this->Common_Model->get_file_url($img, 'uploads/products/');
                        }
                        // $image_urls[] = $this->Common_Model->get_file_url($img, 'uploads/products/');

                    }
                }
                $product_data->category = $categories;
                $product_data->images = $image_urls;
                if ($product_data->datasheet_file) {
                    $product_data->datasheet_file_url = $this->Common_Model->get_file_url($product_data->datasheet_file, 'uploads/products/');
                }
                if ($product_data->reference_manual_file) {
                    $product_data->reference_manual_file_url = $this->Common_Model->get_file_url($product_data->reference_manual_file, 'uploads/products/');
                }
                if ($product_data->quick_installation_guide_file) {
                    $product_data->quick_installation_guide_file_url = $this->Common_Model->get_file_url($product_data->quick_installation_guide_file, 'uploads/products/');
                }
                $data['details'] = $product_data;
                $this->load->view('admin/index', $data);
            } else if ($param1 == 'save') {
                if ($param2 == 'upload') {
                    ini_set("memory_limit", "-1");
                    ini_set('upload_max_size', '20480M');
                    ini_set('post_max_size', '20480M');
                    if ($this->input->post('submit')) {
                        if (!file_exists($_FILES['productfile']['tmp_name']) || !is_uploaded_file($_FILES['productfile']['tmp_name'])) {
                            $this->session->set_flashdata('error', 'File is not selected');
                            redirect('admin/product/upload');
                        }
                        $inputFileName = $_FILES['productfile']['tmp_name'];
                        $inputFileparam1 = $this->spreadsheet->identify($inputFileName);
                        $reader = $this->spreadsheet->createReader($inputFileparam1);
                        $spreadsheet = $reader->load($inputFileName);
                        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                        $serialNumber = [];
                        if (!empty($sheetData)) {
                            if (!isset($sheetData[1])) {
                                $this->session->set_flashdata('error', 'Column names are missing');
                                redirect('admin/product/upload');
                            }
                            if (!isset($sheetData[2])) {
                                $this->session->set_flashdata('error', 'Data missing');
                                redirect('admin/product/upload');
                            }
                            foreach ($sheetData[1] as $colk => $colv) {
                                $col_map[$colk] = $colv;
                            }
                            for ($i = 2; $i <= count($sheetData); $i++) {
                                $serial = [];
                                foreach ($sheetData[$i] as $colk => $colv) {
                                    $serial[$col_map[$colk]] = $colv;
                                }
                                $serialNumber[] = $serial;
                            }
                        }
                        if (!empty($serialNumber)) {
                        }
                        $this->session->set_flashdata('success', 'Product uploaded');
                        redirect('admin/product');
                    }
                } elseif ($param2 == 'edit') {
                    if ($this->input->post('submit')) {
                        // $data['serial_number'] = $this->input->post('serial_number');
                        $data['title'] = $this->input->post('title');
                        $data['slug'] = url_title($data['title'], 'dash', true);
                        if ($this->Product_Model->get_data_by_product_slug($data['slug'], $this->input->post('product_id'))) {
                            $this->session->set_flashdata('error', 'Please change title, Title already exist!');
                            redirect('admin/product/edit/' . $this->input->post('product_id'), 'refresh');
                        }
                        $data['category_id'] = $this->input->post('category');
                        $data['sub_category_id'] = $this->input->post('sub_category');
                        $data['sub_sub_category_id'] = $this->input->post('sub_sub_category');
                        $data['description'] = $this->input->post('description');
                        $data['overview'] = $this->input->post('overview');
                        $data['features'] = $this->input->post('features');
                        $data['specification'] = $this->input->post('specification');
                        $data['video_url'] = $this->input->post('video_url');
                        $data['images'] = implode(',', $this->input->post('uploaded_image'));
                        $data['datasheet_file'] = $this->input->post('datasheet_uploaded_file');
                        $data['datasheet_title'] = $this->input->post('datasheet_title');
                        $data['datasheet_url'] = $this->input->post('datasheet_url');
                        $data['reference_manual_file'] = $this->input->post('reference_manual_uploaded_file');
                        $data['reference_manual_title'] = $this->input->post('reference_manual_title');
                        $data['reference_manual_url'] = $this->input->post('reference_manual_url');
                        $data['quick_installation_guide_file'] = $this->input->post('quick_installation_guide_uploaded_file');
                        $data['quick_installation_guide_title'] = $this->input->post('quick_installation_guide_title');
                        $data['quick_installation_guide_url'] = $this->input->post('quick_installation_guide_url');
                        $data['ip_address'] = $this->ip_address;
                        $data['order_by'] = $this->input->post('order_by');
                        $response = $this->db->where('product_id', $this->input->post('product_id'))->update('products', $data);
                        if ($response) {
                            $this->session->set_flashdata('success', 'Product successfully updated.');
                            redirect('admin/product');
                        } else {
                            $this->session->set_flashdata('error', 'Failed to update product.');
                            redirect('admin/product');
                        }
                    }
                } elseif ($param2 == 'clone') {
                    if ($this->input->post('submit')) {
                        // $data['serial_number'] = $this->input->post('serial_number');
                        $data['title'] = $this->input->post('title');
                        $data['slug'] = url_title($data['title'], 'dash', true);
                        if ($this->Product_Model->get_data_by_product_slug($data['slug'])) {
                            $this->session->set_flashdata('error', 'Please change title, Title already exist!');
                            redirect('admin/product/clone/' . $this->input->post('product_id'), 'refresh');
                        }
                        $data['category_id'] = $this->input->post('category');
                        $data['sub_category_id'] = $this->input->post('sub_category');
                        $data['sub_sub_category_id'] = $this->input->post('sub_sub_category');
                        $data['description'] = $this->input->post('description');
                        $data['overview'] = $this->input->post('overview');
                        $data['features'] = $this->input->post('features');
                        $data['specification'] = $this->input->post('specification');
                        $data['video_url'] = $this->input->post('video_url');
                        $data['images'] = implode(',', $this->input->post('uploaded_image'));
                        $data['datasheet_file'] = $this->input->post('datasheet_uploaded_file');
                        $data['datasheet_title'] = $this->input->post('datasheet_title');
                        $data['datasheet_url'] = $this->input->post('datasheet_url');
                        $data['reference_manual_file'] = $this->input->post('reference_manual_uploaded_file');
                        $data['reference_manual_title'] = $this->input->post('reference_manual_title');
                        $data['reference_manual_url'] = $this->input->post('reference_manual_url');
                        $data['quick_installation_guide_file'] = $this->input->post('quick_installation_guide_uploaded_file');
                        $data['quick_installation_guide_title'] = $this->input->post('quick_installation_guide_title');
                        $data['quick_installation_guide_url'] = $this->input->post('quick_installation_guide_url');
                        $data['ip_address'] = $this->ip_address;
                        $data['order_by'] = $this->input->post('order_by');
                        $response = $this->db->insert('products', $data);
                        // $response = $this->db->where('product_id', $this->input->post('product_id'))->update('products', $data);
                        if ($response) {
                            $this->session->set_flashdata('success', 'Product successfully cloned.');
                            redirect('admin/product');
                        } else {
                            $this->session->set_flashdata('error', 'Failed to clone product.');
                            redirect('admin/product');
                        }
                    }
                } else {
                    if ($this->input->post('submit')) {
                        // $data['serial_number'] = $this->input->post('serial_number');
                        $data['title'] = $this->input->post('title');
                        $data['slug'] = url_title($data['title'], 'dash', true);
                        if ($this->Product_Model->get_data_by_product_slug($data['slug'])) {
                            $this->session->set_flashdata('error', 'Please change title, Title already exist!');
                            redirect('admin/product/add/', 'refresh');
                        }
                        $data['category_id'] = $this->input->post('category');
                        $data['sub_category_id'] = $this->input->post('sub_category');
                        $data['sub_sub_category_id'] = $this->input->post('sub_sub_category');
                        $data['description'] = $this->input->post('description');
                        $data['overview'] = $this->input->post('overview');
                        $data['features'] = $this->input->post('features');
                        $data['specification'] = $this->input->post('specification');
                        $data['video_url'] = $this->input->post('video_url');
                        $data['images'] = implode(',', $this->input->post('uploaded_image'));
                        $data['datasheet_file'] = $this->input->post('datasheet_uploaded_file');
                        $data['datasheet_title'] = $this->input->post('datasheet_title');
                        $data['datasheet_url'] = $this->input->post('datasheet_url');
                        $data['reference_manual_file'] = $this->input->post('reference_manual_uploaded_file');
                        $data['reference_manual_title'] = $this->input->post('reference_manual_title');
                        $data['reference_manual_url'] = $this->input->post('reference_manual_url');
                        $data['quick_installation_guide_file'] = $this->input->post('quick_installation_guide_uploaded_file');
                        $data['quick_installation_guide_title'] = $this->input->post('quick_installation_guide_title');
                        $data['quick_installation_guide_url'] = $this->input->post('quick_installation_guide_url');
                        $data['ip_address'] = $this->ip_address;
                        $data['order_by'] = $this->input->post('order_by');
                        $response = $this->db->insert('products', $data);
                        if ($response) {
                            $this->session->set_flashdata('success', 'Product successfully added.');
                            redirect('admin/product');
                        } else {
                            $this->session->set_flashdata('error', 'Failed to save product.');
                            redirect('admin/product');
                        }
                    }
                }
            } else if ($param1 == 'image') {
                if ($param2 == 'upload') {
                    $response = $this->Common_Model->upload_file($_FILES['p_image'], 'p_image', 'uploads/products/', 'product');
                    echo $response;
                }
                if ($param2 == 'delete') {
                    $image_url = $this->input->post('image_url');
                    $response = json_encode(['status' => false, 'status_code' => '302', 'message' => 'Image not selected!']);
                    if ($image_url) {
                        $response = $this->Common_Model->delete_file($image_url);
                        if ($this->input->post('is_new_uploaded') == 'no') {
                            $json_res = json_decode($response);
                            if ($json_res->status_code == '200') {
                                $product_data = $this->Product_Model->get_data_by_product_id($this->input->post('product_id'));
                                $image_names = explode(',', $product_data->images);
                                $image_names_rem = array();
                                foreach ($image_names as $img) {
                                    if ($img != $image_url) {
                                        array_push($image_names_rem, $img);
                                    }
                                }
                                $rem_images = implode(',', $image_names_rem);
                                $response_update = $this->db->where('product_id', $this->input->post('product_id'))->update('products', ['images' => $rem_images]);
                                if ($response_update) {
                                    $response = json_encode(['status' => true, 'status_code' => '200', 'message' => 'File successfully deleted.']);
                                } else {
                                    $response = json_encode(['status' => false, 'status_code' => '302', 'message' => 'Failed to delete file.']);
                                }
                            }
                        }
                    }
                    echo $response;
                }
            } else if ($param1 == 'file') {
                if ($param2 == 'upload') {
                    $response = $this->Common_Model->upload_pdf_file($_FILES['u_file'], 'u_file', 'uploads/products/', 'product_' . $this->input->post('file_for'));
                    // if($this->input->post('existing_file')){
                    // 	$json_res = json_decode($response);
                    // 	if($json_res->status_code == '200'){
                    // 		$response_d = $this->Common_Model->delete_file('uploads/products/'.$this->input->post('existing_file'));
                    // 	}
                    // }
                    echo $response;
                }
                if ($param2 == 'delete') {
                    $image_url = $this->input->post('u_file');
                    $response = json_encode(['status' => false, 'status_code' => '302', 'message' => 'Image not selected!']);
                    if ($image_url) {
                        $response = $this->Common_Model->delete_file($image_url);
                        if ($this->input->post('is_new_uploaded') == 'no') {
                            $json_res = json_decode($response);
                            if ($json_res->status_code == '200') {
                                $product_data = $this->Product_Model->get_data_by_product_id($this->input->post('product_id'));
                                $response_update = $this->db->where('product_id', $this->input->post('product_id'))->update('products', [$this->input->post('file_for') . '_file' => '']);
                                // print_r($response_update);
                                if ($response_update) {
                                    $response = json_encode(['status' => true, 'status_code' => '200', 'message' => 'File successfully deleted.']);
                                } else {
                                    $response = json_encode(['status' => false, 'status_code' => '302', 'message' => 'Failed to delete file.']);
                                }
                            }
                        }
                    }
                    echo $response;
                }
            } else if ($param1 == 'status') {
                $response_update = $this->db->where('product_id', $this->input->post('product_id'))->update('products', ['active_status' => $this->input->post('changed_status')]);
                if ($response_update) {
                    $response = json_encode(['status' => true, 'status_code' => '200']);
                } else {
                    $response = json_encode(['status' => false, 'status_code' => '302']);
                }
                echo $response;
            } else {
                $products = $this->Product_Model->get_all_list();
                $categories_db = $this->Category_Model->get_all_list();
                $final_data = array();
                foreach ($products as $row) {
                    $temp['product_id'] = $row['product_id'];
                    $temp['title'] = $row['title'];
                    $categories = '';
                    foreach ($categories_db as $category) {
                        if ($row['category_id'] == $category['category_id']) {
                            $categories = $category['title'];
                        }
                        if ($row['sub_category_id'] == $category['category_id']) {
                            $categories .= ', ' . $category['title'];
                        }
                        if ($row['sub_sub_category_id'] == $category['category_id']) {
                            $categories .= ', ' . $category['title'];
                        }
                    }
                    $temp['category'] = $categories;
                    $temp['serial_number'] = $row['serial_number'];
                    $image_names = explode(',', $row['images']);
                    $image_url = '';
                    foreach ($image_names as $img) {
                        if ($img) {
                            if (file_exists('uploads/products/thumb/' . $img)) {
                                $image_url = $this->Common_Model->get_file_url($img, 'uploads/products/thumb/');
                            } else {
                                $image_url = $this->Common_Model->get_file_url($img, 'uploads/products/');
                            }
                            // $image_url = $this->Common_Model->get_file_url($img, 'uploads/products/');
                            break;
                        }
                    }
                    $temp['image'] = $image_url;
                    $temp['created_at'] = date("M d Y", strtotime($row['created_at']));
                    $temp['active_status'] = $row['active_status'];
                    $temp['order_by'] = $row['order_by'];
                    array_push($final_data, $temp);
                }
                $data['list'] = $final_data;
                $data['page_name'] = 'product';
                $data['js_page_name'] = 'product-add';
                $this->load->view('admin/index', $data);
            }
        } else {
            $data['page_name'] = 'login';
            $this->load->view('admin/login', $data);
        }
    }
    public function category($param1 = 'list', $param2 = 'insert')
    {
        if ($param1 == 'child') {
            $parent_id = $this->input->post('id');
            if ($parent_id) {
                $child_category = $this->Category_Model->get_child_category($parent_id);
                echo json_encode($child_category);
            } else {
                echo json_encode(array());
            }
        } else if ($param1 == 'add') {
            $data['page_name'] = 'category-add';
            $data['js_page_name'] = 'category-add';
            $data['parent_category'] = $this->Category_Model->get_parent_category();
            $this->load->view('admin/index', $data);
        } else if ($param1 == 'edit') {
            $data['page_name'] = 'category-edit';
            $data['js_page_name'] = 'category-add';
            $data['c_data'] = $this->Category_Model->get_category_by_id($param2);
            $data['parent_category'] = $this->Category_Model->get_parent_category();
            $this->load->view('admin/index', $data);
        } else if ($param1 == 'save') {
            if ($param2 == 'edit') {
                if ($this->input->post('submit')) {
                    if ($this->input->post('submit')) {
                        $data['title'] = $this->input->post('title');
                        $data['slug'] = url_title($data['title'], 'dash', true);
                        $data['display_in_order'] = $this->input->post('display_in_order');
                        // Check if a category with the same slug already exists and exclude the current category
                        if ($this->Category_Model->get_data_by_category_slug($data['slug'], $this->input->post('category_id'))) {
                            $this->session->set_flashdata('error', 'Please change the title; a category with the same title already exists.');
                            redirect('admin/category/edit/' . $this->input->post('category_id'), 'refresh');
                            return; // Exit the function

                        }
                        $data['parent_category_id'] = $this->input->post('category');
                        $data['ip_address'] = $this->ip_address;
                        // Handle category_thumbnail upload only if submitted
                        if (!empty($_FILES['category_thumbnail']['tmp_name'])) {
                            $config['upload_path'] = FCPATH . 'uploads/category_thumbnail/'; // FCPATH is a CodeIgniter constant representing the server's file system path to the index.php file.
                            $config['max_size'] = '5000';
                            $config['max_width'] = 300;
                            $config['max_height'] = 400;
                            $config['allowed_types'] = 'jpg|png|jpeg';
                            $this->load->library('upload', $config);
                            if ($this->upload->do_upload('category_thumbnail')) {
                                $uploadData = $this->upload->data();
                                $data['category_thumbnail'] = $uploadData['raw_name'] . $uploadData['file_ext'];
                            } else {
                                $this->session->set_flashdata('error', $this->upload->display_errors());
                                redirect('admin/category/edit/' . $this->input->post('category_id'));
                                return; // Exit the function

                            }
                        }
                        // Update the category data in the database
                        $response = $this->db->where('category_id', $this->input->post('category_id'))->update('categories', $data);
                        if ($response) {
                            $this->session->set_flashdata('success', 'Category successfully updated.');
                        } else {
                            $this->session->set_flashdata('error', 'Failed to update category.');
                        }
                        redirect('admin/category');
                    }
                }
            } else {
                if ($this->input->post('submit')) {
                    $data['title'] = $this->input->post('title');
                    $data['slug'] = url_title($data['title'], 'dash', true);
                    $data['display_in_order'] = $this->input->post('display_in_order');
                    // Check if a category with the same slug already exists
                    if ($this->Category_Model->get_data_by_category_slug($data['slug'])) {
                        $this->session->set_flashdata('error', 'Please change the title, A category with the same title already exists.');
                    } else {
                        $data['parent_category_id'] = $this->input->post('sub_category');
                        $data['ip_address'] = $this->ip_address;
                        // Handle category thumbnail upload
                        if (!empty($_FILES['category_thumbnail']['tmp_name'])) {
                            $config['upload_path'] = './uploads/category_thumbnail/';
                            $config['max_size'] = '500';
                            $config['max_width'] = 300;
                            $config['max_height'] = 400;
                            $config['allowed_types'] = 'jpg|png|jpeg';
                            $this->load->library('upload', $config);
                            if ($this->upload->do_upload('category_thumbnail')) {
                                $uploadData = $this->upload->data();
                                $data['category_thumbnail'] = $uploadData['raw_name'] . $uploadData['file_ext'];
                            } else {
                                $this->session->set_flashdata('error', 'Failed to upload category thumbnail.');
                                redirect('admin/category');
                                return; // Exit the function

                            }
                        }
                        // Insert the category data into the database
                        $response = $this->db->insert('categories', $data);
                        if ($response) {
                            $this->session->set_flashdata('success', 'Category successfully added.');
                        } else {
                            $this->session->set_flashdata('error', 'Failed to save category.');
                        }
                    }
                    redirect('admin/category'); // Redirect after processing

                }
            }
        } else {
            $categories_db = $this->Category_Model->get_category_list_no_child();
            $final_data = array();
            foreach ($categories_db as $row) {
                $temp = array('category_id' => $row['category_id'], 'title' => $row['title'], 'display_in_order' => $row['display_in_order'], 'created_at' => date("M d Y h:i A", strtotime($row['created_at'])));
                // Check if the 'category_thumbnail' key exists in $row
                if (array_key_exists('category_thumbnail', $row)) {
                    $temp['category_thumbnail'] = $row['category_thumbnail'];
                } else {
                    // Handle the case where 'category_thumbnail' is not present
                    $temp['category_thumbnail'] = 'default_thumbnail.jpg'; // Provide a default value or handle as needed

                }
                // Check if parent_category_id is 0
                if ($row['parent_category_id'] == 0) {
                    // Main category, set the category name as "Main Category"
                    $temp['category_name'] = 'Main Category';
                } else {
                    // Sub-category, fetch the category name from the database or handle as needed
                    $subCategory = $this->Category_Model->get_category_by_id($row['parent_category_id']);
                    $temp['category_name'] = $subCategory->title; // Assuming 'title' is the category name field

                }
                array_push($final_data, $temp);
            }
            $data['list'] = $final_data;
            $data['page_name'] = 'category';
            $this->load->view('admin/index', $data);
        }
    }
    public function login()
    {
        // Check if the user is already logged in
        if ($this->session->userdata('admin_login') === 'yes') {
            redirect('admin'); // Redirect to the admin dashboard if logged in

        }
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $data['page_name'] = 'login';
            // Load the login UI page
            $this->load->view('admin/login', $data); // Adjust the view name to your actual view file

        } else {
            $email = $this->input->post('email');
            $password = sha1($this->input->post('password'));
            $userDetail = $this->Shinearium_Model->getAdminByEmail('admin', $email);
            if ($userDetail && $userDetail->status == 0) {
                $login_data = $this->db->get_where('admin', ['email' => $email, 'password' => $password]);
                if ($login_data->num_rows() > 0) {
                    $row = $login_data->row();
                    $this->session->set_userdata(['login' => 'yes', 'admin_login' => 'yes', 'admin_id' => $row->admin_id, 'title' => 'admin', 'user_type' => $userDetail->user_type]);
                    return redirect('admin');
                } else {
                    $this->session->set_flashdata('error', 'Failed to login, Email or Password does not match!');
                    return redirect('admin/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Failed to login, Email or Password does not match!');
                return redirect('admin/login');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }
    public function changePassword($param1 = 'page')
    {
        if ($this->session->userdata('admin_login') == 'yes') {
            if ($param1 == 'save') {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('current_password', 'Password', 'required');
                $this->form_validation->set_rules('new_password', 'Password', 'required');
                $this->form_validation->set_rules('retype_password', 'Password', 'required');
                if ($this->form_validation->run() == false) {
                    $this->session->set_flashdata('error', validation_errors());
                    redirect(base_url('') . 'change-password', 'refresh');
                }
                if ($this->input->post('new_password') != $this->input->post('retype_password')) {
                    $this->session->set_flashdata('error', 'New Password And Retype New Password does not matched');
                    redirect(base_url('') . 'change-password', 'refresh');
                } else {
                    $login_data = $this->db->get_where('admin', ['admin_id' => $this->session->userdata('admin_id'), 'password' => sha1($this->input->post('current_password')),]);
                    if ($login_data->num_rows() > 0) {
                        $response_update = $this->db->where('admin_id', $this->session->userdata('admin_id'))->update('admin', ['password' => sha1($this->input->post('new_password'))]);
                        if ($response_update) {
                            redirect(base_url('') . 'admin/logout');
                        } else {
                            $this->session->set_flashdata('error', 'Failed to change password');
                            redirect(base_url('') . 'change-password', 'refresh');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Failed to change password, Current Password does not matched!');
                        redirect(base_url('') . 'change-password', 'refresh');
                    }
                }
            } else {
                $data['page_name'] = 'change-password';
                $this->load->view('admin/index', $data);
            }
        } else {
            $data['page_name'] = 'login';
            $this->load->view('admin/login', $data);
        }
    }
}
