<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ubah_password extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		$this->load->model('user');
	}
	
	public function index() {
		$data['page']		= "f_password";
		
		$this->load->view('admin/aaa', $data);
	}

}
/* End of file ubahpassword.php */
/* Location: ./application/controllers/ubahpassword.php */