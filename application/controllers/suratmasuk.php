<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuratMasuk extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		$this->load->model('surat_masuk');
		$this->load->model('diajukan_kepada');
	}
	
	function index() {
		$data['page'] = "surat_masuk";
		$this->load->view('admin/aaa', $data);
	}

	function add() {
		$data['page'] = "f_surat_masuk";
		$this->load->view('admin/aaa', $data);
	}

	function cari() {
		$key 			= $this->input->post('search');
		$berdasarkan 	= $this->input->post('berdasarkan');
		if($berdasarkan != 'diajukan_kepada'){
			$surat_masuk_results = array();
			$surat_masuk_results = $this->surat_masuk->select($key, $berdasarkan);
		} else {
			$diajukan_kepada_s = $this->diajukan_kepada->select($key);
			if( ! empty($diajukan_kepada_s)){
				foreach ($diajukan_kepada_s as $diajukan_kepada) {
					$surat_masuk_exist = FALSE;
					if( ! empty($surat_masuk_results)){
						foreach ($surat_masuk_results as $surat_masuk_result) {
							if($surat_masuk_result->id == $diajukan_kepada->id_surat_masuk){
								$surat_masuk_exist = TRUE;
							}
						}
					}
					if( ! $surat_masuk_exist){
						$surat_masuk_result = $this->surat_masuk->select_by_id($diajukan_kepada->id_surat_masuk);
						$surat_masuk_results[] = $surat_masuk_result;
					}
				}
			}
		}

		if( ! empty($surat_masuk_results)){
			foreach ($surat_masuk_results as $surat_masuk_result) {
				$surat_masuk_result->diajukan_kepada_s = $this->diajukan_kepada->select_by_id_surat_masuk($surat_masuk_result->id);
			}
		}
		echo json_encode ($surat_masuk_results);
	}

	function cetak() {
		$id_surat_masuk = $this->uri->segment(3);
		$surat_masuk_result = $this->surat_masuk->select_by_id($id_surat_masuk);
		if( ! empty($surat_masuk_result)){
			$surat_masuk_result->diajukan_kepada_s = $this->diajukan_kepada->select_by_id_surat_masuk($surat_masuk_result->id);
		}
		$data['results'] = $surat_masuk_result;
		$this->load->view('admin/cetak_disposisi', $data);
	}

	function delete() {
		$id_surat_masuk	= $this->uri->segment(3);
		$this->surat_masuk->delete($id_surat_masuk);
		$this->diajukan_kepada->delete_by_id_surat_masuk($id_surat_masuk);
		redirect('suratmasuk');
	}

	function delete_file(){
		$id	= $this->uri->segment(3);
		$this->do_delete_file($id);
        redirect('suratmasuk');
	}

	function do_add($data){
		$this->surat_masuk->add($data);
		return $this->surat_masuk->select_biggest_id();
	}

	function do_delete_file($id){
		$surat_masuk = $this->surat_masuk->select_by_id($id);
		$file = "./upload/surat_masuk/".$surat_masuk->file;
		if(is_file($file)){
        	if(unlink($file)){
        		$data['file'] = "";
        		$this->do_edit($id, $data);
        	}
        }
	}

	function do_edit($id, $data){
		$this->surat_masuk->update($id, $data);
	}

	function edit() {
		$id_surat_masuk	= $this->uri->segment(3);
		$this->diajukan_kepada->delete_by_id_surat_masuk($id_surat_masuk);

		$data['results']	= $this->surat_masuk->select_by_id($id_surat_masuk);
		$data['page']		= "f_surat_masuk";
		$this->load->view('admin/aaa', $data);
	}

	function form_process(){
		$id_surat_masuk	= $this->input->post('idp');

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
            'instruksi'			 	=> $this->input->post('instruksi'),
            'perihal'			 	=> $this->input->post('perihal')
            );

		$path = './upload/surat_masuk/';
		$config['upload_path'] 		= $path;
		if(!is_dir($path)) {
			mkdir($path, 0777);
		}
		$config['allowed_types'] 	= '*';
		$config['file_name'] 		= ellipsize($_FILES['file_surat']['name'], 32, .5);

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_surat')) {
			if($this->uri->segment(3) == "edit"){
				$this->do_delete_file($id_surat_masuk);
			}
			$upload_data = $this->upload->data();
			$data['file'] = $upload_data['file_name'];
		}

		if($this->uri->segment(3) == "edit"){
			$this->do_edit($id_surat_masuk, $data);
		} else if($this->uri->segment(3) == "add") {
			$id_surat_masuk = $this->do_add($data);
		}

		$diajukan_kepada_s = $this->input->post('diajukan_kepada');
		foreach ($diajukan_kepada_s as $diajukan_kepada) {
			if ( ! empty($diajukan_kepada)) {
				$data_diajukan_kepada = array(
					'id_surat_masuk'	=> $id_surat_masuk,
					'tujuan'			=> $diajukan_kepada
					);
				$this->diajukan_kepada->add($data_diajukan_kepada);
			}
		}

		redirect('suratmasuk');
	}

}
/* End of file suratmasuk.php */
/* Location: ./application/controllers/suratmasuk.php */
