<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:07
 */

class Model_Napi extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function tampilkan_data(){
        return $this->db->get('napi');
    }
    function add_napi($data){
        $this->db->insert('napi',$data);
    }
    function get_one($id)
    {
        $param  =   array('id_napi'=>$id);
        return $this->db->get_where('napi',$param);
    }
    function edit($data,$id)
    {
        $this->db->where('id_napi',$id);
        $this->db->update('napi',$data);
    }
    function delete($id)
    {
        $this->db->where('id_napi',$id);
        $this->db->delete('napi');
    }
    function getByPembimbing()
    {

    }

}