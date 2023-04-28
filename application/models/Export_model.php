<?php
class Export_model extends CI_Model{

    public function employeelist(){
       $query=$this->db->select(['name','email','feedback'])->from('feedback')->get();
       return $query->result();
    }
}