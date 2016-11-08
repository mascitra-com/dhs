<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['css'] = 'pengumuman';
        $this->data['js'] = 'pengumuman';

        $this->load->model('Pengumuman_m', 'pengumuman_m');
    }

    /**
     *  Menampilkan Daftar Pengumuman
     */
    public function index()
    {
        $this->data['title'] = 'Pengumuman';
        $this->data['content'] = 'pengumuman/index';
        $this->data['pengumuman'] = $this->pengumuman_m->get_all();
        $this->init();
    }

    /**
     *  Menambahkan pengumuman baru
     */
    public function store()
    {
        $data = $this->input->post();
        if ($this->isImportant($data)) {
            $data['penting'] = 1;
        }
        if ($this->noActiveDate($data)) {
            $data['masa_aktif'] = null;
        }
        if ($this->pengumuman_m->insert($data)) {
            $this->message('Berhasil! Data berhasil ditambahkan', 'success');
            redirect(site_url('pengumuman'));
        } else {
            $this->message('Gagal! Data gagal ditambahkan', 'danger');
            redirect(site_url('pengumuman'));
        }
    }

    /**
     *  Mengganti data di database sesuai id pengumuman
     */
    public function update()
    {
        $data = $this->input->post();
        $id = $data['id'];
        unset($data['id']);
        if ($this->pengumuman_m->update($id, $data)) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }

    /**
     *  Tampilan Update pengumuman
     */
    public function updateForm()
    {
        $data = $this->input->post();
        $id = $data['id'];
        unset($data['id']);
        if ($this->pengumuman_m->update($id, $data)) {
            $this->message('Berhasil! Data berhasil ditambahkan', 'success');
        } else {
            $this->message('Gagal! Data gagal ditambahkan', 'danger');
        }
        redirect('pengumuman');
    }

    /**
     *  Menghapus pengumuman
     */
    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->pengumuman_m->delete($id)) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }

    /**
     * @param $data
     * @return bool
     */
    private function isImportant($data):bool
    {
        return isset($data['penting']) || $data['penting'] === 'on';
    }

    /**
     * @param $data
     * @return bool
     */
    private function noActiveDate($data):bool
    {
        return !isset($data['masa_aktif']) || empty($data['masa_aktif']);
    }
}