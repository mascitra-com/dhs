<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('barang_m', 'kategori_m'));
        $this->load->library(array('upload', 'pagination'));
        $this->load->helper("file");

        $this->data['css'] = 'katalog';
        $this->data['js'] = 'katalog';
        require_once APPPATH . 'libraries/PHPExcel.php';
        include_once APPPATH . 'libraries/PHPExcel/Writer/PDF.php';
    }

    /**
     *  Menampilkan daftar Barang
     */
    public function index()
    {
        // Prepare View
        $this->data['title'] = 'Katalog Barang';
        $this->data['content'] = 'katalog/index';

        // Get filter
        $filter = $this->applyFilter();
        if (!$list_kategori = $this->cache->get('list_kategori')) {
            $this->data['tree_menu'] = $this->get_level_0();
            $this->cache->save('list_kategori', $this->get_level_0(), 3600);
        } else {
            $this->data['tree_menu'] = $list_kategori;
        }
        // Prepare Data
        $this->data['barang'] = $this->barang_m->get_all_data($filter);
        $this->data['autocomplete'] = $this->barang_m->get_autocomplete();
        // Do init
        $this->init();
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
     * @return string
     */
    public function get_level_0()
    {
        $results = $this->kategori_m->get_many_by(array('status' => 1)); //capture the query data inside $results variable
        $menu = $this->get_parent($results); //get_menu() function is bellow
        return $menu;
    }

    /**
     * @param      $results
     * @param null $parent_id
     *
     * @return string
     */
    public function get_parent($results, $parent_id = NULL)
    {
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
    public function parent_child($results, $kode_induk)
    {
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
    private function categoryCodeMatchedAndLessThanSixLength($results, $kode_induk, $i)
    {
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
    private function addParent($results, $i, $sub_menu, $menu)
    {
        $menu .= '<button class="list-group-item" data-toggle="collapse" data-target="#sm' . $i . '">
                                    ' . $results[$i]->kode_kategori . '. ' . ucwords(strtolower($results[$i]->nama)) . '<span class="caret"></span><span class="badge">' . $this->kategori_m->count_barang($results[$i]->kode_kategori) . '</span></button>' .
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
    private function addChild($results, $i, $menu)
    {
        $menu .= ' <a class="list-group-item" href="' . site_url('katalog?kategori=') . $results[$i]->kode_kategori . '">
            ' . $results[$i]->kode_kategori . '. ' . ucwords(strtolower($results[$i]->nama)) . '
        		<span class="badge">' . $this->kategori_m->count_barang($results[$i]->kode_kategori) . '</span></a>';
        return $menu;
    }

    /**
     *
     */
    public function add()
    {
        // Prepare View
        $this->data['title'] = 'Tambah Barang';
        $this->data['content'] = 'katalog/form';

        //prepare data
        $this->data['autocomplete'] = $this->barang_m->get_autocomplete();
        // $this->data['autocomplete']['kategori'] = $this->kategori_m->get_autocomplete();
        $this->data['kategori'] = $this->kategori_m->get_all();
        $this->init();

    }

    /**
     *  Tambahkan data ke database
     */
    public function store()
    {
        $data = $this->input->post();
        $data['kode_kategori'] = explode('-', $data['kode_kategori'])[0];
        $data['createdAt'] = date('Y-m-d h:i:s');
        $data['createdBy'] = $this->ion_auth->get_user_id();

        if ($this->fileHasName()) {
            $do = $this->uploadNewImage($data);
            if ($do == 'sukses') {
                $this->cache->delete('homepage');
                $this->cache->delete('list_kategori');
                echo json_encode(array($do));
            } else {
                echo json_encode(array($do));
            }
        } else {
            if ($this->barang_m->insert($data) == TRUE) {
                $this->cache->delete('homepage');
                $this->cache->delete('list_kategori');
                echo json_encode(array('sukses'));
            } else {
                echo json_encode(array('Data tidak dapat disimpan'));
            }
        }
    }

    /**
     * @return bool
     */
    private function fileHasName()
    {
        return !empty($_FILES['gambar']['name']);
    }

    /**
     * @param $data
     */
    private function uploadNewImage($data)
    {
        $data['gambar'] = 'img-' . date('Ymdhis');
        if ($this->do_upload($data['gambar'])) {
            $data['gambar'] = $this->upload->data('file_name');
            if ($this->barang_m->insert($data) == TRUE) {
                return 'sukses';
            } else {
                delete_files($this->upload->data('full_path'));
                return 'Upload gagal';
            }
        } else {
            return 'data gagal disimpan';
        }
    }

    /**
     * Mengunggah foto yang di inputkan saat entri data barang
     *
     * @param $name
     *
     * @return bool
     */
    public function do_upload($name)
    {
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
     *
     * @param int $id barang
     */
    public function detail($id = 0)
    {
        // Prepare view
        $this->data['title'] = 'Detail Barang';
        $this->data['content'] = 'katalog/detail';

        // Add popularity to barang base on $id
        $this->data['detail'] = $this->barang_m->get_data_by($id);
        $increment = (int)$this->data['detail']->popularitas;
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
     *
     * @param $id
     */
    public function edit($id = 0)
    {
        if ($id != 0) {
            $this->load->model('kategori_m');
            // Prepare view
            $this->data['title'] = 'Edit Barang';
            $this->data['content'] = 'katalog/form';

            // Prepare data
            $this->data['autocomplete'] = $this->barang_m->get_autocomplete();
            // $this->data['autocomplete']['kategori'] = $this->kategori_m->get_autocomplete();
            $this->data['kategori'] = $this->kategori_m->get_all();

            $this->data['data'] = $this->barang_m->get_data_by($id);
            // Do init()
            $this->init();
        } else {
            redirect(site_url('katalog'));
        }
    }

    /**
     * Update data di database
     *
     * @param $id
     */
    public function update()
    {
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
        if ($this->fileHasName()) {
            $this->updateImage($data, $id);
        } else {
            if ($this->barang_m->update($id, $data) == FALSE) {
                // echo "Salah input2";
                // show_404();
                echo json_encode(array('Terjadi kesalahan input'));
            } else {
                echo json_encode(array('sukses'));
            }
        }
    }

    /**
     * @param $data
     * @param $id
     */
    private function updateImage($data, $id)
    {
        $data['gambar'] = 'img-' . date('Ymdhis', time());
        // Upload image
        if ($this->do_upload($data['gambar'])) {
            $data['gambar'] = $this->upload->data('file_name');
            if ($this->barang_m->update($id, $data) == FALSE) {
                delete_files($this->upload->data('full_path'));
                // echo "Salah input";
                echo json_encode(array('Upload gagal'));
            } else {
                echo json_encode(array('sukses'));
            }
        } else {
            // echo $this->upload->display_errors();
            // show_404();
            echo 'Terjadi kesalahan upload';
        }
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
            if (!file_exists('./assets/img-user/' . $gambar) || $gambar == '' || unlink('./assets/img-user/' . $gambar)) {
                echo "true";
            } else {
                echo "true-false";
            }
            $this->cache->delete('homepage');
            $this->cache->delete('list_kategori');
        } else {
            echo "false";
        }
    }

    /**
     *  Import Data Excel ke Database
     */
    public function upload()
    {
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
                $tmp = $sheet->rangeToArray('A' . $startRow . ':' . 'N' . $startRow++, NULL, TRUE, FALSE)[0];
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
                    "tahun_anggaran" => $tmp[13],
                    "createdBy" => $this->ion_auth->get_user_id(),
                );
                array_push($rowData, $data);
            }
            if ($this->barang_m->insert_many($rowData)) {
                $this->message('Berhasil! Data berhasil di upload', 'success');
                $this->cache->delete('homepage');
                $this->cache->delete('list_kategori');
            } else {
                $this->message('Gagal! Data gagal di upload', 'danger');
            }
        } else {
            $this->message('Gagal! Data gagal di upload', 'danger');
        }
        redirect(site_url('katalog/add'));
    }

    /**
     * @param $kode_kategori
     *
     * @return int
     */
    public function get_total_barang($kode_kategori)
    {
        return $this->barang_m->count_by(array('kode_kategori' => $kode_kategori));
    }

    /**
     * Mengambil id kategori berdasarkan nama
     *
     * @param $nama_kategori
     *
     * @return mixed
     */
    private function checkIdKategori($nama_kategori)
    {
        $this->db->select('id');
        $this->db->from('kategori');
        $this->db->where('nama', $nama_kategori);
        $result = $this->db->get()->result_array();
        return $result[0]['id'];
    }
}
