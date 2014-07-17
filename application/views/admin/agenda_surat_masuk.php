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
<title>Cetak Agenda Surat Masuk</title>
</head>

<body onload="window.print()">
	<center><b style="font-size: 20px">AGENDA SURAT MASUK</b><br>
	Dari tanggal <b><?php echo tgl_jam_sql($tgl_start)."</b> sampai dengan tanggal <b>".tgl_jam_sql($tgl_end)."</b>"; ?>
	</center><br>
	
	<table>
		<thead>
			<tr>
				<th>Indeks</th>
				<th>Kode</th>
				<th>Nomor Urut</th>
				<th>Tanggal Penyelesaian</th>
				<th>Isi Ringkas</th>
				<th>Asal Surat</th>
				<th>Tanggal Surat</th>
				<th>Nomor Surat</th>
				<th>Lampiran</th>
				<th>Diajukan/Diteruskan Kepada</th>
				<th>Informasi/Instruksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (!empty($data)) {
				$no = 0;
				foreach ($data as $result) {
					$no++;
			?>
			<tr>
				<td><?php echo $result->indeks; ?></td>
				<td><?php echo $result->kode; ?></td>
				<td><?php echo $result->nomor_urut; ?></td>
				<td><?php echo $result->tanggal_penyelesaian; ?></td>
				<td><?php echo $result->isi_ringkas; ?></td>
				<td><?php echo $result->asal; ?></td>
				<td><?php echo $result->tanggal_surat; ?></td>
				<td><?php echo $result->nomor_surat; ?></td>
				<td><?php echo $result->lampiran; ?></td>
				<td>
					<?php if( ! empty($result->diajukan_kepada_s)){ ?>
						<?php echo "<ul>"; ?>
						<?php foreach ($result->diajukan_kepada_s as $diajukan_kepada) { ?>
							<?php echo "<li>".$diajukan_kepada->tujuan."</li>"; ?>
						<?php } ?>
						<?php echo "</ul>"; ?>
					<?php } ?>
				</td>
				<td><?php echo $result->instruksi; ?></td>
			</tr>
			<?php 
				}
			} else {
				echo "<tr><td style='text-align: center'>Tidak ada data</td></tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>

