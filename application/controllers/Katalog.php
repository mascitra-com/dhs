<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->checkLoggedIn();
        $this->data['title'] = 'Katalog Barang';
        $this->data['js'] = 'katalog';
        $this->data['modal'] = 'katalog/form';
        $this->load->model('barang_m');
        $this->load->library('upload');
        $this->load->helper("file");
        require_once APPPATH . 'libraries/PHPExcel.php';
        include_once APPPATH . 'libraries/PHPExcel/Writer/PDF.php';
        // Load model, library, helper disini
    }

    /**
     *  Menampilkan konten blank
     */
    public function index()
    {
        $data = $this->input->get();

        $this->load->model('kategori_m');

        $this->data['content'] = 'katalog/index';
        $this->data['kategori'] = $this->kategori_m->get_all();
        $this->data['data'] = $this->barang_m->get_all_data($data);
        $this->data['autocomplete'] = $this->barang_m->get_autocomplete_data();

        if (!empty($data)) {
            $this->data['filter'] = $data;
        }

        $this->init();
        // dump($this->data);
    }

    /**
     *  Tambahkan data ke database
     */
    public function store()
    {
        $data = $this->input->post();
        $uploadSukses = false;
        $data['gambar'] = 'default.png';

        if (!empty($_FILES['gambar']['name'])) {

            $data['gambar'] = 'img-' . date('dmYhis');

            if ($this->do_upload($data['gambar'])) {

                $data['createdAt'] = date('Y-m-d h:i:s');
                $data['createdBy'] = $this->ion_auth->get_user_id();
                $data['gambar'] = $this->upload->data('file_name');

                if ($this->barang_m->insert($data) == FALSE) {
                    delete_files($this->upload->data('full_path'));
                    // echo "Salah input";
                    show_404();
                }
            } else {
                // echo $this->upload->display_errors();
                show_404();
            }
        } else {
            $data['createdAt'] = date('Y-m-d h:i:s');
            $data['createdBy'] = $this->ion_auth->get_user_id();

            if ($this->barang_m->insert($data) == FALSE) {
                // echo "Salah input2";
                show_404();
            }
        }
    }

    public function do_upload($name)
    {
        $config['upload_path'] = '././assets/img-user';
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

    public function detail($id = 0)
    {
        $this->data['content'] = 'katalog/detail';
        $this->data['detail'] = $this->barang_m->get($id);
        $this->init();
    }

    /**
     * Tampilan edit data
     * @param $id
     */
    public function edit($id)
    {

    }

    /**
     * Update data di database
     * @param $id
     */
    public function update($id)
    {

    }

    /**
     *  Hapus data di database
     */
    public function hapus()
    {
        $id = $this->input->post('id');
        $gambar = $this->input->post('gambar');

        if ($this->barang_m->delete($id)) {
            // hapus file
            if ($gambar == '' || unlink('./assets/img-user/' . $gambar)) {
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
    public function import()
    {
        $this->data['content'] = 'katalog/import';
        $this->init();
    }

    /**
     *  Import Data Excel ke Database
     */
    public function upload()
    {
        $fileName = time() . '-' . $_FILES['file']['name'];

        $config['upload_path'] = '././assets/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            $this->upload->display_errors();
        }
        $filepath = $this->upload->data('full_path');
        $inputFileName = '././assets/' . $fileName;

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
            for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array
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
                    "createdBy" => $this->ion_auth->get_user_id()
                );

                //sesuaikan nama dengan nama tabel
                $this->db->insert("barang", $data);
            }
            $this->session->set_flashdata('message', array('Berhasil di Upload','success'));
        } else {
            $this->session->set_flashdata('message', array('Gagal di Upload', 'danger'));
        }
        unlink($filepath);
        redirect('katalog/import');
    }

    public function checkIdKategori($nama_kategori)
    {
        $this->db->select('id');
        $this->db->from('kategori');
        $this->db->where('nama', $nama_kategori);
        $result = $this->db->get()->result_array();
        return $result[0]['id'];
    }
}
