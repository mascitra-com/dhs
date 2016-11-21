<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Insight_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPopulerItem()
    {
    	$this->db->select('*');
    	$this->db->from('barang');
    	$this->db->order_by('popularitas', 'DESC');
    	$this->db->limit(6);
    	return $this->db->get()->result();
    }

    public function getNewestItem()
    {
    	$this->db->select('*');
    	$this->db->from('barang');
    	$this->db->order_by('createdAt', 'DESC');
    	$this->db->limit(6);
    	return $this->db->get()->result();
    }

    public function getKategoriCount()
    {
    	$this->db->select('COUNT(*) as jum');
    	$this->db->from('kategori');
    	$this->db->where('status', '1');
    	return $this->db->get()->result()[0]->jum;
    }

    public function getBarangCount()
    {
    	$this->db->select('COUNT(*) as jum');
    	$this->db->from('barang');
    	return $this->db->get()->result()[0]->jum;
    }

    public function getPenggunaCount()
    {
    	$this->db->select('COUNT(*) as jum');
    	$this->db->from('users');
    	return $this->db->get()->result()[0]->jum;
    }

    public function getBarangTahunCount()
    {
    	$this->db->select('COUNT(*) as jum');
    	$this->db->from('barang');
    	$this->db->where('tahun_anggaran', date('Y'));
    	return $this->db->get()->result()[0]->jum;
    }

    public function getChartKategori()
    {   
        $this->db->select('kode_kategori, nama');
        $this->db->from('kategori');
        $this->db->where('LENGTH(kode_kategori) = 2');
        $dataKategori = $this->db->get()->result_array();

    	$result = array("nama"=>array(), "jumlah"=>array());

    	for ($i=0; $i < count($dataKategori) ; $i++) { 
    		$this->db->select('COUNT(barang.id) as jum');
	    	$this->db->from('barang');
            $this->db->join('kategori', 'barang.kode_kategori = kategori.kode_kategori');
	    	$this->db->like('barang.kode_kategori', $dataKategori[$i]['kode_kategori'], 'after');

            array_push($result['nama'], $dataKategori[$i]['nama']);
	    	array_push($result['jumlah'], $this->db->get()->result()[0]->jum);
    	}

    	return json_encode($result);
    }
}
