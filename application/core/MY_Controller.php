<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $data;
    protected $template = 'template/index';

    // Methode _remap
    public function _remap($method, $param = array())
    {
        if (method_exists($this, $method) && $method != 'index') {
            return call_user_func_array(array($this, $method), $param);
        } else {
            $this->index();
        }
    }

    /**
     *  Method init
     *  Berfungsi untuk me-load semua tampilan
     *  dan segala macam logika yang dijalankan ketika akan
     *  me-load tampilan
     */
    protected function init()
    {
        $this->load->view($this->template, $this->data);
    }
}
