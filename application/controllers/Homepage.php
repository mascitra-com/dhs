<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Homepage
 * Berisi Halaman Depan
 */
class Homepage extends MY_Controller
{

    /**
     * Homepage constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->data['css'] = 'homepage';
        $this->data['info'] = $this->pengumuman_m->get_info();
        $this->load->model(array('kategori_m', 'barang_m'));
    }

    /**
     *  Info : Menampilkan Pengumuman
     *  Kategori : Menampilkan Daftar Kategori
     */
    public function index()
    {
        $this->data['content'] = 'home';
        $this->data['daftar'] = $this->kategori_m->getKategoriWithChild();
        $this->data['kategori'] = $this->kategori_m->limit(4)->get_many_by(array('kode_induk_kategori' => NULL));
        $this->load->view('homepage/index', $this->data);
    }

    /**
     *  Menampilkan Daftar Barang sesuai kategori yang di pilih
     */
    public function daftar()
    {
        $id_kategori = $this->input->get('kategori');
        $result = $this->barang_m->get_many_by(array('id_kategori' => $id_kategori));

        // TODO Selesaikan Tampilan
    }

    /**
     *  Menampilkan Daftar Barang sesuai kategori yang di pilih
     */
    public function kontak()
    {
        $this->data['content'] = 'kontak';
        $this->load->view('homepage/index', $this->data);
    }
}
