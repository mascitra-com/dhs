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
        $this->db->select("b.id as id, b.id_kategori as id_kategori, b.nama as nama, merk, tipe, spesifikasi, gambar, k.nama as kategori, hargaPasar, hargashsb, createdAt");
        $this->db->from('barang b');
        $this->db->join('kategori k', 'b.id_kategori = k.id');

        if ($filter != null) {
            $where = "1";
            // Nama
            if (isset($filter['nama']) && $filter['nama'] != '') {
                $where .= " AND b.nama like '%" . $filter['nama'] . "%'";
            }
            // Tipe
            if (isset($filter['tipe']) && $filter['tipe'] != '') {
                $where .= " AND tipe like '%" . $filter['tipe'] . "%'";
            }
            // Merk
            if (isset($filter['merk']) && $filter['merk'] != '') {
                $where .= " AND merk like '%" . $filter['merk'] . "%'";
            }
            // Kategori
            if (isset($filter['kategori']) && $filter['kategori'] != '') {
                $where .= " AND id_kategori like '%" . $filter['kategori'] . "%'";
            }
            // Harga Pokok
            if (isset($filter['hargashsb'][0]) && ($filter['hargashsb'][0] != '' || $filter['hargashsb'][1] != '')) {
                if ($filter['hargashsb'][0] != '' && $filter['hargashsb'][1] != '') {
                    $where .= " AND hargashsb BETWEEN " . $filter['hargashsb'][0] . " AND " . $filter['hargashsb'][1];
                } elseif ($filter['hargashsb'][0] != '' && $filter['hargashsb'][1] == '') {
                    $where .= " AND hargashsb >= " . $filter['hargashsb'][0];
                } elseif ($filter['hargashsb'][0] == '' && $filter['hargashsb'][1] != '') {
                    $where .= " AND hargashsb <= " . $filter['hargashsb'][1];
                }
            }

            if ($where != "1") {
                $this->db->where($where);
            }

            if (!isset($filter['pg'])) {
                $filter['pg'] = 1;
            }

            if (!isset($filter['offset'])) {
                $filter['offset'] = 5;
            }

            $this->db->limit($filter['offset'], ($filter['offset'] * $filter['pg'] - $filter['offset']));
        }

        $order = array(
            array('createdAt', 'DESC'),
            array('createdAt', 'ASC'),
            array('hargashsb', 'DESC'),
            array('hargashsb', 'ASC'),
            array('nama', 'ASC'),
            array('nama', 'DESC'),
            array('merk', 'ASC'),
            array('merk', 'DESC'),
            array('tipe', 'ASC'),
            array('tipe', 'DESC'),
        );


        $index = ($filter != null && isset($filter['order'])) ? $filter['order'] : 0;

        $this->order_by($order[$index][0], $order[$index][1]);

        // return $this->db->get_compiled_select();
        return $this->db->get()->result();
    }

    public function get_autocomplete_data()
    {
        $data = array();
        $data['nama'] = $this->db->select('nama')->distinct()->get('barang')->result_array();
        $data['tipe'] = $this->db->select('tipe')->distinct()->get('barang')->result_array();
        $data['merk'] = $this->db->select('merk')->distinct()->get('barang')->result_array();

        $result = array();
        foreach ($data as $key => $value) {
            if (count($value) > 0) {
                $result = "[";
                for ($i = 0; $i < count($value) - 1; $i++) {
                    $result .= "\"" . $value[$i][$key] . "\",";
                }

                $result .= "\"" . $value[count($value) - 1][$key] . "\"]";
            }
            $data[$key] = $result;
        }
        return $data;
    }
}
