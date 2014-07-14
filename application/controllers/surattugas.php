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

	function cetak() {
		$surat_tugas_data = $this->session->flashdata('surat_tugas_data');
		if( ! empty($surat_tugas_data)){
			$surat_tugas_data['petugas'] 		= $this->input->post('petugas');
			$surat_tugas_data['surat_masuk'] 	= $this->get_surat_masuk($surat_tugas_data['id_surat_masuk']);

			$data['results'] = $surat_tugas_data;
			$this->load->view('admin/surat_tugas', $data);
		} else {
			redirect('suratmasuk');
		}
	}

	function form_process() {
		$surat_tugas_data = $this->session->flashdata('surat_tugas_data');
		if( ! empty($surat_tugas_data)){
			$surat_tugas_data['pengutus']['nama'] 		= $this->input->post('nama_pengutus');
			$surat_tugas_data['pengutus']['nip']  		= $this->input->post('nip_pengutus');
			$surat_tugas_data['pengutus']['jabatan']  	= $this->input->post('jabatan_pengutus');
			$surat_tugas_data['jumlah_petugas'] 		= $this->input->post('jumlah_petugas');
			$surat_tugas_data['nomor_surat_tugas'] 		= $this->input->post('nomor_surat_tugas');
			$this->session->set_flashdata('surat_tugas_data', $surat_tugas_data);

			$data['page'] 			= "f_input_petugas";
			$data['jumlah_petugas'] = $surat_tugas_data['jumlah_petugas'];
			$this->load->view('admin/aaa', $data);
		} else {
			redirect('suratmasuk');
		}
	}

	function get_surat_masuk($id) {
		return $this->surat_masuk->select_by_id($id);
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