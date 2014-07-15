<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuratKeluar extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		$this->load->model('surat_keluar');
	}
	
	function index() {
		$data['page']		= "surat_keluar";
		$this->load->view('admin/aaa', $data);
	}

	function add() {
		$data['page'] = "f_surat_keluar";
		$this->load->view('admin/aaa', $data);
	}

	function cari() {
		$key			= $this->input->post('search');
		$berdasarkan	= $this->input->post('berdasarkan');
		$results = $this->surat_keluar->select($key, $berdasarkan);
		echo json_encode ($results);
	}

	function cetak() {
		$id = $this->uri->segment(3);
		$a['results'] = $this->surat_keluar->select_by_id($id);
		$this->load->view('admin/cetak_kartu_surat_keluar', $a);
	}

	function delete() {
		$id	= $this->uri->segment(3);
		$this->surat_keluar->delete($id);
		redirect('suratkeluar');
	}

	function delete_file(){
		$id	= $this->uri->segment(3);
		$this->do_delete_file($id);
        redirect('suratkeluar');
	}

	function do_add($data){
		$this->surat_keluar->add($data);
	}

	function do_delete_file($id){
		$surat_keluar = $this->surat_keluar->select_by_id($id);
		$file = "./upload/surat_keluar/".$surat_keluar->file;
		if(is_file($file)){
        	if(unlink($file)){
        		$data['file'] = "";
        		$this->do_edit($id, $data);
        	}
        }
	}

	function do_edit($id, $data){
		$this->surat_keluar->update($id, $data);
	}

	function edit() {
		$id					= $this->uri->segment(3);
		$data['results']	= $this->surat_keluar->select_by_id($id);
		$data['page']		= "f_surat_keluar";
		$this->load->view('admin/aaa', $data);
	}

	function form_process(){
		$id	= addslashes($this->input->post('idp'));

		$data = array(
            'indeks' 			=> addslashes($this->input->post('indeks')),
			'kode' 				=> addslashes($this->input->post('kode')),
            'nomor_urut' 		=> addslashes($this->input->post('nomor_urut')),
            'isi_ringkas'		=> addslashes($this->input->post('isi_ringkas')), 
            'kepada' 			=> addslashes($this->input->post('kepada')),
            'pengolah'			=> addslashes($this->input->post('pengolah')),
            'tanggal_surat' 	=> addslashes($this->input->post('tanggal_surat')),
            'lampiran' 			=> addslashes($this->input->post('lampiran')),  
            'catatan'	 		=> addslashes($this->input->post('catatan')),
            'dinas_instansi'	=> addslashes($this->input->post('dinas_instansi'))
            );

		$config['upload_path'] 		= './upload/surat_keluar';
		$config['allowed_types'] 	= '*';
		$config['file_name'] 		= ellipsize($_FILES['file_surat']['name'], 32, .5);

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_surat')) {
			if($this->uri->segment(3) == "edit"){
				$this->do_delete_file($id);
			}
			$upload_data = $this->upload->data();
			$data['file'] = $upload_data['file_name'];
		}

		if($this->uri->segment(3) == "edit"){
			$this->do_edit($id, $data);
		} else if($this->uri->segment(3) == "add") {
			$this->do_add($data);
		}

		redirect('suratkeluar');
	}

}
/* End of file suratkeluar.php */
/* Location: ./application/controllers/suratkeluar.php */