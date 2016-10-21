<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends MY_Controller
{

    public function __construct()
    {
    	parent::__construct();
    }

    public function index()
    {
    	$this->data['title'] 	= 'Pengumuman';
    	$this->data['content']  = 'pengumuman/index';
        $this->data['css']      = 'pengumuman';
    	$this->init();
    }
}