<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Kategori
 */
class Kategori extends MY_Controller {

	/**
	 * Kategori constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model(array('kategori_m', 'barang_m'));
		$this->load->library('pagination');
		$this->data['js'] = 'kategori';
		$this->data['css'] = 'kategori';
	}

	/**
	 *  Menampilkan daftar Kategori
	 */
	public function index() {
		$filter = $this->input->get();
		$segment = $this->uri->segment(3, 0);
		if ($segment == 0 && empty($filter)) {
			$this->session->unset_userdata('filter_kategori');
		}
		if (empty($filter)) {
			$session_filter = $this->session->userdata('filter_kategori');
			$filter = (isset($session_filter)) ? $session_filter : array();
		} else {
			$this->session->set_userdata('filter_kategori', $filter);
		}
		$this->page($filter);
		$this->data['title'] = 'Kategori Barang';
		$this->data['allKategori'] = $this->kategori_m->get_all();
		$this->data['content'] = 'kategori/index';
		$this->data['js'] = 'kategori';
		$this->init();
	}

	private function page($filter) {
		//pagination settings
		$config['base_url'] = site_url('kategori/index');
        if(!empty($filter['page'])){
            $per_page = $filter['page'];
            unset($filter['page']);
        } else {
            $per_page = 10;
        }
        $config['per_page'] = $per_page;
        $config['total_rows'] = $this->kategori_m->count_by($filter);
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = 5;

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		//call the model function to get the department data
		$this->data['kategori'] = $this->kategori_m->fetch_data($config["per_page"], $this->data['page'], $filter);
		$this->data['filter'] = $filter;
        $this->data['per_page'] = $per_page;
		$this->data['pagination'] = $this->pagination->create_links();

	}

	/**
	 *  Menyimpan data baru ke database
	 */
	public function store() {
		$data = $this->input->post();
		$insert['kode_kategori'] = $data['sub_kategori'];
		$insert['nama'] = $data['nama_kategori'];
		if ($data['induk'] != "") {
			$insert['kode_induk_kategori'] = $this->kategori_m->get_by(array('id' => $data['induk']))->kode_kategori;
		}
		if ($this->kategori_m->insert($insert)) {
			$this->message('Berhasil! Data berhasil di simpan', 'success');
		} else {
			$this->message('Gagal! Data gagal di simpan', 'danger');
		}
		redirect('kategori');
	}

	/**
	 *  Menampilkan halaman edit kategori
	 */
	public function edit() {
		$id = $this->input->get('id');
		$data = $this->kategori_m->get_by(array('id' => $id));
		$kode_induk = $data->kode_induk_kategori;
		if (!is_null($kode_induk)) {
			$id_induk = $this->kategori_m->get_by(array('kode_kategori' => $kode_induk))->id;
			$data->id_induk = $id_induk;
		} else {
			$data->id_induk = "";
		}
		$this->printOptionOnCombobox($data, $id);
		echo json_encode($data);
	}

	/**
	 * @param $data
	 * @param $id
	 */
	private function printOptionOnCombobox($data, $id) {
		$data->kategori = array('<option value="">Pilih kategori</option>');
		$kategori = $this->kategori_m->get_all();
		foreach ($kategori as $list) {
			if ($list->id != $id) {
				array_push($data->kategori, "<option value='$list->id'>$list->kode_kategori. $list->nama</option>");
			}
		}
	}

	/**
	 *  Mengubah data di database sesuai inputan user
	 */
	public function update() {
		$id = $this->input->post('idUpdate');
		$data = $this->input->post();
		$update['nama'] = $data['nama_kategoriUpdate'];
		if ($this->kategori_m->update($id, $update)) {
			$this->message('Berhasil! Data berhasil di update', 'success');
		} else {
			$this->message('Gagal! Data gagal di update', 'danger');
		}
		redirect('kategori');
	}

	/**
	 * Mengubah status kategori menjadi tidak aktif
	 * @param $id
	 */
	public function destroy($id) {
		if ($this->kategori_m->update($id, array('status' => 0))) {
            $kode_induk = $this->kategori_m->get_by(array('id' => $id))->kode_kategori;
            $this->kategori_m->update_by(array("kode_induk_kategori like " => $kode_induk."%"), array('status' => 0));
			$this->message('Berhasil! Data berhasil di nonaktifkan', 'success');
		} else {
			$this->message('Gagal! Data gagal di nonaktifkan', 'danger');
		}
		redirect('kategori');
	}

	public function activate($id) {
		if ($this->kategori_m->update($id, array('status' => 1))) {
            $kode_induk = $this->kategori_m->get_by(array('id' => $id))->kode_kategori;
            $this->kategori_m->update_by(array("kode_induk_kategori like " => $kode_induk."%"), array('status' => 1));
			$this->message('Berhasil! Data berhasil di aktifkan', 'success');
		} else {
			$this->message('Gagal! Data gagal di aktifkan', 'danger');
		}
		redirect('kategori');
	}

	/**
	 *  Mendapatakan kode kategori baru untuk data kategori yang akan di inputkan
	 */
	public function get_kode() {
		$kategori = $this->input->get('kategori');
		if ($kategori != 0) {
			$kode_induk = $this->kategori_m->get_by(array('kode_kategori' => $kategori))->kode_kategori;
			$kode_sub = $this->kategori_m->get_kode_barang_baru($kode_induk);
			echo $kode_induk . $kode_sub;
		} else {
			echo "";
		}
	}

	public function get_kode_induk() {
		$kode_induk_tertinggi = $this->kategori_m->order_by('id', 'DESC')->limit(1)->get_by(array('kode_induk_kategori' => NULL))->kode_kategori;
		$kode_baru = (int) $kode_induk_tertinggi + 1;
		if ($kode_baru < 10) {
			$kode_baru = '0' . $kode_baru;
		}
		echo $kode_baru;
	}
}