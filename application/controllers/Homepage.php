<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Homepage
 * Berisi Halaman Depan
 */
class Homepage extends MY_Controller {

	/**
	 * Homepage constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->data['css'] = 'homepage';
		$this->data['info'] = $this->pengumuman_m->get_info();
		$this->load->model(array('kategori_m', 'barang_m'));
        
	}

	/**
	 *  Info : Menampilkan Pengumuman
	 *  Kategori : Menampilkan Daftar Kategori
	 */
	public function index() {
		$this->data['content'] = 'home';
		$this->data['kategori'] = $this->kategori_m->get_many_by(array('CHARACTER_LENGTH(kode_kategori) <= 2'));
		$this->data['hotlist'] = $this->kategori_m->get_many_by(array('CHARACTER_LENGTH(kode_kategori) <= 2'));
		$this->data['daftar'] = $this->get_level_0($this->data['hotlist']);
		$this->load->view('homepage/index', $this->data);
	}

	/**
	 * @return string
	 */
	public function get_level_0($parent) {
		$results = $this->kategori_m->get_many_by(array('status' => 1)); //capture the query data inside $results variable
		$menu = array();
		foreach ($parent as $list) {
			array_push($menu, $this->get_parent($results, $list->kode_kategori)); //get_menu() function is bellow
		}
		return $menu;
	}

	/**
	 * @param      $results
	 * @param null $parent_id
	 *
	 * @return string
	 */
	public function get_parent($results, $parent_id = NULL) {
		$menu = '';
		for ($i = 0; $i < sizeof($results); $i++) {
			if ($results[$i]->kode_induk_kategori == $parent_id) {
				if ($this->parent_child($results, $results[$i]->kode_kategori)) {
					$sub_menu = $this->get_parent($results, $results[$i]->kode_kategori);
					$menu = $this->addParent($results, $i, $sub_menu, $menu);
				} else {
					$menu = $this->addChild($results, $i, $menu);
				}
			}
		}
		return $menu;
	}

	/**
	 * @param $results
	 * @param $kode_induk
	 *
	 * @return bool
	 */
	public function parent_child($results, $kode_induk) {
		for ($i = 0; $i < sizeof($results); $i++) {
			if ($this->categoryCodeMatchedAndLessThanSixLength($results, $kode_induk, $i)) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @param $results
	 * @param $kode_induk
	 * @param $i
	 *
	 * @return bool
	 */
	private function categoryCodeMatchedAndLessThanSixLength($results, $kode_induk, $i) {
		return $results[$i]->kode_induk_kategori == $kode_induk && strlen($results[$i]->kode_induk_kategori) <= 6;
	}

	/**
	 * @param $results
	 * @param $i
	 * @param $sub_menu
	 * @param $menu
	 *
	 * @return string
	 */
	private function addParent($results, $i, $sub_menu, $menu) {
		$menu .= '<button class="list-group-item" data-toggle="collapse" data-target="#sm' . $i . '">
                                    ' . $results[$i]->kode_kategori . '. ' . ucwords(strtolower($results[$i]->nama)) . '<span class="badge">' . $this->kategori_m->count_barang($results[$i]->kode_kategori) . '</span>' . '<span class="caret"></span>
                        </button>' .
			'<div id="sm' . $i . '" class="sublinks collapse">' .
			$sub_menu .
			'</div>';
		return $menu;
	}

	/**
	 * @param $results
	 * @param $i
	 * @param $menu
	 *
	 * @return string
	 */
	private function addChild($results, $i, $menu) {
		$menu .= ' <a class="list-group-item" href="' . site_url('homepage/katalog?kategori=') . $results[$i]->kode_kategori . '" style="background-color: #eaeaea">
            ' . $results[$i]->kode_kategori . '. ' . ucwords(strtolower($results[$i]->nama)) . '
        		<span class="badge">' . $this->kategori_m->count_barang($results[$i]->kode_kategori) . '</span></a>';
		return $menu;
	}

	/**
	 *  Menampilkan Daftar Barang sesuai kategori yang di pilih
	 */
	public function katalog() {
		$this->data['title'] = 'Katalog Barang';
		$this->data['content'] = 'katalog';
		$this->data['list'] = $this->kategori_m->getKategoriWithChild();
		$this->data['css'] = 'katalog';
		$this->data['js'] = 'katalog';
		// Get filter
		$filter = $this->applyFilter();
		// Prepare Data
		$this->data['hotlist'] = $this->kategori_m->get_many_by(array('CHARACTER_LENGTH(kode_kategori) <= 2'));
		$this->data['kategori'] = $this->get_level_0($this->data['hotlist']);
		$this->data['barang'] = $this->barang_m->get_all_data($filter);
		$this->data['autocomplete'] = $this->barang_m->get_autocomplete();
		// Do init
		$this->load->view('homepage/index', $this->data);
	}

	/**
	 * @return mixed
	 */
	private function applyFilter() {
		$filter = $this->input->get();
		if (!isset($filter['offset'])) {
			$filter['offset'] = 5;
		}
		// Apply filter
		if (!empty($filter)) {
			$this->data['filter'] = $filter;
			return $filter;
		}
		return $filter;
	}

	public function detail($id = 0) {
		// Prepare view
		$this->data['title'] = 'Detail Barang';
		$this->data['content'] = 'detail';
		$this->data['css'] = 'katalog';
		$this->data['js'] = 'katalog';
		// Prepare data
		$this->data['detail'] = $this->barang_m->get_data_by($id);
		$increment = (int) $this->data['detail']->popularitas;
		$update['popularitas'] = $increment + 1;
		$this->barang_m->update($id, $update);
		$filter['kategori'] = $this->data['detail']->kode_kategori;
		$this->data['terkait'] = $this->barang_m->limit(4)->order_by('popularitas', 'DESC')->get_all_data($filter);
		$this->data['top'] = $this->barang_m->limit(4)->order_by('popularitas', 'DESC')->get_all_data();
		// Load view
		$this->load->view('homepage/index', $this->data);
	}

	/**
	 *  Menampilkan halaman Hubungi Kami
	 */
	public function kontak() {
		$this->data['content'] = 'kontak';
		$this->load->view('homepage/index', $this->data);
	}

	/**
	 *  Menampilkan halaman regulasi
	 */
	public function regulasi() {
		// Load model
		$this->load->model('regulasi_m');
		// Prepare View
		$this->data['title'] = 'Regulasi';
		$this->data['content'] = 'regulasi';
		$this->data['data'] = $this->regulasi_m->get_all();
		$this->load->view('homepage/index', $this->data);
	}

	/**
	 *  Menampilkan halaman petunjuk
	 */
	public function petunjuk() {
		// Prepare View
		$this->data['title'] = 'Petunjuk';
		$this->data['content'] = 'petunjuk';
		$this->load->view('homepage/index', $this->data);
	}

	/**
	 *  Menampilkan halaman download
	 */
	public function download() {
		// Load model
		$this->load->model('berkas_m');
		// Prepare View
		$this->data['title'] = 'Download';
		$this->data['content'] = 'berkas';
		$this->data['data'] = $this->berkas_m->get_many_by(array('status' => 1));
		$this->load->view('homepage/index', $this->data);
	}

	/**
	 * Download file regulasi
	 *
	 * @param $file
	 */
	public function download_regulasi($file) {
		$this->load->helper('download');
		force_download('././assets/regulasi/' . $file, NULL);
	}

	/**
	 * Download file berkas
	 *
	 * @param $file
	 */
	public function download_berkas($file) {
		$this->load->helper('download');
		force_download('././assets/file/berkas/' . $file, NULL);
	}
}
