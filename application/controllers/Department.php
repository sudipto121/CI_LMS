<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        $this->load->model('dep_model');
        $data = array();
        
    }

    public function addDepartment(){
        $data['title'] = 'Add Department Name';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['content'] = $this->load->view('partial/departmentadd','',TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }

    //Insert Department Name
    public function addDepartmentForm(){
        $data['depname'] = $this->input->post('depname');
     

        $depname = $data['depname'];
       
        if(empty($depname)){
            $sdata = array();
            $sdata['msg'] = '<span style="color: red">Field must not be empty !</span>';
            $this->session->set_flashdata($sdata);
            redirect("Department/addDepartment");
        }
        else{
            $this->dep_model->saveDepartment($data);
            $sdata['msg'] = '<span style="color: green">Data Added Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("Department/addDepartment");
        }
    }

    //Department List
    public function departmentlist(){
        $data['title'] = 'Department List';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['depdata'] = $this->dep_model->getAllDepartmentData();
        $data['content'] = $this->load->view('partial/listdepartment', $data, TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }


    public function editdepartment($id){
        $data['title'] = 'Update Department';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['depById'] = $this->dep_model->getDepartmentById($id);
        $data['content'] = $this->load->view('partial/departmentedit', $data, TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }

    //Update Department
    public function updateDepartmentForm(){
        $data['depid'] = $this->input->post('depid');
        $data['depname'] = $this->input->post('depname');
     
        $depid = $data['depid'];
        $depname = $data['depname'];
       
        if(empty($depname)){
            $sdata = array();
            $sdata['msg'] = '<span style="color: red">Field must not be empty !</span>';
            $this->session->set_flashdata($sdata);
            redirect("Department/editdepartment");
        }
        else{
            $this->dep_model->updateDepartment($data);
            $sdata['msg'] = '<span style="color: green">Data Updated Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("Department/departmentlist");
        }
    }

    //Delete Department
    public function deldepartment($id){
        $this->dep_model->delDepartmentByid($id);
        $sdata = array();

        $sdata['msg'] = '<span style="color: red">Data Deleted Successfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("Department/departmentlist");
    }



}