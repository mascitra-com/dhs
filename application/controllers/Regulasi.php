<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Regulasi extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('regulasi_m');
        $this->load->library(array('upload'));
    }

    public function index()
    {
        $this->data['title'] = 'Regulasi';
        $this->data['content'] = 'regulasi/index';
        $this->data['regulasi'] = $this->regulasi_m->get_many_by(array('status' => 1));
        $this->data['css'] = 'regulasi';
        $this->data['js'] = 'regulasi';
        $this->init();
    }

    public function store()
    {
        $data = $this->input->post();

        if (!empty($_FILES['file']['name'])) {

            $data['file'] = 'file-' . date('dmYhis');

            if ($this->do_upload($data['file'])) {
                $data['file'] = $this->upload->data('file_name');

                if ($this->regulasi_m->insert($data) == FALSE) {
                    delete_files($this->upload->data('full_path'));
                    $this->session->set_flashdata('message', 'Gagal menyimpan data');
                }
            } else {
                $this->session->set_flashdata('message', 'Gagal menyimpan data');
            }
        } else {
            if ($this->regulasi_m->insert($data) == FALSE) {
                $this->session->set_flashdata('message', 'Gagal menyimpan data');
            }
        }
        redirect('regulasi');
    }

    public function do_upload($name)
    {
        $config['upload_path'] = '././assets/regulasi';
        $config['max_size'] = 10000;
        $config['file_name'] = $name;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            return false;
        } else {
            return true;
        }
    }

    public function edit()
    {
        $id = $this->input->get('id');
        $data = $this->regulasi_m->get_by(array("id" => $id));
        $data->tgl_dikeluarkan = date('Y-m-d', strtotime(str_replace('-', '/', $data->tgl_dikeluarkan)));
        echo json_encode($data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data = $this->input->post();
        if (!empty($_FILES['file']['name'])) {

            $data['file'] = 'file-' . date('dmYhis');

            if ($this->do_upload($data['file'])) {
                $data['file'] = $this->upload->data('file_name');

                if ($this->regulasi_m->update($id, $data) == FALSE) {
                    delete_files($this->upload->data('full_path'));
                    $this->session->set_flashdata('message', 'Gagal menyimpan data');
                }
            } else {
                $this->session->set_flashdata('message', 'Gagal menyimpan data');
            }
        } else {
            if ($this->regulasi_m->update($id, $data) == FALSE) {
                $this->session->set_flashdata('message', 'Gagal menyimpan data');
            }
        }
        redirect('regulasi');
    }

    public function destroy($id)
    {
        $data['status'] = 0;
        $this->regulasi_m->update($id, $data);
        redirect('regulasi');
    }
}
