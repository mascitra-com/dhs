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
        $this->data["kategori"] = $this->kategori_m->get_all();
        $this->data['title']   = 'Kategori Barang';
        $this->data['content'] = 'kategori/index';
        $this->init();
    }
}