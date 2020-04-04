<?php
    class dep_model extends  CI_Model{

    // Insert Data
    public function saveDepartment($data){
        $this->db->insert('tbl_dep', $data);
    }

    //Get Data
    public function getAllDepartmentData(){
        $this->db->select('*');
        $this->db->from('tbl_dep');
        $this->db->order_by('depid', 'desc');
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;
    }

    //Data list
    public function getDepartmentById($id){
        $this->db->select('*');
        $this->db->from('tbl_dep');
        $this->db->where('depid', $id);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }

    //Update Department 
    public function updateDepartment($data){
        $this->db->set('depname', $data['depname']);
        $this->db->where('depid', $data['depid']);
        $this->db->update('tbl_dep');
    }

    //Delete Department
    public function delDepartmentByid($id){
        $this->db->where('depid', $id);
        $this->db->delete('tbl_dep');
    }

    //Show Selected Department Data
    public function getDepartment($sdepid){
        $this->db->select('*');
        $this->db->from('tbl_dep');
        $this->db->where('depid', $sdepid);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }
}