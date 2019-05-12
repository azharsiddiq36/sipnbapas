<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 13/02/19
 * Time: 8:58
 */

class Model_pengguna extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->load->database();

    }
    function tampilkan_data(){
        return $this->db->get('pengguna');
    }
    function login($params){
        $this->db->where($params);
        $this->db->from('pengguna');
        return  $this->db->get();

    }
    function dataUser($params){
        $this->db->where($params);
        $this->db->from('pengguna');
        return  $this->db->get()->row_array();
    }

    function add_pengguna($data){
        $this->db->insert('pengguna',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_pengguna'=>$id);
        return $this->db->get_where('pengguna',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_pengguna',$id);
        $this->db->update('pengguna',$data);
    }
    function delete($id)
    {
        $this->db->where('id_pengguna',$id);
        $this->db->delete('pengguna');
    }
}