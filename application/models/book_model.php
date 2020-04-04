<?php
    class book_model extends  CI_Model{
        public function saveBook($data){
            //Insert data
            $this->db->insert('tbl_book', $data);
        }
        //Get Data
        public function getAllBookData(){
            $this->db->select('*');
            $this->db->from('tbl_book');
            $this->db->order_by('bookid', 'desc');
            $qresult = $this->db->get();
            $result = $qresult->result();
            return $result;
        }

        // Data List
        public function bookById($bookid){
            $this->db->select('*');
            $this->db->from('tbl_book');
            $this->db->where('bookid', $bookid);
            $qresult = $this->db->get();
            $result = $qresult->row();
            return $result;
        }

        //Update Data
        public function updateBook($data){
            $this->db->set('bookname', $data['bookname']);
            $this->db->set('dep', $data['dep']);
            $this->db->set('author', $data['author']);
            $this->db->set('stock', $data['stock']);
            $this->db->where('bookid', $data['bookid']);
            $this->db->update('tbl_book');
        }

        //Delete Data 
        public function delBookByid($bookid){
            $this->db->where('bookid', $bookid);
            $this->db->delete('tbl_book');
        }
        
}		