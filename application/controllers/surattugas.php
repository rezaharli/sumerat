<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuratTugas extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		$this->load->model('surat_tugas');
	}

}
/* End of file surattugas.php */
/* Location: ./application/controllers/surattugas.php */