<?php
    class manage_model extends  CI_Model{
        // Data List
        public function getBookByDep($dep){
            $this->db->select('*');
            $this->db->from('tbl_book');
            $this->db->where('dep', $dep);
            $qresult = $this->db->get();
            $result = $qresult->result();
            return $result;
        }

        //Insert Data
        public function saveIssueData($data){
        	$this->db->insert('tbl_issue', $data);
        }

        //Get Data
        public function getAllIssueData(){
            $this->db->select('*');
            $this->db->from('tbl_issue');
            $this->db->order_by('id', 'desc');
            $qresult = $this->db->get();
            $result = $qresult->result();
            return $result;
        }

        // Data List
        public function getIssueById($id){
            $this->db->select('*');
            $this->db->from('tbl_issue');
            $this->db->where('id', $id);
            $qresult = $this->db->get();
            $result = $qresult->row();
            return $result;
        }

        //Update Data
        public function updateIssueData($data){
            $this->db->set('studentname', $data['studentname']);
            $this->db->set('reg', $data['reg']);
            $this->db->set('dep', $data['dep']);
            $this->db->set('book', $data['book']);
            $this->db->set('return', $data['return']);
            $this->db->where('id', $data['id']);
            $this->db->update('tbl_issue');
        }

        //Delete Data 
        public function delIssueByid($id){
            $this->db->where('id', $id);
            $this->db->delete('tbl_issue');
        }

        // Data List
        public function getStudentByReg($reg){
            $this->db->select('*');
            $this->db->from('tbl_student');
            $this->db->where('reg', $reg);
            $qresult = $this->db->get();
            $result = $qresult->row();
            return $result;
        }
    }	
?>