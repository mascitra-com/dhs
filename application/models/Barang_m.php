<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang_m extends MY_Model {
	public function __construct() {
		parent::__construct();
		$this->_table = 'barang';
	}

	public function get_all_data($filter = null) {
		$this->db->select("b.id as id, b.kode_kategori as kode_kategori, b.nama as nama, merk, tipe, spesifikasi, gambar, k.nama as kategori, hargaPasar, hargashsb, keterangan, createdAt");
		$this->db->from('barang b');
		$this->db->join('kategori k', 'b.kode_kategori = k.kode_kategori');

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
				$where .= " AND b.kode_kategori like '" . $filter['kategori'] . "%'";
			}
			// Harga Pokok

			if ((isset($filter['hargamin']) && isset($filter['hargamax'])) && ($filter['hargamin'] != '' && $filter['hargamax'] != '')) {
				$where .= " AND hargashsb BETWEEN " . $filter['hargamin'] . " AND " . $filter['hargamax'];
			} elseif ((isset($filter['hargamin']) && $filter['hargamin'] != '') && (!isset($filter['hargamax']) || $filter['hargamax'] == '')) {
				$where .= " AND hargashsb >= " . $filter['hargamin'];
			} elseif ((isset($filter['hargamax']) && $filter['hargamax'] != '') && (!isset($filter['hargamin']) || $filter['hargamin'] == '')) {
				$where .= " AND hargashsb <= " . $filter['hargamax'];
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
        $this->db->where('k.status', 1);
		$this->order_by($order[$index][0], $order[$index][1]);

		// return $this->db->get_compiled_select();
		return $this->db->get()->result();
	}

	public function get_data_by($id)
	{
		$this->db->select('b.*, k.nama as kategori');
		$this->db->from('barang b');
		$this->db->join('kategori k', 'b.kode_kategori = k.kode_kategori');
		$this->db->where('b.id',$id);
		return $this->db->get()->result()[0];
	}

	public function get_autocomplete() {
		$data = array();
		$data['nama'] = $this->db->select('nama')->distinct()->get('barang')->result_array();
		$data['tipe'] = $this->db->select('tipe')->distinct()->get('barang')->result_array();
		$data['merk'] = $this->db->select('merk')->distinct()->get('barang')->result_array();

		$result = array();
		foreach ($data as $key => $value) {
			$result = "[";
			if (count($value) > 0) {
				for ($i = 0; $i < count($value) - 1; $i++) {
					$result .= "\"" . $value[$i][$key] . "\",";
				}

				$result .= "\"" . $value[count($value) - 1][$key] . "\"";
			}
			$result .= "]";
			$data[$key] = $result;
		}
		return $data;
	}
}
