<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

	/*public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        $data = array();
        if(!$this->session->userdata('userlogin')){
            redirect('User/login'); 
        }
    }*/

	public function index()
	{ 
        $this->home();	
	}
	public function home(){
	    $data = array();
	    $data['title'] = '';
	    $data['header'] = $this->load->view('partial/header','',TRUE);
	    $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
	    $data['content'] = $this->load->view('partial/content','',TRUE);
	    $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }
}
