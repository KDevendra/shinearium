<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Common_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->db)) {
            $this->load->database();
        }
        // $this->load->library('upload');
    }
    function clear_cache()
    {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    // function upload_file($file, $feild, $path, $filename)
    // {
    // 	if (empty($file['name']) || !file_exists($file['tmp_name']) || !is_uploaded_file($file['tmp_name']))
    // 	{
    // 		return json_encode(['status' => false, 'message' => 'File not selected!']);
    // 	}
    // 	$ext = '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    // 	$file_name = $filename.'-'.time().$ext;
    // 	// Set preference
    // 	$config['upload_path'] = $path;
    // 	$config['allowed_types'] = 'jpg|jpeg|png';
    // 	$config['max_size'] = '2048'; // max_size in kb
    // 	$config['file_name'] = $file_name;
    // 	$config['encrypt_name'] = FALSE;
    // 	// initialize upload config
    // 	$this->upload->initialize($config);
    // 	if (!$this->upload->do_upload($feild))
    //     {
    //         return json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
    //     }
    //     else
    //     {
    //         $data = $this->upload->data();
    // 		return json_encode(['status' => true, 'message' => 'File successfully uploaded!', 'file_path' => base_url($path).$data["file_name"], 'file_name' => $data["file_name"]]);
    //     }
    // }
    // function delete_file($filepath)
    // {
    // 	if(file_exists($filepath))
    // 	{
    // 		$response = unlink($filepath);
    // 		if($response)
    // 		{
    // 			return json_encode(['status' => true, 'status_code' => '200', 'message' => 'File successfully deleted.']);
    // 		}
    // 		else
    // 		{
    // 			return json_encode(['status' => false, 'status_code' => '302', 'message' => 'Failed to delete file.']);
    // 		}
    // 	}
    // 	else
    // 	{
    // 		return json_encode(['status' => false, 'status_code' => '302', 'message' => 'File not found']);
    // 	}
    // }
    function upload_file($file, $feild, $path, $filename)
    {
        if (empty($file['name']) || !file_exists($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            return json_encode(['status' => false, 'message' => 'File not selected!']);
        }
        $ext = '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $file_name = $filename . '-' . time() . $ext;
        // Set preference
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '5000'; // max_size in kb
        $config['file_name'] = $file_name;
        $config['encrypt_name'] = false;
        // initialize upload config
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($feild)) {
            return json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
        } else {
            $data = $this->upload->data();
            $this->resizeImage($data['file_name'], $path);
            return json_encode(['status' => true, 'message' => 'File successfully uploaded!', 'file_path' => base_url($path) . 'thumb/' . $data["file_name"], 'file_name' => $data["file_name"]]);
        }
    }
    function delete_file($filepath)
    {
        $filepath_org = 'uploads/products/' . $filepath;
        $thumb_filepath = 'uploads/products/thumb/' . $filepath;
        if (file_exists($filepath_org)) {
            $response = unlink($filepath_org);
            if ($response) {
                if (file_exists($thumb_filepath)) {
                    unlink($thumb_filepath);
                }
                return json_encode(['status' => true, 'status_code' => '200', 'message' => 'File successfully deleted.']);
            } else {
                return json_encode(['status' => false, 'status_code' => '302', 'message' => 'Failed to delete file.']);
            }
        } else {
            return json_encode(['status' => false, 'status_code' => '302', 'message' => 'File not found']);
        }
    }
    function resizeImage($filename, $path)
    {
        $source_path = $path . $filename; //$_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $filename;
        $target_path = $path . 'thumb/'; //$_SERVER['DOCUMENT_ROOT'] . '/uploads/thumbnail/';
        $config_manip = ['image_library' => 'gd2', 'source_image' => $source_path, 'new_image' => $target_path, 'maintain_ratio' => true, 'create_thumb' => true, 'thumb_marker' => '', 'width' => 150, 'height' => 150];
        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            // echo $this->image_lib->display_errors();
            return json_encode(['status' => false, 'message' => $this->image_lib->display_errors()]);
        }
        $this->image_lib->clear();
    }
    function get_ip_address()
    {
        return $this->input->ip_address();
    }
    function find_value_in_array($array, $value, $res_column, $search_column)
    {
        foreach ($array as $row) {
            if ($value == $row->$search_column) {
                return $row->$res_column;
            }
        }
        return false;
    }
    function get_file_url($file, $path)
    {
        return base_url($path) . $file;
    }
    function upload_invoice_file($file, $feild, $path, $filename)
    {
        if (empty($file['name']) || !file_exists($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            return json_encode(['status' => false, 'message' => 'File not selected!']);
        }
        $ext = '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $file_name = $filename . '-' . time() . $ext;
        // Set preference
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = '5000'; // max_size in kb
        $config['file_name'] = $file_name;
        $config['encrypt_name'] = false;
        // initialize upload config
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($feild)) {
            return json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
        } else {
            $data = $this->upload->data();
            return json_encode(['status' => true, 'message' => 'File successfully uploaded!', 'file_path' => base_url($path) . $data["file_name"], 'file_name' => $data["file_name"]]);
        }
    }
    function upload_pdf_file($file, $feild, $path, $filename)
    {
        if (empty($file['name']) || !file_exists($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            return json_encode(['status' => false, 'status_code' => '302', 'message' => 'File not selected!']);
        }
        $ext = '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $file_name = $filename . '-' . time() . $ext;
        // Set preference
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '5000'; // max_size in kb
        $config['file_name'] = $file_name;
        $config['encrypt_name'] = false;
        // initialize upload config
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($feild)) {
            return json_encode(['status' => false, 'status_code' => '302', 'message' => $this->upload->display_errors()]);
        } else {
            $data = $this->upload->data();
            return json_encode(['status' => true, 'status_code' => '200', 'message' => 'File successfully uploaded!', 'file_path' => base_url($path) . $data["file_name"], 'file_name' => $data["file_name"]]);
        }
    }
}
