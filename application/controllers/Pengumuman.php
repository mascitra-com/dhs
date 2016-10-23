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

    public function index()
    {
    	$this->data['title'] 	  = 'Pengumuman';
    	$this->data['content']    = 'pengumuman/index';
        $this->data['pengumuman'] = $this->pengumuman_m->get_all();
    	$this->init();
    }

    public function store()
    {
        $data = $this->input->post();
        if (isset($data['penting']) || $data['penting']=='on') {
            $data['penting'] = 1;
        }

        if (!isset($data['masa_aktif']) || empty($data['masa_aktif'])) {
           $data['masa_aktif'] = null;
        }

        if ($this->pengumuman_m->insert($data)) {
            $this->session->set_flashdata('pesan', 'Data berhasil diinputkan');
            redirect(site_url('pengumuman'));
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal diinputkan');
            redirect(site_url('pengumuman'));
        }
    }

    public function update()
    {
        $data = $this->input->post();
        $id   = $data['id'];
        unset($data['id']);

        if ($this->pengumuman_m->update($id, $data)) {
            echo "sukses";
        }else{
            echo "gagal";
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->pengumuman_m->delete($id)) {
            echo "sukses";
        }else{
            echo "gagal";
        }
    }
}