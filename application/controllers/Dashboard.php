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
    }

    public function index()
    {
        $this->init();
    }
}
