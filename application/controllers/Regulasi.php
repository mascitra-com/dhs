<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Regulasi extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('regulasi_m');
        $this->load->library(array('upload'));
    }

    /**
     *  Tampilan daftar Regulasi
     */
    public function index()
    {
        $this->data['title'] = 'Regulasi';
        $this->data['content'] = 'regulasi/index';
        $this->data['regulasi'] = $this->regulasi_m->get_many_by(array('status' => 1));
        $this->data['css'] = 'regulasi';
        $this->data['js'] = 'regulasi';
        $this->init();
    }

    /**
     *  Menyimpan data baru
     */
    public function store()
    {
        $data = $this->input->post();
        if (!empty($_FILES['file']['name'])) {
            $this->uploadImage($data);
        } else {
            if ($this->regulasi_m->insert($data) == FALSE) {
                $this->message('Gagal! Data gagal ditambahkan', 'danger');
            }
        }
        redirect('regulasi');
    }

    /**
     * Upload file regulasi ke storage
     * @param $name
     * @return bool
     */
    public function do_upload($name)
    {
        $config['upload_path'] = '././assets/regulasi';
        $config['max_size'] = 10000;
        $config['file_name'] = $name;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
            return false;
        } else {
            return true;
        }
    }

    /**
     *  Tampilan edit regulasi
     */
    public function edit()
    {
        $id = $this->input->get('id');
        $data = $this->regulasi_m->get_by(array("id" => $id));
        $data->tgl_dikeluarkan = date('Y-m-d', strtotime(str_replace('-', '/', $data->tgl_dikeluarkan)));
        echo json_encode($data);
    }

    /**
     *  Update data regulasi
     */
    public function update()
    {
        $id = $this->input->post('id');
        $data = $this->input->post();
        if (!empty($_FILES['file']['name'])) {
            $this->updateImage($data, $id);
        } else {
            if ($this->regulasi_m->update($id, $data) == FALSE) {
                $this->message('Gagal! Data gagal di update', 'danger');
            } else {
                $this->message('Berhasil! Data berhasil di update', 'success');
            }
        }
        redirect('regulasi');
    }

    /**
     * Menonaktifkan status regulasi
     * @param $id
     */
    public function destroy($id)
    {
        $data['status'] = 0;
        if($this->regulasi_m->update($id, $data)){
            $this->message('Berhasil! Data berhasil di hapus', 'success');
        } else {
            $this->message('Gagal! Data gagal di hapus', 'danger');
        }
        redirect('regulasi');
    }

    /**
     * @param $data
     */
    private function uploadImage($data)
    {
        $data['file'] = 'file-' . date('dmYhis');
        if ($this->do_upload($data['file'])) {
            $data['file'] = $this->upload->data('file_name');
            if ($this->regulasi_m->insert($data) == FALSE) {
                delete_files($this->upload->data('full_path'));
                $this->message('Berhasil! Data berhasil ditambahkan', 'success');
            }
        } else {
            $this->message('Gagal! Data gagal ditambahkan', 'danger');
        }
    }

    /**
     * @param $data
     * @param $id
     */
    private function updateImage($data, $id)
    {
        $data['file'] = 'file-' . date('dmYhis');
        if ($this->do_upload($data['file'])) {
            $data['file'] = $this->upload->data('file_name');
            if ($this->regulasi_m->update($id, $data) == FALSE) {
                delete_files($this->upload->data('full_path'));
                $this->message('Gagal! Data gagal di update', 'danger');
            } else {
                $this->message('Berhasil! Data berhasil di update', 'success');
            }
        } else {
            $this->message('Gagal! Data gagal di update', 'danger');
        }
    }
}
