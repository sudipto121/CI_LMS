<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('student_model');
        $this->load->model('dep_model');
        $data = array();

    }

    //Insert Student List
    public function addstudent(){
        $data['title'] = 'Add New Student';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['depdata'] = $this->dep_model->getAllDepartmentData();
        $data['content'] = $this->load->view('partial/studentadd', $data,TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }
    public function addStudentForm(){
        $data['name'] = $this->input->post('name');
        $data['dep'] = $this->input->post('dep');
        $data['roll'] = $this->input->post('roll');
        $data['reg'] = $this->input->post('reg');
        $data['session'] = $this->input->post('session');
        $data['batch'] = $this->input->post('batch');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');

        $name = $data['name'];
        $dep = $data['dep'];
        $roll = $data['roll'];
        $reg = $data['reg'];
        $session = $data['session'];
        $batch = $data['batch'];
        $email = $data['email'];
        $phone = $data['phone'];

        if(empty($name) && empty($dep) && empty($roll) && empty($reg) && empty($session) && empty($batch)){
            $sdata = array();
            $sdata['msg'] = '<span style="color: red">Field must not be empty !</span>';
            $this->session->set_flashdata($sdata);
            redirect("Student/addstudent");
        }
        else{
            $this->student_model->saveStudent($data);
            $sdata['msg'] = '<span style="color: green">Data added Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("Student/addstudent");
        }
    }

    //Show Student List
    public function studentlist(){
        $data['title'] = 'Student List';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['studentdata'] = $this->student_model->getAllStudentData();
        $data['content'] = $this->load->view('partial/liststudent', $data, TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }

    //Edit Student List 
    public function editstudent($sid){
        $data['title'] = 'Update Student';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['departmentdata'] = $this->dep_model->getAllDepartmentData();
        $data['stuById'] = $this->student_model->getStudentById($sid);
        $data['content'] = $this->load->view('partial/studentedit', $data, TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }

    //Update Student List
    public function updateStudent(){
        $data['sid'] = $this->input->post('sid');
        $data['name'] = $this->input->post('name');
        $data['dep'] = $this->input->post('dep');
        $data['roll'] = $this->input->post('roll');
        $data['reg'] = $this->input->post('reg');
        $data['session'] = $this->input->post('session');
        $data['batch'] = $this->input->post('batch');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');

        $sid = $data['sid'];
        $name = $data['name'];
        $dep = $data['dep'];
        $roll = $data['roll'];
        $reg = $data['reg'];
        $session = $data['session'];
        $batch = $data['batch'];
        $email = $data['email'];
        $phone = $data['phone'];

        if(empty($name) && empty($dep) && empty($roll) && empty($reg) && empty($session) && empty($batch)){
            $sdata = array();
            $sdata['msg'] = '<span style="color: red">Field must not be empty !</span>';
            $this->session->set_flashdata($sdata);
            redirect("Student/editstudent");
        }
        else{
            $this->student_model->updateStudentData($data);
            $sdata['msg'] = '<span style="color: green">Data Updated Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("Student/studentlist");
        }
    }

    //Delete Student List
    public function delstudent($sid){
        $this->student_model->delStudentByid($sid);
        $sdata = array();

        $sdata['msg'] = '<span style="color: red">Data Deleted Successfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("Student/studentlist");
    }
}
