<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_m');
        $this->load->library('pagination');
        $this->data['js'] = 'kategori';
        $this->data['css'] = 'kategori';
    }

    public function index()
    {
        $this->data["kategori"] = $this->kategori_m->get_many_by(array("status" => 1));
        $this->data['title'] = 'Kategori Barang';
        $this->data['content'] = 'kategori/index';
        $this->init();
    }

    public function store()
    {
        $data = $this->input->post();
        $insert['kode_kategori'] = $data['sub_kategori'];
        $insert['nama'] = $data['nama_kategori'];
        if ($data['induk'] != "")
            $insert['kode_induk_kategori'] = $this->kategori_m->get_by(array('id' => $data['induk']))->kode_kategori;
        if ($this->kategori_m->insert($insert)) {
            $this->session->set_flashdata('Berhasil! Kategori telah ditambahkan');
        } else {
            $this->session->set_flashdata('Gagal! Terjadi kesalahan');
        }
        redirect('kategori');
    }

    public function edit()
    {
        $id = $this->input->get('id');
        $data = $this->kategori_m->get_by(array('id' => $id));
        $kode_induk = $data->kode_induk_kategori;
        if (!is_null($kode_induk)) {
            $id_induk = $this->kategori_m->get_by(array('kode_kategori' => $kode_induk))->id;
            $data->id_induk = $id_induk;
        } else {
            $data->id_induk = "";
        }
        $data->kategori = array('<option value="">Pilih kategori</option>');
        $kategori = $this->kategori_m->get_all();
        foreach ($kategori as $list){
            if ($list->id != $id){
                array_push($data->kategori, "<option value='$list->id'>$list->kode_kategori. $list->nama</option>");
            }
        }
        echo json_encode($data);
    }

    public function update()
    {
        $id = $this->input->post('idUpdate');
        $data = $this->input->post();
        $update['kode_kategori'] = $data['sub_kategoriUpdate'];
        $update['nama'] = $data['nama_kategoriUpdate'];
        if ($data['indukUpdate'] != "")
            $update['kode_induk_kategori'] = $this->kategori_m->get_by(array('id' => $data['indukUpdate']))->kode_kategori;
        $this->kategori_m->update($id, $update);
        redirect('kategori');
    }

    public function destroy($id)
    {
        $this->kategori_m->update($id, array('status' => 0));
        redirect('kategori');
    }

    public function get_kode()
    {
        $id = $this->input->get('id');
        if ($id != 0) {
            $kode_induk = $this->kategori_m->get_by(array('id' => $id))->kode_kategori;
            $kode_sub = $this->kategori_m->get_kode_barang_baru($kode_induk);
            echo $kode_induk . "." . $kode_sub;
        } else {
            echo "";
        }
    }
}