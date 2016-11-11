<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager 
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        # Load model
        $this->load->model('Berkas_m', 'berkas');
        $this->data['js'] = 'berkas';
    }

    public function index()
    {
    	# Prepare view
    	$this->data['content'] = 'download/index';

    	# Get necessary data
    	$this->data['data'] = $this->berkas->get_all();
        $this->init();
    }

    /**
     *  Menyimpan data baru
     */
    public function store()
    {
    	$this->load->library('upload');

    	# prepare data
        $data = $this->input->post();
        $data['nama_file'] = $data['judul'];
        $data['createdAt'] = date('y-m-d h:i:s');

        # begin save data
        if (!empty($_FILES['berkas']['name'])) {

            $data['nama_file'] = $this->shorten($data['nama_file']);

            # begin upload
            if ($this->do_upload($data['nama_file'])) {

            	$data['nama_file'] = $this->upload->data('file_name');
            	
            	# save data
            	$sukses = $this->berkas->insert($data);
            	
            	#check if sukses
            	if ($sukses) {
            		$this->message('Data berhasil disimpan');
            		redirect(site_url('berkas'));
            	}else{
            		unlink('././assets/file/berkas/'.$data['nama_file']);
            		$this->message('Gagal input data', 'danger');
            	}
            }else{
            	$this->message('upload gagal', 'danger');
            }

        } else {
            $this->message('Terjadi kesalahan', 'danger');
        }
        redirect('berkas');
    }

    public function update()
    {
    	$this->load->library('upload');

    	# prepare data
        $data 				= $this->input->post();
        $id 				= $data['nomor'];
        $data['updatedAt'] 	= date('y-m-d h:i:s');
        unset($data['nomor']);

        # begin save data
        if (!empty($_FILES['berkas']['name'])) {

       		$data['nama_file']  = $data['judul'];
            $data['nama_file'] = $this->shorten($data['nama_file']);

            # begin upload
            if ($this->do_upload($data['nama_file'])) {

            	$data['nama_file'] = $this->upload->data('file_name');
            	
            	# save data
            	$sukses = $this->berkas->update($id,$data);
            	
            	#check if sukses
            	if ($sukses) {
            		$this->message('Data berhasil disimpan');
            		redirect(site_url('berkas'));
            	}else{
            		$this->message('Gagal input data', 'danger');
            	}
            }else{
            	$this->message('upload gagal', 'danger');
            }

        } else {
           	# save data
	    	$sukses = $this->berkas->update($id,$data);
	    	
	    	#check if sukses
	    	if ($sukses) {
	    		$this->message('Data berhasil disimpan');
	    		redirect(site_url('berkas'));
	    	}else{
	    		$this->message('Gagal input data', 'danger');
	    	}
        }
        redirect('berkas');
    }

    public function delete($id=0)
    {
    	if($id!==0)
    	{
    		$fileName = $this->berkas->get_by(array('nomor'=>$id))->nama_file;
    		if ($this->berkas->delete($id)) 
    		{
    			unlink('././assets/file/berkas/'.$fileName);
    			$this->message('Data berhasil dihapus', 'success');
    		}
    		else
    		{
    			$this->message('Data gagal dihapus', 'danger');
    		}
    	}
    	redirect(site_url('berkas'));
    }

    public function status($id=null, $status=null)
    {
    	if ($id !== null && $status !== null) {
    		$status = ($status == 1)?0:1;

    		$sukses = $this->berkas->update($id, array('status'=>$status));

    		if ($sukses) {
    			$this->message('status berhasil diganti', 'success');
    		}else{
    			$this->message('status gagal diganti', 'danger');
    		}
    		redirect(site_url('berkas'));
    	}
    }

    public function download($fileName=null)
    {
    	$this->load->helper('download');
    	if (!file_exists('././assets/file/berkas/'.$fileName) || $fileName==null) {
    		$this->message('File tidak ditemukan', 'warning');
    		redirect(site_url('berkas'));
    	}
    	force_download('././assets/file/berkas/'.$fileName, NULL);
    }

    /**
     * Upload file regulasi ke storage
     * @param $name
     * @return bool
     */
    private function do_upload($name)
    {
    	# create dir if not exist
    	if (!is_dir('././assets/file/berkas')) {
    		mkdir('././assets/file/berkas');
    	}

    	# Prepare upload configuration
        $config['upload_path'] 	= '././assets/file/berkas';
        $config['allowed_types']= 'rar|zip|doc|docx|xls|xlsx|ppt|pptx|jpg|gif|png|txt';
        $config['max_size'] 	= 10000;
        $config['file_name'] 	= $name;
        $config['overwrite'] 	= TRUE;
        $config['remove_spaces']= TRUE;

        # initialize & upload
        $this->upload->initialize($config);
        return $this->upload->do_upload('berkas');
    }

    private function shorten($fName)
    {
    	$fName = str_replace(array(' ','.','\\','/','*','?','"','<','>','|',':'), '', $fName);
    	$fName = substr($fName, 0,15);
    	return $fName;
    }
}
