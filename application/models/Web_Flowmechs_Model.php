<?php

class Web_Flowmechs_Model extends CI_model
{
  public function dbcontactEnquiry($tbl,$contactData)
  {
    return $this->db->insert($tbl,$contactData);
  }
  public function dbApplyforJob($tbl, $resumeData)
  {
    return $this->db->insert($tbl,$resumeData);
  }
  public function dbwhistleBlowerEnquiry($tbl, $whistleBlowerData)
  {
    return $this->db->insert($tbl,$whistleBlowerData);
  }
  // public function dbRegisterProduct($tbl, $productData)
  // {
  //   return $this->db->insert($tbl, $productData);
  // }
  // public function dbRegisteProduct($tbl, $productData)
  // {
  //   return $this->db->insert($tbl, $productData);
  // }
  public function dbTechSquad($tbl, $squadData)
  {
    return $this->db->insert($tbl, $squadData);
  }
  public function dbRequestfordoa($tbl, $doaData)
  {
    return $this->db->insert($tbl, $doaData);
  }
  public function dbSupportRequest($tbl, $supportRequestData)
  {
    return $this->db->insert($tbl, $supportRequestData);
  }
  public function dbContactForm($tbl, $contacFornData)
  {
    return $this->db->insert($tbl, $contacFornData);
  }
  public function dbProjectLocking($tbl, $projectLockingData)
  {
    return $this->db->insert($tbl, $projectLockingData);
  }
    public function dbdemoRequest($tbl, $demoRequestData)
  {
    return $this->db->insert($tbl, $demoRequestData);
  }
     public function dbRequestTraining($tbl, $requestTrainingData)
  {
    return $this->db->insert($tbl, $requestTrainingData);
  }
  public function dbbecomeNewPartner($tbl, $becomePartnerData)
  {
    return $this->db->insert($tbl, $becomePartnerData);
  }
	public function dbInsertProductRegistration($tbl, $squadData)
  {
    return $this->db->insert($tbl, $squadData);
  }

  // check serial number exist or not in product registration
	//$first_name = null, $last_name = null, $emailid,
	public function check_product_resitraion_existancy($serial_number)
	{
		$this->db->where('find_in_set("'.$serial_number.'", product_serial_numbers) <> 0');
		// where(array('first_name' => $first_name, 'last_name' => $last_name, 'mail_id' => $emailid))
		$data = $this->db->get('product_registrations')->row();
		return $data;
	}

	// get data by serial number
	public function get_data_by_serial_number($serial_number)
	{
		$this->db->where('find_in_set("'.$serial_number.'", serial_number) <> 0');
		$data = $this->db->get('serial_numbers')->row();//get_where('serial_numbers', array('serial_number' => $serial_number))->row();
		return $data;
	}

  public function getBecomeNewPartner ()
    {
      $conditions = "applicationStatus='0' OR applicationStatus='1' OR applicationStatus='2' OR applicationStatus='4'";
      $this->db->order_by('become_new_partner.id', 'DESC');
      $query = $this->db->where($conditions)->get('become_new_partner');
      return $query;

  }
  public function getContactEnquiry()
    {
      $this->db->order_by('contact_enquiry_tbl.id', 'DESC');
      $query = $this->db->get('contact_enquiry_tbl');
      return $query;

  }

  public function getJobApplication()
    {
      $this->db->order_by('job_application.id', 'DESC');
      $query = $this->db->get('job_application');
      return $query;

    }
  public function getProductSupport()
    {
      $this->db->order_by('product_support_tbl.id', 'DESC');
      $query = $this->db->get('product_support_tbl');
      return $query;

    }
  public function getProjectLocking()
    {
      $this->db->order_by('project_locking_tbl.id', 'DESC');
      $query = $this->db->get('project_locking_tbl');
      return $query;

    }
  public function getRequestDemo()
    {
      $this->db->order_by('request_demo_tbl.id', 'DESC');
      $query = $this->db->get('request_demo_tbl');
      return $query;

    }
   public function getEmployeeList()
    {
      $this->db->order_by('employee_tbl.id', 'DESC');
      $query = $this->db->get('employee_tbl');
      return $query;

    }
  public function getRequestdoa()
    {
      $this->db->order_by('request_doa_tbl.id', 'DESC');
      $query = $this->db->get('request_doa_tbl');
      return $query;

    }
  public function getRequestTraining()
    {
      $this->db->order_by('request_training_tbl.id', 'DESC');
      $query = $this->db->get('request_training_tbl');
      return $query;

    }
  public function getTechSquad()
    {
      $this->db->order_by('tech_squad_tbl.id', 'DESC');
      $query = $this->db->get('tech_squad_tbl');
      return $query;

    }
  public function getWhistleBlowerEnquiry()
    {
      $this->db->order_by('whistle_blower_enquiry.id', 'DESC');
      $query = $this->db->get('whistle_blower_enquiry');
      return $query;

    }
public function dbSubmitEmployee($tbl, $employeeData)
  {
    return $this->db->insert($tbl, $employeeData);
  }
 public function dbfetchEmployeData($id)
  {
    $query = $this->db->get_where('employee_tbl',['id'=>$id]);
    return $query->row();
  }
public function dbSubmitEditEmployee($tbl, $employeeData,$cond)
  {
        if ($cond != null) {
            $this->db->where($cond);
        }
        return $this->db->update($tbl, $employeeData, $cond);
  }
public function dbDeleteEmployee($tbl, $cond=NULL)
  {
    if($cond!=NULL)
    {
      $this->db->where($cond);
    }
    return $this->db->delete($tbl);
  }
   public function getMediaList()
    {
      $this->db->order_by('media_center_tbl.id', 'DESC');
      $query = $this->db->get('media_center_tbl');
      return $query;

    }
  public function dbsubmitMediaCenter($tbl, $mediaData)
       {
         return $this->db->insert($tbl, $mediaData);
       }
  public  function getMediaData($tbl,$cond=null)
    {
      if($cond!=null)
      {
        $this->db->where($cond);
      }
      return $this->db->get($tbl);

    }
  public  function getMediaBlog()
    {
         $this->db->order_by('media_center_tbl.id', 'DESC');
         $query = $this->db->get('media_center_tbl');
        return $query;
    }
 public function dbfetchMedia($id)
  {
    $query = $this->db->get_where('media_center_tbl',['id'=>$id]);
    return $query->row();
  }
public function dbUpdateMediaCenter($tbl, $mediaData,$cond)
  {
        if ($cond != null) {
            $this->db->where($cond);
        }
        return $this->db->update($tbl, $mediaData, $cond);
  }

public  function dbDeleteMedia($tbl, $cond=NULL)
  {
    if($cond!=NULL)
    {
      $this->db->where($cond);
    }
    return $this->db->delete($tbl);
  }
 public function dbProjectlockingId($id)
  {
    $query = $this->db->get_where('project_locking_tbl',['id'=>$id]);
    return $query->row();
  }
  public function dbAssignEmployee($tbl, $assignData, $cond)
    {
      print_r($assignData);
      if ($cond!=NULL) {
      $this->db->where($cond);
      }
      $flag = $this->db->update($tbl, $assignData, $cond);
      if ($flag == true)
      {
        return 'done';
      }
      else
      {
        return 'error';

      }
    }
  function getAdminTbl($tbl, $cond)
    {
     if ($cond!=NULL)
     {
      $this->db->where($cond);
     }
     return $this->db->get($tbl);
    }
  function dbStaffSubmit($tbl, $userData)
    {
     return $this->db->insert($tbl, $userData);
    }
  public function dbGetStaff($cond)
  {

    if ($cond!=NULL)
    {
      $this->db->not_like($cond);
    }
    return $this->db->get('admin');
  }
  public function dbStaffStatus($tbl, $staffData , $cond)
  {
    if ($cond!=NULL)
    {
      $this->db->where($cond);
    }
    return $this->db->update($tbl, $staffData);
  }
  public function dbStaffActive($tbl, $staffData , $cond)
  {
    if ($cond!=NULL)
    {
      $this->db->where($cond);
    }
    return $this->db->update($tbl, $staffData);
  }
  public function dbDeleteStaff($tbl, $cond)
  {
    if ($cond!=NULL)
    {
      $this->db->where($cond);
    }
    return $this->db->delete($tbl);
  }
  public function dbGetCategory($id, $limit) 
  {
    if(!empty($id)){ 
          $query = $this->db->limit($limit)->get_where('categories', array('category_id' => $id)); 
          return $query->row_array(); 
      }else{ 
          $query = $this->db->limit($limit)->get('categories'); 
          return $query->result_array(); 
      } 
  }
  public function dbGetCategoryId($slug) 
  {
    if(!empty($slug)){ 
          $query = $this->db->get_where('categories', array('slug' => $slug)); 
          return $query->row_array(); 
      }else{ 
          return false;
      } 
  }
  public function dbGetProductDetail($slug) 
  {
    if(!empty($slug)){ 
          $query = $this->db->get_where('products', array('slug' => $slug)); 
          return $query->row_array(); 
      }else{ 
          return false;
      } 
  }
  
  
  public function dbGetProductsList($id, $limit=NULL) 
  {
    if(!empty($id)){ 
          $query = $this->db->order_by('created_at', 'DESC')->limit($limit)->order_by('product_id', 'ASC')->get_where('products', array('category_id' => $id,'active_status'=>'active')); 
          return $query->result_array(); 
      }else{ 
          return false;
      } 
  }
  public function dbGetNewProductsList() 
  {
     $query = $this->db->order_by('created_at', 'DESC')->get('products'); 
          return $query->result_array(); 
  }
  public function dbGetProducts($category_id) 
  {
    if(!empty($category_id)){ 
          $query = $this->db->get_where('category_id', array('category_id' => $category_id)); 
          return $query->row_array(); 
      }else{ 
          $query = $this->db->get('categories'); 
          return $query->result_array(); 
      } 
  }

}


 ?>
