<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $data;
    protected $template = 'template/index';
    private $adminFeatures = array('auth', 'dashboard', 'export', 'katalog', 'kategori', 'pengumuman', 'regulasi', 'users', 'berkas', 'profil');

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_m', 'pengumuman_m');
        $this->data['info'] = $this->pengumuman_m->get_info();
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }

    /**
     * @param       $method
     * @param array $param
     *
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
        $this->checkLoggedIn();
        $this->data['info'] = $this->pengumuman_m->get_info();
        $this->load->view($this->template, $this->data);
    }

    /**
     *  Melakukan pengecekan status login
     */
    protected function checkLoggedIn()
    {
        $menu = $this->uri->segment(1, 1);
        if($this->ion_auth->is_admin() == FALSE && in_array($menu, $this->adminFeatures)){
            redirect('homepage');
        }
        if ($this->ion_auth->logged_in() == FALSE) {
            $this->session->set_flashdata('force', TRUE);
            redirect('login');
        }
    }

    /**
     * @param $path
     */
    protected function addTemp($file)
    {
        $data = $this->session->userdata('temp');
        if (empty($data)) {
            $data = array();
        }
        array_push($data, $file);
        $this->session->set_userdata('temp', $data);
    }

    protected function message($message, $type = 'success')
    {
        $this->session->set_flashdata(array(
            'type' => $type,
            'message' => $message));
    }

    protected function getPath()
    {
        if (!is_dir('assets/file/temp-' . $this->ion_auth->get_user_id())) {
            @mkdir('assets/file/temp-' . $this->ion_auth->get_user_id());
        }
        return 'assets/file/temp-' . $this->ion_auth->get_user_id() . '/';
    }
}
