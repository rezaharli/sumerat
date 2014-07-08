<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('is_logged_in')) {
			redirect('login');
		}
	}
	
	public function index() {
		$a['page']	= "d_amain";
		$this->load->view('admin/aaa', $a);
	}
	
	// public function pengguna() {
	// 	if ( ! $this->session->userdata('is_logged_in')) {
	// 		redirect('login');
	// 	}
		
	// 	//ambil variabel URL
	// 	$mau_ke					= $this->uri->segment(3);
		
	// 	//ambil variabel Postingan
	// 	$idp					= addslashes($this->input->post('idp'));
	// 	$nama					= addslashes($this->input->post('nama'));
	// 	$alamat					= addslashes($this->input->post('alamat'));
	// 	$kepsek					= addslashes($this->input->post('kepsek'));
	// 	$nip_kepsek				= addslashes($this->input->post('nip_kepsek'));
		
	// 	$cari					= addslashes($this->input->post('q'));

	// 	//upload config 
	// 	$config['upload_path'] 		= './upload';
	// 	$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
	// 	$config['max_size']			= '2000';
	// 	$config['max_width']  		= '3000';
	// 	$config['max_height'] 		= '3000';

	// 	$this->load->library('upload', $config);
		
	// 	if ($mau_ke == "act_edt") {
	// 		if ($this->upload->do_upload('logo')) {
	// 			$up_data	 	= $this->upload->data();
				
	// 			$this->db->query("UPDATE tr_instansi SET nama = '$nama', alamat = '$alamat', kepsek = '$kepsek', nip_kepsek = '$nip_kepsek', logo = '".$up_data['file_name']."' WHERE id = '$idp'");

	// 		} else {
	// 			$this->db->query("UPDATE tr_instansi SET nama = '$nama', alamat = '$alamat', kepsek = '$kepsek', nip_kepsek = '$nip_kepsek' WHERE id = '$idp'");
	// 		}		

	// 		$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
	// 		redirect('admin/pengguna');
	// 	} else {
	// 		$a['data']		= $this->db->query("SELECT * FROM tr_instansi WHERE id = '1' LIMIT 1")->row();
	// 		$a['page']		= "f_pengguna";
	// 	}
		
	// 	$this->load->view('admin/aaa', $a);	
	// }
	
	public function agenda_surat_masuk() {
		$a['page']	= "f_config_cetak_agenda";
		$this->load->view('admin/aaa', $a);
	}

	public function agenda_surat_keluar() {
		$a['page']	= "f_config_cetak_agenda";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function cetak_agenda() {
		$jenis_surat	= $this->input->post('tipe');
		$tgl_start		= $this->input->post('tgl_start');
		$tgl_end		= $this->input->post('tgl_end');
		
		$a['tgl_start']	= $tgl_start;
		$a['tgl_end']	= $tgl_end;		

		if ($jenis_surat == "agenda_surat_masuk") {	
			$a['data']	= $this->db->query("SELECT * FROM surat_masuk WHERE tanggal_surat >= '$tgl_start' AND tanggal_surat <= '$tgl_end' ORDER BY tanggal_surat")->result(); 
			$this->load->view('admin/agenda_surat_masuk', $a);
		} else {
			$a['data']	= $this->db->query("SELECT * FROM surat_keluar WHERE tanggal_surat >= '$tgl_start' AND tanggal_surat <= '$tgl_end' ORDER BY tanggal_surat")->result();
			$this->load->view('admin/agenda_surat_keluar', $a);
		}
	}	
	
	// public function manage_admin() {
	// 	if ( ! $this->session->userdata('is_logged_in')) {
	// 		redirect('login');
	// 	}
		
	// 	/* pagination */	
	// 	$total_row		= $this->db->query("SELECT * FROM t_admin")->num_rows();
	// 	$per_page		= 10;
		
	// 	$awal	= $this->uri->segment(4); 
	// 	$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
	// 	//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
	// 	$akhir	= $per_page;
		
	// 	$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/manage_admin/p");
		
	// 	//ambil variabel URL
	// 	$mau_ke					= $this->uri->segment(3);
	// 	$idu					= $this->uri->segment(4);
		
	// 	$cari					= addslashes($this->input->post('q'));

	// 	//ambil variabel Postingan
	// 	$idp					= addslashes($this->input->post('idp'));
	// 	$username				= addslashes($this->input->post('username'));
	// 	$password				= md5(addslashes($this->input->post('password')));
	// 	$nama					= addslashes($this->input->post('nama'));
	// 	$nip					= addslashes($this->input->post('nip'));
	// 	$level					= addslashes($this->input->post('level'));
		
	// 	$cari					= addslashes($this->input->post('q'));

		
	// 	if ($mau_ke == "del") {
	// 		$this->db->query("DELETE FROM t_admin WHERE id = '$idu'");
	// 		$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
	// 		redirect('admin/manage_admin');
	// 	} else if ($mau_ke == "cari") {
	// 		$a['data']		= $this->db->query("SELECT * FROM t_admin WHERE nama LIKE '%$cari%' ORDER BY id DESC")->result();
	// 		$a['page']		= "l_manage_admin";
	// 	} else if ($mau_ke == "add") {
	// 		$a['page']		= "f_manage_admin";
	// 	} else if ($mau_ke == "edt") {
	// 		$a['datpil']	= $this->db->query("SELECT * FROM t_admin WHERE id = '$idu'")->row();	
	// 		$a['page']		= "f_manage_admin";
	// 	} else if ($mau_ke == "act_add") {	
	// 		$this->db->query("INSERT INTO t_admin VALUES (NULL, '$username', '$password', '$nama', '$nip', '$level')");
	// 		$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
	// 		redirect('admin/manage_admin');
	// 	} else if ($mau_ke == "act_edt") {
	// 		if ($password = md5("-")) {
	// 			$this->db->query("UPDATE t_admin SET username = '$username', nama = '$nama', nip = '$nip', level = '$level' WHERE id = '$idp'");
	// 		} else {
	// 			$this->db->query("UPDATE t_admin SET username = '$username', password = '$password', nama = '$nama', nip = '$nip', level = '$level' WHERE id = '$idp'");
	// 		}
			
	// 		$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated </div>");			
	// 		redirect('admin/manage_admin');
	// 	} else {
	// 		$a['data']		= $this->db->query("SELECT * FROM t_admin LIMIT $awal, $akhir ")->result();
	// 		$a['page']		= "l_manage_admin";
	// 	}
		
	// 	$this->load->view('admin/aaa', $a);
	// }

	public function get_klasifikasi() {
		$kode 				= $this->input->post('kode',TRUE);
		
		$data 				=  $this->db->query("SELECT kode, uraian FROM kode_surat WHERE kode LIKE '%$kode%' OR uraian LIKE '%$kode%' ORDER BY kode ASC LIMIT 0,5")->result();
		
		$klasifikasi 		=  array();
        foreach ($data as $d) {
			$json_array				= array();
            $json_array['value']	= $d->kode;
			$json_array['label']	= $d->kode." - ".$d->uraian;
			$klasifikasi[] 			= $json_array;
		}
		
		echo json_encode($klasifikasi);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */