<div class="clearfix">
	<div class="row">
		<div class="col-lg-12">
			<div class="navbar navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Surat Masuk</a>
					</div>
					<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_URL(); ?>suratmasuk/add" class="btn-info"><i class="icon-plus-sign icon-white"> </i> Tambah Data</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<form class="navbar-form navbar-left" method="post" action="#">
								<input type="text" class="form-control" name="cari" id="search" style="width: 200px" placeholder="Kata kunci pencarian ..." />
							</form>
						</ul>
					</div><!-- /.nav-collapse -->
				</div><!-- /.container -->
			</div><!-- /.navbar -->
		</div>
	</div>

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Indeks</th>
				<th>Kode</th>
				<th>Nomor Urut</th>
				<th>Tanggal Penyelesaian</th>
				<th>Isi Ringkas, File</th>
				<th>Asal Surat</th>
				<th>Tanggal Surat</th>
				<th>Nomor Surat</th>
				<th>Lampiran</th>
				<th width="7%">Diajukan Kepada</th>
				<th>Instruksi</th>
				<th width="5%">Aksi</th>
			</tr>
		</thead>
		
		<tbody id="finalResult">
			<?php 
			if (empty($results)) {
				echo "<tr><td colspan='12'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
			} else {
				foreach ($results as $result) {
					?>
					<tr>
						<td><?php echo $result->indeks;?></td>
						<td><?php echo $result->kode;?></td>
						<td><?php echo $result->nomor_urut;?></td>
						<td><?php echo $result->tanggal_penyelesaian;?></td>
						<td>
							<?php 
							echo $result->isi_ringkas;
							if($result->file != ""){
								echo "<br><b>File : </b><i><a href='".base_URL()."upload/surat_masuk/".$result->file."' target='_blank'>".$result->file."</a>";
							} 
							?>
						</td>
						<td><?php echo $result->asal ?></td>
						<td><?php echo $result->tanggal_surat ?></td>
						<td><?php echo $result->nomor_surat ?></td>
						<td><?php echo $result->lampiran;?></td>
						<td><?php echo $result->diajukan_kepada;?></td>
						<td><?php echo $result->instruksi;?></td>
						<td class="ctr">
							<div class="btn-group">
								<a href="<?php echo base_URL()?>suratmasuk/edit/<?php echo $result->id?>" class="btn btn-success btn-sm" title="Edit Data">
									<i class="icon-edit icon-white"> </i> Edit
								</a><br />
								<a href="<?php echo base_URL()?>suratmasuk/delete/<?php echo $result->id?>" class="btn btn-warning btn-sm" title="Hapus Data" onclick="return confirm('Anda Yakin..?')">
									<i class="icon-trash icon-remove">  </i> Delete
								</a><br />		
								<a href="<?php echo base_URL()?>suratmasuk/cetak/<?php echo $result->id?>" class="btn btn-info btn-sm" target="_blank" title="Cetak Disposisi">
									<i class="icon-print icon-white"> </i> Cetak
								</a><br />		
								<a href="<?php echo base_URL()?>surattugas/index/<?php echo $result->id?>" class="btn btn-success btn-sm" title="Cetak Surat Tugas">
									<i class="icon-print icon-white"> </i> Cetak Surat Tugas
								</a>
							</div>	
						</td>
					</tr>
					<?php 
				}
			}
			?>
		</tbody>
	</table>
	<!-- <center><ul class="pagination"><?php //echo $pagination; ?></ul></center> -->
</div>
<script>
	$(document).ready(function(){
	  $("#search").keyup(function(){
			if($("#search").val().length >= 0){
				$.ajax({
					type: "post",
					url: "<?php echo base_URL()?>suratmasuk/cari",
					data: { search : $("#search").val() },
					success: function(response){
						$('#finalResult').html("");
						var obj = JSON.parse(response);
						if(obj.length > 0){
							try{
								var items=[]; 	
								$.each(obj, function(i,val){								
								    items.push(
								    	$('<tr/>').html(
								    		"<td>" + val.indeks + "</td>" +
											"<td>" + val.kode + "</td>" +
											"<td>" + val.nomor_urut + "</td>" +
											"<td>" + val.tanggal_penyelesaian + "</td>" +
											"<td>" + 
											val.isi_ringkas + 
											"<?php if(" + val.file + " != ""){ ?>" +
												"<br><b>File : </b><i><a href=\"<?php echo base_URL()?>upload/surat_masuk/" + val.file + "\" target=\"_blank\">" + val.file + "</a>" + 
											"<?php } ?>" +
											"</td>" +
											"<td>" + val.asal + "</td>" +
											"<td>" + val.tanggal_surat + "</td>" +
											"<td>" + val.nomor_surat + "</td>" +
											"<td>" + val.lampiran + "</td>" +
											"<td>" + val.diajukan_kepada + "</td>" +
											"<td>" + val.instruksi + "</td>" +
											"<td class=\"ctr\">" +
												"<div class=\"btn-group\">" +
													"<a href=\"<?php echo base_URL()?>suratmasuk/edit/" + val.id + "\" class=\"btn btn-success btn-sm\" title=\"Edit Data\"><i class=\"icon-edit icon-white\"> </i> Edit</a><br />" +
													"<a href=\"<?php echo base_URL()?>suratmasuk/delete/" + val.id + "\" class=\"btn btn-warning btn-sm\" title=\"Hapus Data\" onclick=\"return confirm('Anda Yakin..?')\"><i class=\"icon-trash icon-remove\">  </i> Delete</a><br />" +
													"<a href=\"<?php echo base_URL()?>suratmasuk/cetak/" + val.id + "\" class=\"btn btn-info btn-sm\" target=\"_blank\" title=\"Cetak Disposisi\"><i class=\"icon-print icon-white\"> </i> Cetak</a>" +
												"</div>" +	
											"</td>"
								    		));
								});	
								$('#finalResult').append.apply($('#finalResult'), items);
							}catch(e) {		
								alert('Exception while request..');
							}		
						}else{
							$('#finalResult').html($('<tr/>').html(
								"<td colspan='12' align='center'>Data yang dicari tidak ditemukan</td>"
								)
							);		
						}		
						
					},
					error: function(){						
						alert('Error while request..');
					}
				});
			}
			return false;
	  	});
	});
</script>

<?php
/* End of file surat_masuk.php */
/* Location: ./application/views/admin/surat_masuk.php */