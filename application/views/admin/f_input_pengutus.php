<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Rubah Password</a>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
<?php echo $this->session->flashdata("error");?>
	
<form action="<?php echo base_URL()?>surattugas/form_process/" method="post" accept-charset="utf-8">	

	<table class="table-form" width="100%">
		<tr>
			<td width="20%">Nama pengutus</td>
			<td>
				<input class="form-control" style="width: 200px" type="text" required name="nama_pengutus" />
			</td>
		</tr>
		<tr>
			<td width="20%">NIP pengutus</td>
			<td>
				<input class="form-control" style="width: 200px" type="text" required name="nip_pengutus" />
			</td>
		</tr>
		<tr>
			<td width="20%">Jabatan pengutus</td>
			<td>
				<input class="form-control" style="width: 200px" type="text" required name="jabatan_pengutus" />
			</td>
		</tr>
		<tr>
			<td width="20%">Nomor surat tugas</td>
			<td>
				<input class="form-control" style="width: 200px" type="text" required name="nomor_surat_tugas" />
			</td>
		</tr>
		<tr>
			<td width="20%">Jumlah petugas yang ingin diutus</td>
			<td>
				<input class="form-control" style="width: 200px" type="text" required name="jumlah_petugas" />
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<br>
				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="<?php echo base_URL()?>suratmasuk" class="btn btn-success">Kembali</a>
			</td>
		</tr>
	</table>

</form>

<?php 

/* End of file f_input_pengutus.php */
/* Location: ./application/views/admin/f_input_pengutus.php */