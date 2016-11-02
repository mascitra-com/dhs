<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->checkLoggedIn();
		$this->load->model(array('barang_m', 'kategori_m'));
		$this->load->library(array('upload', 'pagination'));
		$this->load->helper("file");
		require_once APPPATH . 'libraries/PHPExcel.php';
		include_once APPPATH . 'libraries/PHPExcel/Writer/PDF.php';
	}

	/**
	 *  Menampilkan daftar Barang
	 */
	public function index() {
		$filter = $this->input->get();

		$this->load->model('kategori_m');
		if (!isset($filter['offset'])) {
			$filter['offset'] = 5;
		}

		$this->data['title'] = 'Katalog Barang';
		$this->data['content'] = 'katalog/index';
		$this->data['list'] = $this->kategori_m->getKategoriWithChild();
		$this->data['css'] = 'katalog';
		$this->data['js'] = 'katalog';

		$this->data['kategori'] = $this->kategori_m->get_all();
		$this->data['barang'] = $this->barang_m->get_all_data($filter);
		$this->data['autocomplete'] = $this->barang_m->get_autocomplete();

		if (!empty($filter)) {
			$this->data['filter'] = $filter;
		}

		$this->init();
	}

	public function add() {
		$this->data['content'] = 'katalog/form';
		$this->data['css'] = 'katalog';
		$this->data['js'] = 'katalog';
		//prepare data
		$this->data['autocomplete'] = $this->barang_m->get_autocomplete();
		$this->data['autocomplete']['kategori'] = $this->kategori_m->get_autocomplete();
		$this->init();

	}

	/**
	 *  Tambahkan data ke database
	 */
	public function store() {
		$data = $this->input->post();
		$data['kode_kategori'] = explode('-', $data['kode_kategori'])[0];
		$uploadSukses = false;

		if (!empty($_FILES['gambar']['name'])) {

			$data['gambar'] = 'img-' . date('dmYhis');

			if ($this->do_upload($data['gambar'])) {

				$data['createdAt'] = date('Y-m-d h:i:s');
				$data['createdBy'] = $this->ion_auth->get_user_id();
				$data['gambar'] = $this->upload->data('file_name');

				if ($this->barang_m->insert($data) == TRUE) {
					echo "sukses";
				} else {
					delete_files($this->upload->data('full_path'));
					echo "Input data gagal";
				}
			} else {
				echo "Upload gambar gagal";
			}
		} else {
			$data['createdAt'] = date('Y-m-d h:i:s');
			$data['createdBy'] = $this->ion_auth->get_user_id();

			if ($this->barang_m->insert($data) == FALSE) {
				echo "Input data gagal";
			}
		}
	}

	/**
	 * Mengunggah foto yang di inputkan saat entri data barang
	 * @param $name
	 * @return bool
	 */
	public function do_upload($name) {
		$config['upload_path'] = './assets/img/img-barang';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 1000;
		$config['max_width'] = 1024;
		$config['max_height'] = 1024;
		$config['file_name'] = $name;

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('gambar')) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Menampilkan detail barang sesuai id barang
	 * @param int $id barang
	 */
	public function detail($id = 0) {
		// Prepare view
		$this->data['title'] = 'Detail Barang';
		$this->data['content'] = 'katalog/detail';
		$this->data['css'] = 'katalog';
		$this->data['js'] = 'katalog';
		// Prepare data
		$this->data['detail'] = $this->barang_m->get($id);
		$increment = (int) $this->data['detail']->popularitas;
		$update['popularitas'] = $increment + 1;
		$this->barang_m->update($id, $update);
		$filter['kategori'] = $this->data['detail']->id_kategori;
		$this->data['terkait'] = $this->barang_m->limit(4)->order_by('popularitas', 'DESC')->get_all_data($filter);
		$this->data['top'] = $this->barang_m->limit(4)->order_by('popularitas', 'DESC')->get_all_data();
		// Do init
		$this->init();
	}

	/**
	 * Tampilan edit data
	 * @param $id
	 */
	public function edit($id = 0) {
		if ($id != 0) {
			$this->load->model('kategori_m');
			// Prepare view
			$this->data['title'] = 'Edit Barang';
			$this->data['content'] = 'katalog/form';
			$this->data['css'] = 'katalog';
			$this->data['js'] = 'katalog';
			// Prepare data
			$this->data['autocomplete'] = $this->barang_m->get_autocomplete();
			$this->data['autocomplete']['kategori'] = $this->kategori_m->get_autocomplete();
			$this->data['data'] = $this->barang_m->get($id);
			// Do init()
			$this->init();
		} else {
			redirect(site_url('katalog'));
		}
	}

	/**
	 * Update data di database
	 * @param $id
	 */
	public function update() {
		// Prepare data & var
		$data = $this->input->post();
		$id = $data['id'];
		$data['kode_kategori'] = explode('-', $data['kode_kategori'])[0];
		$uploadSukses = false;
		// Unset unusefull data
		unset($data['id']);

		if (!empty($_FILES['gambar']['name'])) {

			$data['gambar'] = 'img-' . date('dmYhis');

			if ($this->do_upload($data['gambar'])) {

				$data['updatedAt'] = date('Y-m-d h:i:s');
				$data['createdBy'] = $this->ion_auth->get_user_id();
				$data['gambar'] = $this->upload->data('file_name');

				if ($this->barang_m->update($id, $data) == FALSE) {
					delete_files($this->upload->data('full_path'));
					// echo "Salah input";
					echo 'Terjadi kesalahan input';
				} else {
					echo "sukses";
				}
			} else {
				// echo $this->upload->display_errors();
				// show_404();
				echo 'Terjadi kesalahan upload';
			}
		} else {
			$data['createdAt'] = date('Y-m-d h:i:s');
			$data['createdBy'] = $this->ion_auth->get_user_id();

			if ($this->barang_m->update($id, $data) == FALSE) {
				// echo "Salah input2";
				// show_404();
				echo 'Terjadi kesalahan input';
			} else {
				echo 'data berhasil disimpan';
			}
		}
	}

	/**
	 *  Hapus data di database
	 */
	public function hapus() {
		$id = $this->input->post('id');
		$gambar = $this->input->post('gambar');

		if ($this->barang_m->delete($id)) {
			// hapus file
			if (!file_exists('./assets/img-user/' . $gambar) || $gambar == '' || unlink('./assets/img-user/' . $gambar)) {
				echo "true";
			} else {
				echo "true-false";
			}
		} else {
			echo "false";
		}
	}

	/**
	 *  Import Data dari Excel ke Database
	 */
	public function import() {
		$this->data['content'] = 'katalog/import';
		$this->init();
	}

	/**
	 *  Import Data Excel ke Database
	 */
	public function upload() {
		$fileName = time() . '-' . $_FILES['file']['name'];

		$config['upload_path'] = base_url('/assets/'); //buat folder dengan nama assets di root folder
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx|csv';
		$config['max_size'] = 10000;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
			$this->upload->display_errors();
		}
		$filepath = $this->upload->data('full_path');
		$inputFileName = base_url('/assets/') . $fileName;

		try {
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch (Exception $e) {
			die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
		}

		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		if ($highestRow > 1) {
			$highestColumn = $sheet->getHighestColumn();
			$insert = FALSE;
			for ($row = 2; $row <= $highestRow; $row++) {
				//  Read a row of data into an array
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
					NULL,
					TRUE,
					FALSE);

				//Sesuaikan sama nama kolom tabel di database
				$idKategori = $this->checkIdKategori($rowData[0][6]);
				$data = array(
					"nama" => $rowData[0][0],
					"merk" => $rowData[0][1],
					"tipe" => $rowData[0][2],
					"spesifikasi" => $rowData[0][3],
					"hargaPokok" => $rowData[0][4],
					"hargaSatuan" => $rowData[0][5],
					"id_kategori" => $idKategori,
					"createdBy" => $this->ion_auth->get_user_id(),
				);

				//sesuaikan nama dengan nama tabel
				$this->db->insert("barang", $data);
			}
			$this->session->set_flashdata('message', array('Berhasil di Upload', 'success'));
		} else {
			$this->session->set_flashdata('message', array('Gagal di Upload', 'danger'));
		}
		unlink($filepath);
		redirect('katalog/import');
	}

	/**
	 * Mengambil id kategori berdasarkan nama
	 * @param $nama_kategori
	 * @return mixed
	 */
	private function checkIdKategori($nama_kategori) {
		$this->db->select('id');
		$this->db->from('kategori');
		$this->db->where('nama', $nama_kategori);
		$result = $this->db->get()->result_array();
		return $result[0]['id'];
	}
}
