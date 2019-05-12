<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:07
 */

class Model_Bimbingan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function tampilkan_data(){
        return $this->db->get('bimbingan');
    }
    function tampilkan_penjamin($id){
        $param = array('id_pembimbing'=>$id);
        return $this->db->get_where('penjamin',$param);
    }

    function add_bimbingan($data){
        $this->db->insert('bimbingan',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_penjamin'=>$id);
        return $this->db->get_where('bimbingan',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_bimbingan',$id);
        $this->db->update('bimbingan',$data);
    }
    function delete($id)
    {
        $this->db->where('id_bimbingan',$id);
        $this->db->delete('bimbingan');
    }
    function get_napi($id)
    {
        $param  =   array('id_napi'=>$id);
        return $this->db->get_where('napi',$param);
    }
    function get_penjamin($id)
    {
        $param  =   array('id_penjamin'=>$id);
        return $this->db->get_where('penjamin',$param);
    }
    function get_pegawai($id)
    {
        $param  =   array('id_pegawai'=>$id);
        return $this->db->get_where('pegawai',$param);
    }
    function ajx_surat($id)
    {
        $this->db->select('*');
        $this->db->from('napi');
//        $this->db->join('napi', 'bimbingan.id_napi = napi.id_napi');
        $this->db->where('id_napi',$id);
        $query = $this->db->get();
        return $query;
    }
    function listbimbingan($id){
        $this->db->select('*');
        $this->db->from('bimbingan');
        $this->db->join('napi', 'bimbingan.id_napi = napi.id_napi');
        $this->db->where('id_pegawai',$id);
        $query = $this->db->get();
        return $query;
    }
    function disposisibimbingan($id){
        $this->db->select('*');
        $this->db->from('penjamin');

        $this->db->where('id_pembimbing',$id);
        $query = $this->db->get();
        return $query;
    }
    function getByPenjamin($id)
    {
        $this->db->select('*');
        $this->db->from('bimbingan');
        $this->db->join('napi', 'bimbingan.id_napi = napi.id_napi','left');
        $this->db->where('id_penjamin',$id);
        $query = $this->db->get();
        //$param  =   array('id_penjamin'=>$id);
        //return $this->db->get_where('bimbingan',$param);
        return $query;
    }
}
