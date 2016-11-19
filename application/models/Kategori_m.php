<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_m extends MY_Model {

	public function __construct() {
		parent::__construct();
		$this->_table = 'kategori';
	}

	public function fetch_data($limit, $start, $filter) {
		if ($filter != null) {
			$this->db->like($filter);
		}

		$this->db->limit($limit, $start);
		$this->db->order_by('kode_kategori');
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
	public function get_kode_barang_baru($kode_induk) {
		$kode_induk .= ".";
		$this->db->like('kode_kategori', $kode_induk);
		$semua_sub = $this->db->get('kategori')->result_array();
		$sub_satu_tingkat_dibawah = array();
		$len_induk = strlen($kode_induk);
		foreach ($semua_sub as $data) {
			if (strlen($data['kode_kategori']) == ($len_induk + 2) && strlen($kode_induk) == $len_induk) {
				array_push($sub_satu_tingkat_dibawah, (int) substr($data['kode_kategori'], $len_induk, $len_induk + 1));
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

	public function getKategoriWithChild() {
		$result = $this->db->query('SELECT *
                        FROM kategori
                        WHERE CHARACTER_LENGTH(kode_kategori) = 6')->result();
		$induk = array();
		foreach ($result as $list) {
			array_push($induk, $list);
		}
		$limit = count($induk);
		$indukDanSub = array();
		for ($i = 0; $i < $limit; $i++) {
			$j = 0;
			$indukDanSub[$i][$j++] = $induk[$i]->kode_kategori;
			$jmlBrg = $this->count_barang($induk[$i]->kode_kategori);
			$indukDanSub[$i][$j++] = $induk[$i]->nama;
			$indukDanSub[$i][$j] = $jmlBrg;
			$result = $this->kategori_m->get_many_by(array('kode_induk_kategori' => $induk[$i]->kode_kategori, 'status' => '1'));
			foreach ($result as $list) {
				$j++;
				$indukDanSub[$i][$j++] = $list->kode_kategori;
				$indukDanSub[$i][$j++] = $list->nama;
				$jmlBrg = $this->count_barang($list->kode_kategori);
				$indukDanSub[$i][$j] = $jmlBrg;
			}
		}
		return $indukDanSub;
	}

	public function get_autocomplete() {
		$data = $this->db->select('kode_kategori, nama')->get('kategori')->result_array();
		$result = '[';

		for ($i = 0; $i < count($data) - 1; $i++) {
			$result .= '"' . $data[$i]['kode_kategori'] . '-' . $data[$i]['nama'] . '",';
		}

		$result .= '"' . $data[count($data) - 1]['kode_kategori'] . '-' . $data[count($data) - 1]['nama'] . '"]';

		return $result;
	}

	public function tree_menu() {
		return $this->db->query("SELECT t1.nama AS lev1, t2.nama as lev2, t3.nama as lev3
                        FROM kategori AS t1
                        LEFT JOIN kategori AS t2 ON t2.kode_induk_kategori = t1.kode_kategori
                        LEFT JOIN kategori AS t3 ON t3.kode_induk_kategori = t2.kode_kategori
                        WHERE CHARACTER_LENGTH(t1.kode_kategori) = 2")->result();

	}

	public function count_barang($kode_kategori) {
		$this->db->select('COUNT(id) as jum');
		$this->db->from('barang');
		$this->db->like('kode_kategori', $kode_kategori, 'after');
		$this->db->where('status', 1);
		return $this->db->get()->result()[0]->jum;
	}
}
