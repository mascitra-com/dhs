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
        $len_induk = strlen($kode_induk);
        foreach ($semua_sub as $data) {
            if (strlen($data['kode_kategori']) == ($len_induk + 2) && strlen($kode_induk) == $len_induk) {
                array_push($sub_satu_tingkat_dibawah, (int)substr($data['kode_kategori'], $len_induk, $len_induk+1));
            }
        }
        if (count($sub_satu_tingkat_dibawah) == 0) {
            return '01';
        } else {
            $indeks_sub_terakhir = count($sub_satu_tingkat_dibawah) - 1;
            $kode_sub = $sub_satu_tingkat_dibawah[$indeks_sub_terakhir] + 1;
            if ($kode_sub < 10) {
                return "0" . $kode_sub;
            }
            return $kode_sub;
        }
    }

    public function getKategoriWithChild()
    {
        $result = $this->kategori_m->get_many_by(array('status' => '1'));
        $induk = array();
        foreach ($result as $list) {
            if (strlen($list->kode_kategori) == 2) {
                array_push($induk, $list);
            }
        }
        $limit = count($induk);
        $indukDanSub = array();
        for ($i = 0; $i < $limit; $i++) {
            $j = 0;
            $indukDanSub[$i][$j++] = $induk[$i]->id;
            $indukDanSub[$i][$j] = $induk[$i]->nama;
            $result = $this->kategori_m->get_many_by(array('kode_induk_kategori' => $induk[$i]->kode_kategori, 'status' => '1'));
            foreach ($result as $list){
                $j++;
                $indukDanSub[$i][$j++] = $list->id;
                $indukDanSub[$i][$j] = $list->nama;
            }
        }
        return $indukDanSub;
    }
}
