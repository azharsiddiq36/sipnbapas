<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:07
 */

class Model_Pegawai extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function tampilkan_data(){
        return $this->db->get('pegawai');
    }

    function add_pegawai($data){
        $this->db->insert('pegawai',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_pegawai'=>$id);
        return $this->db->get_where('pegawai',$param);
    }
    function get($id)
    {
        $param  =   array('nip'=>$id);
        return $this->db->get_where('pegawai',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_pegawai',$id);
        $this->db->update('pegawai',$data);
    }
    function delete($id)
    {
        $this->db->where('id_pegawai',$id);
        $this->db->delete('pegawai');
    }
}