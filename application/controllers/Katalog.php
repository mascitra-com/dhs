<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends MY_Controller {

	public function __construct() {
		parent::__construct();
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
        // Prepare View
		$this->data['title'] = 'Katalog Barang';
		$this->data['content'] = 'katalog/index';
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
		$this->init();
	}

	public function add() {
        // Prepare View
		$this->data['title'] = 'Tambah Barang';
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
		$data['createdAt'] = date('Y-m-d h:i:s');
		$data['createdBy'] = $this->ion_auth->get_user_id();

		if (!empty($_FILES['gambar']['name'])) {
            $this->uploadNewImage($data);
		} else {
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
		$config['overwrite'] = TRUE;

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
        // Add popularity to barang base on $id
        $this->data['detail'] = $this->barang_m->get_data_by($id);
        $increment = (int) $this->data['detail']->popularitas;
        $update['popularitas'] = $increment + 1;
        $this->barang_m->update($id, $update);
        // Prepare data
		$filter['kategori'] = $this->data['detail']->kode_kategori;
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
			$this->data['data'] = $this->barang_m->get_data_by($id);
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
		$data['updateAt'] = date('Y-m-d h:i:s');
		$data['updateBy'] = $this->ion_auth->get_user_id();
		// Unset unusefull data
		unset($data['id']);
        // If image exist
        if (!empty($_FILES['gambar']['name'])) {
            $this->updateImage($data, $id);
		} else {
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
	 *  Import Data Excel ke Database
	 */
	public function upload() {
		$this->load->library('upload');
		$fileName = $_FILES['import']['name'];

		$config['upload_path'] = './assets'; //buat folder dengan nama assets di root folder
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx|csv';
		$config['max_size'] = 10000;
		$config['overwrite'] = TRUE;

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('import')) {
			$this->upload->display_errors();
		}
		$inputFileName = './assets/' . $fileName;

		try {
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch (Exception $e) {
			die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
		}

		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$startRow = 2;
		$rowData = array();
		if ($highestRow > 1) {
			$highestColumn = $sheet->getHighestColumn();
			$insert = FALSE;
			for ($row = 0; $row < $highestRow - 1; $row++) {
				//  Read a row of data into an array
				$tmp = $sheet->rangeToArray('A' . $startRow . ':' . 'M' . $startRow++, NULL, TRUE, FALSE)[0];
				$data = array(
					"nama" => $tmp[0],
					"merk" => $tmp[1],
					"tipe" => $tmp[2],
					"ukuran" => $tmp[3],
					"satuan" => $tmp[4],
					"hargaPasar" => $tmp[5],
					"biayaKirim" => $tmp[6],
					"resistensi" => $tmp[7],
					"ppn" => $tmp[8],
					"hargashsb" => $tmp[9],
					"keterangan" => $tmp[10],
					"spesifikasi" => $tmp[11],
					"kode_kategori" => $tmp[12],
					"createdBy" => $this->ion_auth->get_user_id(),
				);
				array_push($rowData, $data);
			}
			if ($this->barang_m->insert_many($rowData)) {
                $this->message('Berhasil! Data berhasil di upload', 'success');
			} else {
                $this->message('Gagal! Data gagal di upload', 'danger');
			}
        } else {
            $this->message('Gagal! Data gagal di upload', 'danger');
        }
        redirect(site_url('katalog/add'));
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

    /**
     * @return mixed
     */
    private function applyFilter()
    {
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

    /**
     * @param $data
     */
    private function uploadNewImage($data):void
    {
        $data['gambar'] = 'img-' . date('Ymdhis', strtotime($data['createdAt']));
        if ($this->do_upload($data['gambar'])) {
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
    }

    /**
     * @param $data
     * @param $id
     */
    private function updateImage($data, $id):void
    {
        $data['gambar'] = 'img-' . date('Ymdhis', strtotime($data['createdAt']));
        // Upload image
        if ($this->do_upload($data['gambar'])) {
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
    }
}
