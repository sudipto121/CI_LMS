<?php
    class author_model extends  CI_Model{
        public function saveAuthor($data){
            //Insert data
            $this->db->insert('tbl_author', $data);
        }
        //Get Data
        public function getAllAuthorData(){
            $this->db->select('*');
            $this->db->from('tbl_author');
            $this->db->order_by('authorid', 'desc');
            $qresult = $this->db->get();
            $result = $qresult->result();
            return $result;
        }

        // Data List
        public function authorById($authorid){
            $this->db->select('*');
            $this->db->from('tbl_author');
            $this->db->where('authorid', $authorid);
            $qresult = $this->db->get();
            $result = $qresult->row();
            return $result;
        }

        //Update Data
        public function updateAuthor($data){
            $this->db->set('authorname', $data['authorname']);
            $this->db->where('authorid', $data['authorid']);
            $this->db->update('tbl_author');
        }

        //Delete Data 
        public function delAuthorByid($authorid){
            $this->db->where('authorid', $authorid);
            $this->db->delete('tbl_author');
        }

        //Show Selected Author Data
        public function getAuthor($authorid){
            $this->db->select('*');
            $this->db->from('tbl_author');
            $this->db->where('authorid', $authorid);
            $qresult = $this->db->get();
            $result = $qresult->row();
            return $result;
        }
}	