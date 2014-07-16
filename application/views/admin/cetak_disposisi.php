<?php 
$q_instansi	= $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
?>

<html>
<head>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	td { padding: 7px 5px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 60%}
	tr { border: solid 1px #000}
	td { padding: 7px 5px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
</head>

<body onload="window.print()">
<table border="1" align="center">
	<tr>
		<td colspan="4" align="center">
		<h2><?php echo $q_instansi->nama; ?></h2>
		Alamat : <?php echo $q_instansi->alamat; ?>	
		</td>
	</tr>
	<tr>
		<td colspan="4" align="center" style="padding: 15px 0">
			<b style="font-size: 21px;">LEMBAR DISPOSISI</b>
		</td>
	</tr>
	<tr>
		<td width="25%"><b>Indeks Berkas</b><br /><?php echo $results->indeks; ?></td>
		<td width="25%"><b>Kode</b><br /><?php echo $results->kode; ?></td>
		<td width="25%"><b>Nomor Urut </b><br /><?php echo $results->nomor_urut; ?></td>
		<td width="25%"><b>Tanggal Penyelesaian </b><br /><?php echo $results->tanggal_penyelesaian; ?></td>
	</tr>
	<tr><td style="height: 350px" colspan="4" align="left" valign="top"><b>Isi Ringkas</b><br /><?php echo $results->isi_ringkas; ?></td></tr>
	<tr>
		<td width="25%"><b>Asal Surat</b><br /><?php echo $results->asal; ?></td>
		<td width="25%"><b>Tanggal</b><br /><?php echo tgl_jam_sql($results->tanggal_surat);?></td>
		<td width="25%"><b>Nomor</b><br /><?php echo $results->nomor_surat; ?></td>
		<td width="25%"><b>Lampiran</b><br /><?php echo $results->lampiran; ?></td>
	</tr>
	<tr>
		<td width="25%" colspan="2"><b>Diajukan/Diteruskan Kepada</b><br />
			<ul>
				<?php 
				foreach ($results->diajukan_kepada_s as $diajukan_kepada) {
					echo "<li>".$diajukan_kepada->tujuan."</li>";
				}
				?>
			</ul>
		</td>
		<td width="25%" colspan="2"><b>Informasi/Instruksi</b><br /><?php echo $results->instruksi; ?></td>
	</tr>
</table>
</body>
</html>