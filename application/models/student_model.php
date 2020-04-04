<?php
    class student_model extends  CI_Model{
        public function saveStudent($data){
            //Insert data
            $this->db->insert('tbl_student', $data);
        }

        //Get Data
        public function getAllStudentData(){
            $this->db->select('*');
            $this->db->from('tbl_student');
            $this->db->order_by('sid', 'desc');
            $qresult = $this->db->get();
            $result = $qresult->result();
            return $result;
        }

        // Data List
        public function getStudentById($sid){
            $this->db->select('*');
            $this->db->from('tbl_student');
            $this->db->where('sid', $sid);
            $qresult = $this->db->get();
            $result = $qresult->row();
            return $result;
        }

        //Update Data
        public function updateStudentData($data){
            $this->db->set('name', $data['name']);
            $this->db->set('dep', $data['dep']);
            $this->db->set('roll', $data['roll']);
            $this->db->set('reg', $data['reg']);
            $this->db->set('session', $data['session']);
            $this->db->set('batch', $data['batch']);
            $this->db->set('email', $data['email']);
            $this->db->set('phone', $data['phone']);
            $this->db->where('sid', $data['sid']);
            $this->db->update('tbl_student');
        }

        //Delete Data 
        public function delStudentByid($sid){
            $this->db->where('sid', $sid);
            $this->db->delete('tbl_student');
        }
    }
?>