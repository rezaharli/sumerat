<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuratTugas extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		$this->load->model('surat_masuk');
	}

	function index() {
		if($this->uri->segment(3)){
			redirect('surattugas/inputpengutus/'.$this->uri->segment(3));
		} else {
			redirect('suratmasuk');
		}
	}

	function form_process() {
		$surat_tugas_data = $this->session->flashdata('surat_tugas_data');
		if( ! empty($surat_tugas_data)){
			$surat_tugas_data['nama_pengutus'] 		= addslashes($this->input->post('nama_pengutus'));
			$surat_tugas_data['nip_pengutus'] 		= addslashes($this->input->post('nip_pengutus'));
			$surat_tugas_data['jabatan_pengutus'] 	= addslashes($this->input->post('jabatan_pengutus'));
			$surat_tugas_data['jumlah_petugas'] 	= addslashes($this->input->post('jumlah_petugas'));
			$this->session->set_flashdata('surat_tugas_data', $surat_tugas_data);

			$data['page'] 			= "f_input_petugas";
			$data['jumlah_petugas'] = $surat_tugas_data['jumlah_petugas'];
			$this->load->view('admin/aaa', $data);
		} else {
			redirect('suratmasuk');
		}
	}

	function cetak() {
		$petugas = $this->input->post('petugas');
		$surat_tugas_data = $this->session->flashdata('surat_tugas_data');
		echo "<pre>";
		print_r($surat_tugas_data);
		print_r($petugas);
	}

	function inputpengutus() {
		$surat_tugas_data['id_surat_masuk']	= $this->uri->segment(3);
		$this->session->set_flashdata('surat_tugas_data', $surat_tugas_data);
		
		$data['page'] = "f_input_pengutus";
		$this->load->view('admin/aaa', $data);
	}

}
/* End of file surattugas.php */
/* Location: ./application/controllers/surattugas.php */