<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->data['title'] = 'Katalog';
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
