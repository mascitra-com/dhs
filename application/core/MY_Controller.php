<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $data;
    protected $template = 'template/index';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_m', 'pengumuman_m');
    }
    /**
     * @param $method
     * @param array $param
     * @return mixed
     */
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
        //load pengumuman

        $this->data['info'] = $this->pengumuman_m->get_info();
        $this->load->view($this->template, $this->data);
    }

    /**
     *  Melakukan pengecekan status login
     */
    protected function checkLoggedIn()
    {
        if ($this->ion_auth->logged_in() == FALSE) {
            $this->session->set_flashdata('force', TRUE);
            redirect('users/login');
        }
    }
}
