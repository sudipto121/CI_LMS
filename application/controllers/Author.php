<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('author_model');
        $data = array();
        
    }

    //Insert Author
    public function addAuthor(){
        $data['title'] = 'Add Author Name';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['content'] = $this->load->view('partial/addauthor','',TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }
    public function addAuthorForm(){
        $data['authorname'] = $this->input->post('authorname');
       
        $name = $data['authorname'];
        
        if(empty($name)){
            $sdata = array();
            $sdata['msg'] = '<span style="color: red">Field must not be empty !</span>';
            $this->session->set_flashdata($sdata);
            redirect("Author/addAuthor");
        }
        else{
            $this->author_model->saveAuthor($data);
            $sdata['msg'] = '<span style="color: green">Author Data added Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("Author/addAuthor");
        }
    }

    //Show Author
    public function authorList(){
        $data['title'] = 'Author List';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['authordata'] = $this->author_model->getAllAuthorData();
        $data['content'] = $this->load->view('partial/authorList', $data, TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }

    //Edit Author List 
    public function editauthor($authorid){
        $data['title'] = 'Update Author';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['authorbyid'] = $this->author_model->authorById($authorid);
        $data['content'] = $this->load->view('partial/editauthor', $data, TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }

    //Update Author
    public function updateAuthorForm(){
        $data['authorid'] = $this->input->post('authorid');
        $data['authorname'] = $this->input->post('authorname');
        
        $bookid = $data['authorid'];
        $name = $data['authorname'];
           
        if(empty($name)){
            $sdata = array();
            $sdata['msg'] = '<span style="color: red">Field must not be empty !</span>';
            $this->session->set_flashdata($sdata);
            redirect("Author/authorList/".$authorid);
        }
        else{
            $this->author_model->updateAuthor($data);
            $sdata['msg'] = '<span style="color: green">Book Data added Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("Author/authorList/".$authorid);
        }
    }

    //Delete Author
    public function delauthor($authorid){
        $this->author_model->delAuthorByid($authorid);
        $sdata = array();
        $sdata['msg'] = '<span style="color: red">Data Deleted Successfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("Author/authorList");
    }
}