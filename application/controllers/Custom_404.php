<?php

class Custom_404 extends CI_controller
{
  public function index()
  {
    $data['title']="Home | Web Flowmechs";
    $data['keywords']="";
    $data['desc']="";
    $data['menu']="home";
    $this->load->view('error-page', $data);
  }
}







 ?>
