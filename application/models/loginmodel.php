<?php
class loginmodel extends CI_Model{

    public function isvalidate($username,$password){
       $q= $this->db->where(['username' => $username, 'password' => $password])
                    ->get('users');
                    // echo "<pre>";
                    // print_r($q);
        if($q->num_rows()){
            return $q->row()->id;
        }
        else{
            return false;
        }
    }

    public function articlelist(){
        $id=$this->session->userdata('id');
        $q=$this->db->select()->from('articles')->where(['user_id'=>$id])->get();
        return $q->result();
     }
     public function add_article($array){
        return $this->db->insert('articles',$array);
     }

     public function add_user($array){

        return $this->db->insert('users',$array);
     }

     public function find_article($articleid){
     $q=$this->db->select(['article_title','article_body','id'])
            ->where('id',$articleid)
            ->get('articles');
            return $q->row();


  }

  public function update_article($articleid,Array $article){
   return $this->db->where('id',$articleid)->update('articles',$article);
  }
     public function del($id){

        return $this->db->delete('articles',['id'=>$id]);
     }


}