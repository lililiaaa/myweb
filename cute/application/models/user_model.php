<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    public function save($username, $pwd,$img){
        $this -> db -> insert('user', array(
            'user_name' => $username,
            'password' => $pwd,
            'user_img' => $img,
        ));
        return $this -> db -> affected_rows();
    }
    public function check_name($uname){
        $query=$this->db->get_where('user',array(
            'user_name'=>$uname
        ));
        return $query->row();
    }
    public function get_by_name_pwd($f_name, $f_pwd){
        //$this -> db -> query("select * from t_user where username='$name' and password='$pwd'");//有sql注入危险
        return $this -> db -> get_where('user', array(
            'user_name' => $f_name,
            'password' => $f_pwd
        )) -> row(); // result();
    }
}