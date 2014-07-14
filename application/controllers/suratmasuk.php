<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuratMasuk extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		$this->load->model('surat_masuk');
	}
	
	function index() {
		$data['page']		= "surat_masuk";
		
		$this->load->view('admin/aaa', $data);
	}

	function add() {
		$data['page'] = "f_surat_masuk";
		$this->load->view('admin/aaa', $data);
	}

	function cari() {
		$key		= $this->input->post('search');
		$results 	= $this->surat_masuk->select($key);
		echo json_encode ($results);
	}

	function cetak() {
		$id = $this->uri->segment(3);
		$a['results'] = $this->surat_masuk->select_by_id($id);
		$this->load->view('admin/cetak_disposisi', $a);
	}

	function delete() {
		$id	= $this->uri->segment(3);
		$this->surat_masuk->delete($id);
		redirect('suratmasuk');
	}

	function do_add($data){
		$this->surat_masuk->add($data);
	}

	function do_edit($id, $data){
		$this->surat_masuk->update($id, $data);
	}

	function edit() {
		$id					= $this->uri->segment(3);
		$data['results']	= $this->surat_masuk->select_by_id($id);
		$data['page']		= "f_surat_masuk";
		$this->load->view('admin/aaa', $data);
	}

	function form_process(){
		$config['upload_path'] 		= './upload/surat_masuk';
		$config['allowed_types'] 	= '*';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);

		$id	= $this->input->post('idp');

		$data = array(
            'indeks' 				=> $this->input->post('indeks'),
			'kode' 					=> $this->input->post('kode'),
            'nomor_urut' 			=> $this->input->post('nomor_urut'),
            'tanggal_penyelesaian' 	=> $this->input->post('tanggal_penyelesaian'),
            'isi_ringkas'			=> $this->input->post('isi_ringkas'), 
            'asal' 					=> $this->input->post('asal'),
            'tanggal_surat'			=> $this->input->post('tanggal_surat'),
            'nomor_surat' 			=> $this->input->post('nomor_surat'),
            'lampiran' 				=> $this->input->post('lampiran'),  
            'diajukan_kepada'	 	=> '',
            'instruksi'			 	=> $this->input->post('instruksi'),
            'perihal'			 	=> $this->input->post('perihal')
            );

		$diajukan_kepada_sekretaris 	= $this->input->post('diajukan_kepada_sekretaris');
		if(isset($diajukan_kepada_sekretaris)){
			$data['diajukan_kepada'] = $data['diajukan_kepada'].'<p>'.$diajukan_kepada_sekretaris.'</p>';
		}

		$diajukan_kepada_kepala_bidang_ll 	= $this->input->post('diajukan_kepada_kepala_bidang_ll');
		if(isset($diajukan_kepada_kepala_bidang_ll)){
			$data['diajukan_kepada'] = $data['diajukan_kepada'].'<p>'.$diajukan_kepada_kepala_bidang_ll.'</p>';
		}

		$diajukan_kepada_kepala_bidang_sarpra 	= $this->input->post('diajukan_kepada_kepala_bidang_sarpra');
		if(isset($diajukan_kepada_kepala_bidang_sarpra)){
			$data['diajukan_kepada'] = $data['diajukan_kepada'].'<p>'.$diajukan_kepada_kepala_bidang_sarpra.'</p>';
		}

		$diajukan_kepada_kepala_bidang_kominfo 	= $this->input->post('diajukan_kepada_kepala_bidang_kominfo');
		if(isset($diajukan_kepada_kepala_bidang_kominfo)){
			$data['diajukan_kepada'] = $data['diajukan_kepada'].'<p>'.$diajukan_kepada_kepala_bidang_kominfo.'</p>';
		}

		$diajukan_kepada_ka_uptd_pkb 	= $this->input->post('diajukan_kepada_ka_uptd_pkb');
		if(isset($diajukan_kepada_ka_uptd_pkb)){
			$data['diajukan_kepada'] = $data['diajukan_kepada'].'<p>'.$diajukan_kepada_ka_uptd_pkb.'</p>';
		}

		if ($this->upload->do_upload('file_surat')) {
			$upload_data = $this->upload->data();
			$data['file'] = $upload_data['file_name'];
		}

		if($this->uri->segment(3) == "edit"){
			$this->do_edit($id, $data);
		} else if($this->uri->segment(3) == "add") {
			$this->do_add($data);
		}

		redirect('suratmasuk');
	}

}
/* End of file suratmasuk.php */
/* Location: ./application/controllers/suratmasuk.php */