<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KodeSurat extends CI_Controller {

	public $configs = array();

	function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('is_logged_in')) {
			redirect('login');
		}
	  	$this->load->model('kode_surat');
	}
	
	public function index() {
	  	$data["results"] 	= $this->kode_surat->select_record(50000, 0);
	  	$data['page']		= "kode_surat";
		$this->load->view('admin/aaa', $data);
	}

	public function cari() {
		$key		= $this->input->post('search');
		$results 	= $this->kode_surat->select_record(50000, 0, $key);
		echo json_encode ($results);
	}

}

/* End of file kodesurat.php */
/* Location: ./application/controllers/kodesurat.php */