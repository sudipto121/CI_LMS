<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('book_model');
        $this->load->model('dep_model');
        $this->load->model('author_model');

        $data = array();
        
    }

    //Insert Book 
    public function addbook(){
        $data['title'] = 'Add New Book';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['depdata'] = $this->dep_model->getAllDepartmentData();
        $data['authordata'] = $this->author_model->getAllAuthorData();
        $data['content'] = $this->load->view('partial/addbook', $data,TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }
    public function addBookForm(){
        $data['bookname'] = $this->input->post('bookname');
        $data['dep'] = $this->input->post('dep');
        $data['author'] = $this->input->post('author');
        $data['stock'] = $this->input->post('stock');
     
        $name = $data['bookname'];
        $dep = $data['dep'];
        $author = $data['author'];
        $stock = $data['stock'];
        
        if(empty($bookname) && empty($dep) && empty($author) && empty($stock)){
            $sdata = array();
            $sdata['msg'] = '<span style="color: red">Field must not be empty !</span>';
            $this->session->set_flashdata($sdata);
            redirect("Book/addbook");
        }
        else{
            $this->book_model->saveBook($data);
            $sdata['msg'] = '<span style="color: green">Book Data added Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("Book/addbook");
        }
    }

    //Show Book
    public function booklist(){
        $data['title'] = 'Book List';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['allbook'] = $this->book_model->getAllBookData();
        $data['content'] = $this->load->view('partial/booklist', $data,TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }

    //Edit Book 
    public function editbook($bookid){
        $data['title'] = 'Update Book';
        $data['header'] = $this->load->view('partial/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('partial/sidebar','',TRUE);
        $data['departmentdata'] = $this->dep_model->getAllDepartmentData();
        $data['authordata'] = $this->author_model->getAllAuthorData();
        $data['bookbyid'] = $this->book_model->bookById($bookid);
        $data['content'] = $this->load->view('partial/editbook', $data, TRUE);
        $data['footer'] = $this->load->view('partial/footer','',TRUE);
        $this->load->view('home',$data);
    }

    //Update Book
    public function updateBookForm(){
        $data['bookid'] = $this->input->post('bookid');
        $data['bookname'] = $this->input->post('bookname');
        $data['dep'] = $this->input->post('dep');
        $data['author'] = $this->input->post('author');
        $data['stock'] = $this->input->post('stock');
     
        $bookid = $data['bookid'];
        $name = $data['bookname'];
        $dep = $data['dep'];
        $author = $data['author'];
        $stock = $data['stock'];
        
        if(empty($bookname) && empty($dep) && empty($author)){
            $sdata = array();
            $sdata['msg'] = '<span style="color: red">Field must not be empty !</span>';
            $this->session->set_flashdata($sdata);
            redirect("Book/booklist/".$bookid);
        }
        else{
            $this->book_model->updateBook($data);
            $sdata['msg'] = '<span style="color: green">Book Data added Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("Book/booklist/".$bookid);
        }
    }

    //Delete Book
    public function delbook($bookid){
        $this->book_model->delBookByid($bookid);
        $sdata = array();
        $sdata['msg'] = '<span style="color: red">Data Deleted Successfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("Book/booklist");
    }
}
