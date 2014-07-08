<?php
$mode		= $this->uri->segment(4);

if ($mode == "edt" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $datpil->id;
	$id_surat	= $datpil->id_surat;
	$kpd_yth	= $datpil->kpd_yth;
	$isi_disposisi	= $datpil->isi_disposisi;
	$sifat		= $datpil->sifat;
	$batas_waktu= $datpil->batas_waktu;
	$catatan	= $datpil->catatan;
	
} else {
	$act		= "act_add";
	$idp		= "";
	$id_surat	= $this->uri->segment(3);
	$kpd_yth	= "";
	$isi_disposisi	= "";
	$sifat		= "";
	$batas_waktu= "";
	$catatan	= "";
}
?>
<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Disposisi Surat</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	
	<form action="<?=base_URL()?>admin/surat_disposisi/<?php echo $this->uri->segment(3)?>/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	<input type="hidden" name="id_surat" value="<?php echo $id_surat; ?>">
	
	<b>Perihal Surat</b> : <i><?php echo $judul_surat; ?></i><br><br>

	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">
		<table width="100%" class="table-form">
		<tr><td width="20%">Tujuan Disposisi</td><td><b><input type="text" name="kpd_yth" required value="<?php echo $kpd_yth; ?>" style="width: 400px" class="form-control"></b></td></tr>
		<tr><td width="20%">Isi Disposisi</td><td><b><textarea name="isi_disposisi" required style="width: 400px; height: 60px" class="form-control"><?php echo $isi_disposisi; ?></textarea></b></td></tr>	
		<tr><td colspan="2">
		<br><button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?=base_URL()?>admin/surat_disposisi/<?php echo $this->uri->segment(3); ?>" class="btn btn-success">Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">
			<tr><td width="20%">Sifat</td><td><b>
			<select name="sifat" class="form-control" style="width: 200px" required><option value=""> - Sifat - </option>
			<?php
				$l_sifat	= array('Biasa','Segera','Perlu Perhatian Khusus','Perhatian Batas Waktu');
				
				for ($i = 0; $i < sizeof($l_sifat); $i++) {
					if ($l_sifat[$i] == $sifat) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}				
				}			
			?>			
			</select>
			</b></td></tr>
			<tr><td width="20%">Batas Waktu</td><td><b><input type="text" name="batas_waktu" required value="<?php echo $batas_waktu; ?>"  id="tgl_surat" style="width: 100px" class="form-control"></b></td></tr>	
			<tr><td width="20%">Catatan</td><td><b><input type="text" name="catatan" required value="<?php echo $catatan; ?>" style="width: 400px" class="form-control"></b></td></tr>				
		</table>
	</div>
	
	</div>
	
	</form>