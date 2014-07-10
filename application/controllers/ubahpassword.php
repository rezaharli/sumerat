<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UbahPassword extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		$this->load->model('user');
	}
	
	function index() {
		$data['page']		= "f_password";
		$this->load->view('admin/aaa', $data);
	}
	
	function form_process() {
		$oldpass	= $this->input->post('oldpass');
		$newpass1	= $this->input->post('newpass1');
		$newpass2	= $this->input->post('newpass2');
		
		if($this->user->validate_user($this->session->userdata('nip'), $oldpass)){
			if($newpass1 == $newpass2){
				$this->user->update_password($newpass2);
				$this->session->set_flashdata('error', '<div id="alert" class="alert alert-success">Password berhasil diperbaharui</div>');
			} else {
				$this->session->set_flashdata('error', '<div id="alert" class="alert alert-error">Password Baru 1 dan 2 tidak cocok</div>');
			}
		} else {
			$this->session->set_flashdata('error', '<div id="alert" class="alert alert-error">Password Lama tidak sama</div>');
		}
		redirect('ubahpassword');
		
		$this->load->view('admin/aaa', $a);
	}

}

/* End of file ubahpassword.php */
/* Location: ./application/controllers/ubahpassword.php */