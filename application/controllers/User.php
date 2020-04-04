<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('user_model');
    }

    //Insert Login
    public function login(){
        $this->load->view('login');
    }

    //Login Form
    public function loginForm(){
        $data = array();
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');

        $check = $this->user_model->checkUser($data);
        if($check){
            $sdata = array();
            $sdata['id'] = $check->id;
            $sdata['userlogin'] = TRUE;
            $this->session->set_userdata($sdata);
            redirect('Library'); 
        }
        else{
            $sdata = array();
            redirect('User/login'); 
        }
    }

    public function logout(){
            $this->session->unset_userdata($id);
            $this->session->set_userdata('userlogin', FALSE);
            $this->session->sess_destroy();
            redirect('User/login'); 
        
    }
}