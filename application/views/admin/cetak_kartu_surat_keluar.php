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
			Pemerintah Kabupaten Sleman<br />
			Dinas / Instansi : <?php echo $results->dinas_instansi; ?>
			<h2><b>KARTU SURAT KELUAR<b/></h2>
		</td>
	</tr>
	<tr>
		<td><b>Index</b><br /><?php echo $results->indeks; ?></td>
		<td><b>Kode</b><br /><?php echo $results->kode; ?></td>
		<td><b>Nomor Urut </b><br /><?php echo $results->nomor_urut; ?></td>
	</tr>
	<tr><td style="height: 100px" colspan="3" align="left" valign="top"><b>Isi Ringkas :</b><br /><?php echo $results->isi_ringkas; ?></td></tr>
	<tr><td style="height: 100px" colspan="3" align="left" valign="top"><b>Kepada :</b><br /><?php echo $results->kepada; ?></td></tr>
	<tr>
		<td><b>Pengolah :</b><br /><?php echo $results->pengolah; ?></td>
		<td><b>Tgl. Surat :</b><br /><?php echo tgl_jam_sql($results->tanggal_surat);?></td>
		<td><b>Lampiran</b><br /><?php echo $results->lampiran; ?></td>
	</tr>
	<tr>
		<td colspan="2"><b>Catatan :</b><br /><?php echo $results->catatan; ?></td>
	</tr>
</table>
</body>
</html>