<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

include __DIR__ . '/Auth.php';

class Users extends Auth {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('user_model', 'ion_auth_model'));
		$this->lang->load('auth');
	}

	public function index() {
		$this->data['title'] = 'Daftar Pengguna';
		$this->data['content'] = 'auth/index';
		$this->data['message'] = null;
		$this->data['users'] = $this->ion_auth_model->users()->result();
		foreach ($this->data['users'] as $k => $user) {
			$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		}
		$this->init();
	}

	/**
	 *  Method Login
	 */
	public function login() {
		$this->data['message'] = null;
		// redirect jika sudah login
		if ($this->ion_auth->logged_in() == TRUE) {
			redirect('katalog');
		}
		// Validasi form
		$this->form_validation->set_rules($this->user_model->validation);
		if ($this->form_validation->run() == TRUE) {
			// Mencoba login
			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $this->input->post('remember'))) {
				redirect('katalog');
			} else {
				$this->data['operation'] = 'danger';
				$this->data['message'] = 'E-mail dan Password yang Anda masukkan salah!';
			}
		}
		// Tampilkan Login Form
		$this->data['title'] = 'Login';
		$this->data['content'] = 'auth/login';
		// Tampilkan pesan error jika non user memaksa kesuatu fitur
		if ($this->session->flashdata('force')) {
			$this->data['operation'] = 'danger';
			$this->data['message'] = "Silahkan Login Terlebih Dahulu";
		}
		$this->load->view('auth/login', $this->data);
	}

	/**
	 *  Menampilkan informasi Akun User yg sedang login
	 */
	public function edit($id_user = NULL) {
		if (is_null($id_user)) {
			$id_user = $this->ion_auth->get_user_id();
		}
		$this->data['title'] = 'Profil Akun';
		$this->data['content'] = 'auth/profile';
		$this->data['message'] = null;
		$this->data['user'] = $this->user_model->get($id_user);
		$this->init();
	}

	public function update($id_user = NULL) {
		if (is_null($id_user)) {
			$id_user = $this->ion_auth->get_user_id();
		}
		$data = $this->input->post();
		if ($this->user_model->update($id_user, $data) == TRUE) {
            $this->message('Berhasil! Data berhasil di ganti', 'success');
			redirect('users/edit');
		} else {
            $this->message('Gagal! Data gagal di ganti', 'danger');
        }
		$this->data['title'] = 'Profil Akun';
		$this->data['content'] = 'auth/profile';
		$this->data['user'] = $this->user_model->get($id_user);
		$this->init();
	}

	/**
	 *  Logout dan menghapus semua session
	 */
	public function logout() {
		$this->ion_auth->logout();
		$this->session->sess_destroy();
        $this->message('Anda berhasil logout', 'success');
		redirect('login');
	}
}
