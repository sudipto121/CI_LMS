<?php
    class user_model extends  CI_Model{
        public function checkUser($data){
            $this->db->select('*');
            $this->db->from('tbl_admin');
            $this->db->where('username', $data['username']);
            $this->db->where('password', $data['password']);
            $qresult = $this->db->get();
            $has = $qresult->num_rows();
            if($has === 1){
            	$result = $qresult->row();
            	return $result;
            }
        }
}	