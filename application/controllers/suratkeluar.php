<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuratKeluar extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		$this->load->model('surat_keluar');
	}
	
	public function index() {
		$data["results"] 	= $this->surat_keluar->select();
		$data['page']		= "surat_keluar";
		
		$this->load->view('admin/aaa', $data);
	}

	public function add() {
		$data['page'] = "f_surat_keluar";
		$this->load->view('admin/aaa', $data);
	}

	public function cari() {
		$key		= $this->input->post('search');
		$results 	= $this->surat_keluar->select($key);
		echo json_encode ($results);
	}

	public function cetak() {
		$id = $this->uri->segment(3);
		$a['results'] = $this->surat_keluar->select_by_id($id);
		$this->load->view('admin/cetak_disposisi', $a);
	}

	public function delete() {
		$id	= $this->uri->segment(3);
		$this->surat_keluar->delete($id);
		redirect('suratkeluar');
	}

	public function do_add($data){
		$this->surat_keluar->add($data);
	}

	public function do_edit($id, $data){
		$this->surat_keluar->update($id, $data);
	}

	public function edit() {
		$id					= $this->uri->segment(3);
		$data['results']	= $this->surat_keluar->select_by_id($id);
		$data['page']		= "f_surat_keluar";
		$this->load->view('admin/aaa', $data);
	}

	public function form_process(){
		$config['upload_path'] 		= './upload/surat_keluar';
		$config['allowed_types'] 	= '*';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);

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

		if ($this->upload->do_upload('file_surat')) {
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