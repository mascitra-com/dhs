<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blank extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		// Load model, library, helper disini
	}

    /**
     *  Menampilkan konten blank
     */
    public function index()
	{
	    $this->data['content'] = 'katalog/index';
	    $this->init();

	}

}
