<html>
<head>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000; page-break-inside: avoid;}
	td { padding: 7px 5px; font-size: 10px}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color:lightgrey;
	}
	thead {
		display:table-header-group;
	}
	tbody {
		display:table-row-group;
	}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color: #999;
		padding: 8px 0;
	}
	td { padding: 7px 5px;font-size: 10px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<title>Cetak Agenda Surat Keluar</title>
</head>

<body onload="window.print()">
	<center><b style="font-size: 20px">AGENDA SURAT KELUAR</b><br>
	Dari tanggal <b><?php echo tgl_jam_sql($tgl_start)."</b> sampai dengan tanggal <b>".tgl_jam_sql($tgl_end)."</b>"; ?>
	</center><br>
	
	<table>
		<thead>
			<tr>
				<th>Indeks</td>
				<th>Kode</td>
				<th>Nomor Urut</td>
				<th>Isi Ringkas</td>
				<th>Kepada</td>
				<th>Pengolah</td>
				<th>Tanggal Surat</td>
				<th>Lampiran</td>
				<th>Catatan</td>
				<th>Dinas / Instansi</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (!empty($data)) {
				foreach ($data as $d) {
			?>
			<tr>
				<td align="center"><?php echo $d->indeks; ?></td>
				<td align="center"><?php echo $d->kode; ?></td>
				<td align="center"><?php echo $d->nomor_urut; ?></td>
				<td align="center"><?php echo $d->isi_ringkas; ?></td>
				<td align="center"><?php echo $d->kepada; ?></td>
				<td align="center"><?php echo $d->pengolah; ?></td>
				<td align="center"><?php echo $d->tanggal_surat; ?></td>
				<td align="center"><?php echo $d->lampiran; ?></td>
				<td align="center"><?php echo $d->catatan; ?></td>
				<td align="center"><?php echo $d->dinas_instansi; ?></td>
			</tr>
			<?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>

