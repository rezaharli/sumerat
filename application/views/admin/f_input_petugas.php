<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Masukkan petugas yang ingin diutus</a>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
<?php echo $this->session->flashdata("error");?>
	
<form action="<?=base_URL()?>surattugas/cetak/" method="post" accept-charset="utf-8">	

	<table class="table-form" align="center" width="100%" border="5">
		<tr>
			<?php for ($i = 1; $i <= $jumlah_petugas; $i++):?>
				<td width="33%" align="center">
					<table class="table-form">
						<tr>
							<td width="30%">Nama Utusan</td>
							<td>
								<input class="form-control" style="width: 200px" type="text" name="petugas[<?php echo $i-1 ?>][nama]" />
							</td>
						</tr>
						<tr>
							<td width="30%">NIP Utusan</td>
							<td>
								<input class="form-control" style="width: 200px" type="text" name="petugas[<?php echo $i-1 ?>][nip]" />
							</td>
						</tr>
						<tr>
							<td width="30%">Jabatan Utusan</td>
							<td>
								<input class="form-control" style="width: 200px" type="text" name="petugas[<?php echo $i-1 ?>][jabatan]" />
							</td>
						</tr>
					</table>
				</td>
				<?php if($i % 3 == 0): ?>
					<?php echo '</tr><tr>'; ?>
				<?php endif ?>
			<?php endfor;?>
			<td width="33%" align="center">
				<button type="submit" class="btn btn-primary">Cetak</button>
				<a href="<?=base_URL()?>suratmasuk" class="btn btn-success">Kembali</a>
			</td>
		</tr>

	</table>

</form>

<?php 

/* End of file f_input_petugas.php */
/* Location: ./application/views/admin/f_input_petugas.php */