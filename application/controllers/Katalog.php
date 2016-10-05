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
        $this->load->model('barang_m');
        $this->load->library('upload');
        // Load model, library, helper disini
    }

    /**
     *  Menampilkan konten blank
     */
    public function index()
    {
        $this->load->model('kategori_m');

        $this->data['content']      = 'katalog/index';
        $this->data['modal']        = 'katalog/form';
        $this->data['kategori']     = $this->kategori_m->get_all();
        $this->data['data']         = $this->barang_m->get_all_data();
        $this->data['autocomplete'] = $this->barang_m->get_autocomplete_data(); 

        $this->init();
        // dump($this->data);
    }

    /**
     *  Tambahkan data ke database
     */
    public function store()
    {
        $data           = $this->input->post();
        $data['gambar'] = 'img-' . date('dmYhis');
        
        if ($this->do_upload($data['gambar'])){
            
            $data['createdAt']  = date('Y-m-d h:i:s');
            $data['createdBy']  = $this->ion_auth->get_user_id();
            $data['gambar'] = $this->upload->data('file_name');

            if ($this->barang_m->insert($data) != FALSE) {
                echo "sukses";
            }else{
                echo "SALAH input";
                delete_files($this->upload->data('full_path'));
                show_404();
            }
        }else{
            echo "Salah Upload";
            show_404();
        }
    }

    public function do_upload($name)
    {
        $config['upload_path'] = '././assets/img-user';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = $name;

        $this->upload->initialize($config);

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
