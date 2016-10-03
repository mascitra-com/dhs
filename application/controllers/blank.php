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
	    $this->data['title'] = 'Blank Content';
	    $this->data['content'] = 'v_blank';
		$this->init('v_blank');
	}

}
