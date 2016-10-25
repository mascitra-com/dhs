<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MY_Controller
{
	protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->data['css'] = 'homepage';
    }

    public function index()
    {
    	$this->data['content'] = 'home';
        $this->load->view('homepage/index', $this->data);
    }
}
