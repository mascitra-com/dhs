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
		$this->data['daftar'] = $this->kategori_m->getKategoriWithChild();
		$this->data['kategori'] = $this->kategori_m->get_many_by(array('CHARACTER_LENGTH(kode_kategori) <= 6'));
		$this->data['hotlist'] = $this->kategori_m->get_many_by(array('CHARACTER_LENGTH(kode_kategori) <= 2'));
		$this->load->view('homepage/index', $this->data);
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
		$this->data['kategori'] = $this->kategori_m->get_all();
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
	 * @param $file
	 */
	public function download_regulasi($file) {
		$this->load->helper('download');
		force_download('././assets/regulasi/' . $file, NULL);
	}

	/**
	 * Download file berkas
	 * @param $file
	 */
	public function download_berkas($file) {
		$this->load->helper('download');
		force_download('././assets/file/berkas/' . $file, NULL);
	}

}
