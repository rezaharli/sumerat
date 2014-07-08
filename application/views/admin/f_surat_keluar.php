<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Surat Keluar</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
<?php
$hidden_input = array('idp' => $this->uri->segment(3));
$form_action = base_URL().'suratkeluar/form_process/'.$this->uri->segment(2);
echo form_open_multipart($form_action, '', $hidden_input);
?>
<div class="row-fluid well" style="overflow: hidden">
	<div class="col-lg-6">
		<table  class="table-form">
			<tr><td width="20%">Indeks</td>
				<td><b><input type="text" style="width: 400px" class="form-control" name="indeks"		required value="<?php if(isset($results)) echo $results->indeks; ?>" 						/></b></td></tr>
			<tr><td width="20%">Kode</td>
				<td><b><input type="text" style="width: 400px" class="form-control" name="kode" 		required value="<?php if(isset($results)) echo $results->kode; ?>" 			id="kode_input" /></b></td></tr>
			<tr><td width="20%">Nomor Urut</td>
				<td><b><input type="text" style="width: 400px" class="form-control" name="nomor_urut" 	required value="<?php if(isset($results)) echo $results->nomor_urut; ?>" 					/></b></td></tr>
			<tr><td width="20%">Isi Ringkas</td>
				<td><b><textarea name="isi_ringkas" required style="width: 400px; height: 200px" class="form-control"><?php if(isset($results)) echo $results->isi_ringkas; ?></textarea></b></td></tr>	
		</table>
	</div>

	<div class="col-lg-6">	
		<table  class="table-form">
			<tr><td width="20%">Kepada</td>
				<td><b><input type="text" style="width: 400px" class="form-control" name="kepada" 			required 	value="<?php if(isset($results)) echo $results->kepada; ?>" 								/></b></td></tr>		
			<tr><td width="20%">Pengolah</td>
				<td><b><input type="text" style="width: 400px" class="form-control" name="pengolah" 		required 	value="<?php if(isset($results)) echo $results->pengolah; ?>" 								/></b></td></tr>	
			<tr><td width="20%">Tanggal Surat</td>
				<td><b><input type="text" style="width: 400px" class="form-control" name="tanggal_surat" 	required 	value="<?php if(isset($results)) echo $results->tanggal_surat; ?>" 		id="tanggal_surat" 	/></b></td></tr>	
			<tr><td width="20%">Lampiran</td>
				<td><b><input type="text" style="width: 400px" class="form-control" name="lampiran" 					value="<?php if(isset($results)) echo $results->lampiran; ?>" 								/></b></td></tr>	
			<tr><td width="20%">Catatan</td>
				<td><b><input type="text" style="width: 400px" class="form-control" name="catatan" 						value="<?php if(isset($results)) echo $results->catatan; ?>" 								/></b></td></tr>	
			<tr><td width="20%">Dinas / Instansi</td>
				<td><b><input type="text" style="width: 400px" class="form-control" name="dinas_instansi" 				value="<?php if(isset($results)) echo $results->dinas_instansi; ?>" 						/></b></td></tr>	
			<tr><td width="20%">File Surat (Scan)</td>
				<td><b><input type="file" style="width: 400px" class="form-control" name="file_surat" 																													/></b></td></tr>
			<tr>
				<td colspan="2">
				<br><button type="submit" class="btn btn-primary">Simpan</button>
				<a href="<?=base_URL()?>suratkeluar" class="btn btn-success">Kembali</a>
				</td>
			</tr>
		</table>	
	</div>
</div>
<?php 
echo form_close();

/* End of file f_surat_keluar.php */
/* Location: ./application/views/admin/f_surat_keluar.php */