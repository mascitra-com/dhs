<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'barang';
    }

    public function get_all_data($filter = null)
    {
        if ($filter == null) {
            $this->db->select("b.id as id, b.nama as nama, merk, tipe, spesifikasi, gambar, k.nama as kategori, hargaSatuan, hargaPokok, createdAt");
            $this->db->from('barang b');
            $this->db->join('kategori k', 'b.id_kategori = k.id');
            $this->order_by('createdAt', 'DESC');
        }
        return $this->db->get()->result();
    }

    public function get_autocomplete_data()
    {
    	$data 			= array();
    	$data['nama'] 	= $this->db->select('nama')->distinct()->get('barang')->result_array();
    	$data['tipe'] 	= $this->db->select('tipe')->distinct()->get('barang')->result_array();
    	$data['merk'] 	= $this->db->select('merk')->distinct()->get('barang')->result_array();

    	$result = array();
        foreach ($data as $key=>$value) {
            if(count($value)>0){
                $result = "[";
                for($i = 0; $i<count($value)-1; $i++){
                    $result.= "\"".$value[$i][$key]."\",";
                }

                $result .= "\"".$value[count($value)-1][$key]."\"]";
            }
            $data[$key] = $result;
        }
    	return $data;
    }
}
