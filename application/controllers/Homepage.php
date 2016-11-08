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
		$this->data['kategori'] = $this->kategori_m->limit(4)->get_many_by(array('kode_induk_kategori' => NULL));
		$this->load->view('homepage/index', $this->data);
	}

	/**
	 *  Menampilkan Daftar Barang sesuai kategori yang di pilih
	 */
	public function daftar() {
		$filter = $this->input->get();
        // Prepare view
        $this->data['title'] = 'Daftar Barang';
        $this->data['content'] = 'katalog';
        $this->data['css'] = 'katalog';
        $this->data['js'] = 'katalog';
        //Prepare Data
        $this->data['barang'] = $this->barang_m->get_all_data($filter);
        $this->data['list'] = $this->kategori_m->getKategoriWithChild();
        // Load view
		$this->load->view('homepage/index', $this->data);
	}

	public function detail($id = 0) {
		// Prepare view
		$this->data['title'] = 'Detail Barang';
		$this->data['content'] = 'detail';
		$this->data['css'] = 'katalog';
		$this->data['js'] = 'katalog';
		// Prepare data
		$this->data['detail'] = $this->barang_m->get_data_by($id);
        $this->updatePopularity($id);
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
     * Download file regulasi
     * @param $file
     */
    public function download_regulasi($file) {
		$this->load->helper('download');
		force_download('././assets/regulasi/' . $file, NULL);
	}

    /**
     * @param $id
     * @param $update
     */
    private function updatePopularity($id)
    {
        $increment = (int)$this->data['detail']->popularitas;
        $update['popularitas'] = $increment + 1;
        $this->barang_m->update($id, $update);
    }

}
