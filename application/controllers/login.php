<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
	    if($this->session->userdata('is_logged_in')) {
	        redirect('admin');
	    }
	    $this->load->model('user');
	}
	
	function index() {
	    $nip 		= $this->security->xss_clean($this->input->post('nip'));
        $password 	= $this->security->xss_clean($this->input->post('pass'));

	    if($nip && $password) {
	    	if($this->user->validate_user($nip, $password)){
	        	redirect('home');
	    	} else {
	        	$this->show_login_page("<div id=\"alert\" class=\"alert alert-error\">Username atau password tidak cocok</div>");
	    	}
	    } else {
	        $this->show_login_page("<div id=\"alert\" class=\"alert alert-error\">Silahkan Login</div>");
	    }
	}

	function show_login_page($show_error) {
	    $data['page'] = 'login';
	    $data['error'] = $show_error;
	    $this->load->view('admin/aaa', $data);
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */