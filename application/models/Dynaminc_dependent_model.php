<?php
class Dynaminc_dependent_model extends CI_Model{

    public function fetch_country(){
       $this->db->order_by("country_name","ASC");
       $query=$this->db->get("country");
       return $query->result();
    }
}