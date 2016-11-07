<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Kategori
 */
class Kategori extends MY_Controller
{

    /**
     * Kategori constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_m');
        $this->load->library('pagination');
        $this->data['js'] = 'kategori';
        $this->data['css'] = 'kategori';
    }

    /**
     *  Menampilkan daftar Kategori
     */
    public function index()
    {
        $this->data["kategori"] = $this->kategori_m->get_many_by(array("status" => 1));
        $this->data['title'] = 'Kategori Barang';
        $this->data['content'] = 'kategori/index';
        $this->data['js'] = 'kategori';
        $this->init();
    }

    /**
     *  Menyimpan data baru ke database
     */
    public function store()
    {
        $data = $this->input->post();
        $insert['kode_kategori'] = $data['sub_kategori'];
        $insert['nama'] = $data['nama_kategori'];
        if ($data['induk'] != "") {
            $insert['kode_induk_kategori'] = $this->kategori_m->get_by(array('id' => $data['induk']))->kode_kategori;
        }

        if ($this->kategori_m->insert($insert)) {
            $this->message('Berhasil! Data berhasil di simpan', 'success');
        } else {
            $this->message('Gagal! Data gagal di simpan', 'danger');
        }
        redirect('kategori');
    }

    /**
     *  Menampilkan halaman edit kategori
     */
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
        foreach ($kategori as $list) {
            if ($list->id != $id) {
                array_push($data->kategori, "<option value='$list->id'>$list->kode_kategori. $list->nama</option>");
            }
        }
        echo json_encode($data);
    }

    /**
     *  Mengubah data di database sesuai inputan user
     */
    public function update()
    {
        $id = $this->input->post('idUpdate');
        $data = $this->input->post();
        $update['nama'] = $data['nama_kategoriUpdate'];
        if($this->kategori_m->update($id, $update)){
            $this->message('Berhasil! Data berhasil di update', 'success');
        } else {
            $this->message('Gagal! Data gagal di update', 'danger');
        }
        redirect('kategori');
    }

    /**
     * Mengubah status kategori menjadi tidak aktif
     * @param $id
     */
    public function destroy($id)
    {
        if($this->kategori_m->update($id, array('status' => 0))){
            $this->message('Berhasil! Data berhasil di hapus', 'success');
        } else {
            $this->message('Gagal! Data gagal di hapus', 'danger');
        }
        redirect('kategori');
    }

    /**
     *  Mendapatakan kode kategori baru untuk data kategori yang akan di inputkan
     */
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

    public function get_kode_induk()
    {
        $kode_induk_tertinggi = $this->kategori_m->order_by('id', 'DESC')->limit(1)->get_by(array('kode_induk_kategori' => NULL))->kode_kategori;
        $kode_baru = (int)$kode_induk_tertinggi + 1;
        if ($kode_baru < 10) {
            $kode_baru = '0' . $kode_baru;
        }
        echo $kode_baru;
    }
}