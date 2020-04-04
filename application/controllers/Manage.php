<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('author_model');
        $this->load->model('book_model');
        $this->load->model('dep_model');
        $this->load->model('manage_model');
        $data = array();
        
    }

    //Insert Issue Book List
    public function issuebook(){
        $data['title'] = 'Issue Book';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['depdata'] = $this->dep_model->getAllDepartmentData();
        $data['content'] = $this->load->view('partial/issuebook', $data,TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }

    public function getBookByDepId($dep){
        $getAllBook = $this->manage_model->getBookByDep($dep);
        $output = null;
        $output .='<option value="0">Select One</option>';
        foreach ($getAllBook as $book) {
            $output .='<option value="'.$book->bookid.'">'.$book->bookname.'</option>';            
        }
        echo $output;
    }

    public function addIssueForm(){
        $data['studentname'] = $this->input->post('studentname');
        $data['reg'] = $this->input->post('reg');
        $data['dep'] = $this->input->post('dep');
        $data['book'] = $this->input->post('book');
        $data['return'] = $this->input->post('return');

        $name = $data['studentname'];
        $reg = $data['reg'];
        $dep = $data['dep'];
        $book = $data['book'];
        $return = $data['return'];

        if(empty($name) && empty($dep) &&empty($reg) && empty($book) &&empty($return)){
            $sdata = array();
            $sdata['msg'] = '<span style="color: red">Field must not be empty !</span>';
            $this->session->set_flashdata($sdata);
            redirect("Manage/issuebook");
        }
        else{
            $this->manage_model->saveIssueData($data);
            $sdata['msg'] = '<span style="color: green">Data added Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("Manage/issuebook");
        }
    }

    //Show Issue Book
    public function issuelist(){
        $data['title'] = 'Issue List';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','', TRUE);
        $data['issuedata'] = $this->manage_model->getAllIssueData();
        $data['content'] = $this->load->view('partial/issuelist', $data, TRUE);
        $data['footer'] = $this->load->view('partial/footer','', TRUE);
        $this->load->view('home',$data);
    }

    //Edit Student List 
    public function editissue($id){
        $data['title'] = 'Update Issue Book';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['bookdata'] = $this->book_model->getAllBookData();
        $data['departmentdata'] = $this->dep_model->getAllDepartmentData();
        $data['issueById'] = $this->manage_model->getIssueById($id);
        $data['content'] = $this->load->view('partial/editissuebook', $data, TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }

    //Update Issue Book
    public function updateIssueForm(){
        $data['id'] = $this->input->post('id');
        $data['studentname'] = $this->input->post('studentname');
        $data['reg'] = $this->input->post('reg');
        $data['dep'] = $this->input->post('dep');
        $data['book'] = $this->input->post('book');
        $data['return'] = $this->input->post('return');

        $id = $data['id'];
        $name = $data['studentname'];
        $reg = $data['reg'];
        $dep = $data['dep'];
        $book = $data['book'];
        $return = $data['return'];                      

        if(empty($name) && empty($dep) && empty($reg) && empty($book)){
            $sdata = array();
            $sdata['msg'] = '<span style="color: red">Field must not be empty !</span>';
            $this->session->set_flashdata($sdata);
            redirect("Manage/issuelist");
        }
        else{
            $this->manage_model->updateIssueData($data);
            $sdata['msg'] = '<span style="color: green">Data Updated Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("Manage/issuelist");
        }
    }

    //Delete Issue Book
    public function delissue($id){
        $this->manage_model->delIssueByid($id);
        $sdata = array();

        $sdata['msg'] = '<span style="color: red">Data Deleted Successfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("Manage/issuelist");
    }

    //View Student List 
    public function viewstudent($reg){
        $data['title'] = 'View Students';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['studentdata'] = $this->manage_model->getStudentByReg($reg);
        $data['content'] = $this->load->view('partial/viewstudent', $data, TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }

    //View Book List 
    public function viewbook($bookid){
        $data['title'] = 'View Books';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['bookbyid'] = $this->book_model->bookById($bookid);
        $data['content'] = $this->load->view('partial/viewbook', $data, TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }
}