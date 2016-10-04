<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['title'] = 'Katalog Barang';
        $this->data['js'] = 'katalog';
        $this->load->model('barang_m');
        // Load model, library, helper disini
    }

    /**
     *  Menampilkan konten blank
     */
    public function index()
    {
        $this->data['content'] = 'v_katalog';
        $this->data['modal'] = 'v_katalog_form';
        $this->init();
    }

    /**
     *  Tambahkan data ke database
     */
    public function store()
    {
        $data               = $this->input->post();
        $data['gambar']     = 'img-' . date('dmYhis');
        $data['createdAt']  = date('Y-m-d');
        $data['createdBy']  = '121212';

        if ($this->barang_m->insert($data) != FALSE) {
            if ($this->do_upload($data['gambar'])) {
                echo "sukses";
            }else{
                show_404();
            }
        }else{
            show_404();
        }
    }

    public function do_upload($name)
    {
        $config['upload_path'] = '././assets/img-user';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = $name;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            return false;
        } else {
            return true;
        }
    }

    public function show($id)
    {

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
    public function destroy($id)
    {

    }
}
