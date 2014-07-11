<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Rubah Password</a>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
<?php echo $this->session->flashdata("error");?>
	
<form action="<?php echo base_URL()?>ubahpassword/form_process" method="post" accept-charset="utf-8" enctype="multipart/form-data">	

	<table class="table-form" width="100%">
	<tr><td width="20%">NIP</td>
		<td><b><input class="form-control" style="width: 200px" type="text" readonly name="nip" value="<?php echo $this->session->userdata('nip')?>" /></b></td></tr>		
	<tr><td>Password lama</td>
		<td><b><input class="form-control" style="width: 200px" type="password" required name="oldpass" /></td></tr>		
	<tr><td>Password baru</td>
		<td><b><input class="form-control" style="width: 200px" type="password" required name="newpass1" /></td></tr>		
	<tr><td>Ulangi Password baru</td>
		<td><b><input class="form-control" style="width: 200px" type="password" required name="newpass2" /></td></tr>		
	
	<tr><td colspan="2">
	<br>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<a href="<?php echo base_URL()?>" class="btn btn-success">Kembali</a>
	</td></tr>
	</table>
	</fieldset>
</form>

<?php 

/* End of file f_password.php */
/* Location: ./application/views/admin/f_password.php */