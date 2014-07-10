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
	
	function index() {
	  	$data["results"] 	= $this->kode_surat->select_record(50000, 0);
	  	$data['page']		= "kode_surat";
		$this->load->view('admin/aaa', $data);
	}

	function cari() {
		$key		= $this->input->post('search');
		$results 	= $this->kode_surat->select_record(50000, 0, $key);
		echo json_encode ($results);
	}

	function get_autocomplete() {
		$key 				= $this->input->post('kode',TRUE);
		$data 				= $this->kode_surat->select_record(5, 0, $key);
		$klasifikasi 		= array();
        foreach ($data as $d) {
			$json_array				= array();
            $json_array['value']	= $d->kode;
			$json_array['label']	= $d->kode." - ".$d->uraian;
			$klasifikasi[] 			= $json_array;
		}
		
		echo json_encode($klasifikasi);
	}

}

/* End of file kodesurat.php */
/* Location: ./application/controllers/kodesurat.php */