<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_m extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->_table = 'kategori';
    }

    public function fetch_data($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("kategori");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    /**
     * @param $kode_induk
     * @return mixed
     */
    public function get_kode_barang_baru($kode_induk)
    {
        $kode_induk .= ".";
        $this->db->like('kode_kategori', $kode_induk);
        $semua_sub = $this->db->get('kategori')->result_array();
        $sub_satu_tingkat_dibawah = array();
        foreach ($semua_sub as $data) {
            if (strlen($data['kode_kategori']) == 5) {
                array_push($sub_satu_tingkat_dibawah, (int)substr($data['kode_kategori'], 3, 4));
            }
            if (strlen($data['kode_kategori']) == 8) {
                array_push($sub_satu_tingkat_dibawah, (int)substr($data['kode_kategori'], 6, 7));
            }
        }
        if (count($sub_satu_tingkat_dibawah) == 0) {
            return '01';
        } else {
            $indeks_sub_terakhir = count($sub_satu_tingkat_dibawah) - 1;
            $kode_sub = $sub_satu_tingkat_dibawah[$indeks_sub_terakhir] + 1;
            if ($kode_sub < 10){
                return "0". $kode_sub;
            }
            return $kode_sub;
        }
    }
}
