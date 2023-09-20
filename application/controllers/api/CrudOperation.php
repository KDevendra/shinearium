<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Include Rest Controller library
require APPPATH . 'libraries/REST_Controller.php';
class CrudOperation extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Web_Flowmechs_Model');
    }
    public function category_get($id = 0, $limit = null) {
        $users = $this->Web_Flowmechs_Model->dbGetCategory($id, $limit);
        if (!empty($users)) {
            $this->response($users, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'No users were found.', ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function category_footer_get($id = 0) {
        $users = $this->Web_Flowmechs_Model->dbGetCategory($id,6);
        if (!empty($users)) {
            $this->response($users, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'No users were found.', ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function category_id_get($slug) {
        $GetCategoryId = $this->Web_Flowmechs_Model->dbGetCategoryId($slug);
        if (!empty($GetCategoryId)) {
            $this->response($GetCategoryId, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'No users were found.', ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function products_list_get($id) {
        $GetProductsList = $this->Web_Flowmechs_Model->dbGetProductsList($id);
        if (!empty($GetProductsList)) {
            $this->response($GetProductsList, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'No users were found.', ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
     public function new_products_list_get() {
        $GetProductsList = $this->Web_Flowmechs_Model->dbGetNewProductsList();
        if (!empty($GetProductsList)) {
            $this->response($GetProductsList, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'No users were found.', ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function related_products_get($id) {
        $GetProductsList = $this->Web_Flowmechs_Model->dbGetProductsList($id, 3);
        if (!empty($GetProductsList)) {
            $this->response($GetProductsList, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'No users were found.', ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
     public function product_detail_get($slug) {
        $GetProductDetail = $this->Web_Flowmechs_Model->dbGetProductDetail($slug);
        if (!empty($GetProductDetail)) {
            $this->response($GetProductDetail, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'No users were found.', ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function users_post() {
        $userData = ['first_name' => $this->post('first_name'), 'last_name' => $this->post('last_name'), 'email' => $this->post('email'), 'phone' => $this->post('phone'), ];
        if (!empty($userData['first_name']) && !empty($userData['last_name']) && !empty($userData['email']) && filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            $insert = $this->user->insert($userData);
            if ($insert) {
                $this->response(['status' => true, 'message' => 'User has been added successfully.', ], REST_Controller::HTTP_OK);
            } else {
                $this->response("Something went wrong, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response("Provide complete user information to create.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function users_put() {
        $id = $this->put('id');
        if (!empty($id)) {
            $userData = [];
            if (!empty($this->put('first_name'))) {
                $userData['first_name'] = $this->put('first_name');
            }
            if (!empty($this->put('last_name'))) {
                $userData['last_name'] = $this->put('last_name');
            }
            if (!empty($this->put('email'))) {
                $userData['email'] = $this->put('email');
            }
            if (!empty($this->put('phone'))) {
                $userData['phone'] = $this->put('phone');
            }
            if (!empty($userData)) {
                $update = $this->user->update($userData, $id);
                if ($update) {
                    $this->response(['status' => true, 'message' => 'User has been updated successfully.', ], REST_Controller::HTTP_OK);
                } else {
                    $this->response("Something went wrong, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $this->response("Provide user information to update.", REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response("Provide the reference ID of the user to be updated.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function users_delete($id) {
        if ($id) {
            $delete = $this->user->delete($id);
            if ($delete) {
                $this->response(['status' => true, 'message' => 'User has been removed successfully.', ], REST_Controller::HTTP_OK);
            } else {
                $this->response("Something went wrong, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response(['status' => false, 'message' => 'No users were found.', ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
