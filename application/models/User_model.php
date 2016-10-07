<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{
    protected $has_many = array('questions', 'answers');

    public $validation = array(
        array('field' => 'identity',
              'label' => 'Email',
              'rules' => 'required|valid_email|trim'),
        array('field' => 'password',
              'label' => 'Password',
              'rules' => 'required|trim'),
        array('field' => 'remember',
              'label' => 'Ingatkan Saya',
              'rules' => 'trim'));

    public function __construct()
    {
        parent::__construct();
        $this->_database = $this->db;
    }

}
