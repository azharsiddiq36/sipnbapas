<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:08
 */

class Model_Penjamin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function tampilkan_data(){
        return $this->db->get('penjamin');
    }

    function add_penjamin($data){
        $this->db->insert('penjamin',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_penjamin'=>$id);
        return $this->db->get_where('penjamin',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_penjamin',$id);
        $this->db->update('penjamin',$data);
    }
    function delete($id)
    {
        $this->db->where('id_penjamin',$id);
        $this->db->delete('penjamin');
    }
    function get_napi($id)
    {
        $param  =   array('id_napi'=>$id);
        return $this->db->get_where('napi',$param);
    }
    function get_pembimbing($id)
    {
        $param  =   array('id_pegawai'=>$id);
        return $this->db->get_where('pegawai',$param);
    }
    function getbykk($id)
    {
        $param  =   array('noktp'=>$id);
        return $this->db->get_where('penjamin',$param);
    }
        function getByPembimbing($id)
    {
     $param  =   array('id_pembimbing'=>$id);
        return $this->db->get_where('penjamin',$param);   
    }

}