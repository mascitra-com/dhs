<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_m extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->_table = 'kategori';
    }

    public function index()
    {
        
    }
}