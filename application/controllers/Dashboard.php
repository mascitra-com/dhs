<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager 
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Insight_m', 'insight');
        $this->data['css'] = 'dashboard';
        $this->data['js']  = 'dashboard';
    }

    public function index()
    {
    	# get basic count
    	$this->data['jumlah']['kategori'] = $this->insight->getKategoriCount(); 
    	$this->data['jumlah']['barang']   = $this->insight->getBarangCount();
    	$this->data['jumlah']['pengguna'] = $this->insight->getPenggunaCount();
    	$this->data['jumlah']['barangTahun'] = $this->insight->getBarangTahunCount();

    	# get chart data
    	$this->data['chart']['first'] = $this->insight->getChartKategori();
    	
    	# prepare data item
    	$this->data['populer'] = $this->insight->getPopulerItem();
    	$this->data['newest']  = $this->insight->getPopulerItem();

    	$this->data['content'] = 'dashboard/index';

        $this->init();
    }

    public function tes()
    {
        echo $this->insight->getChartKategori();
    }
}
