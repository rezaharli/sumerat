<div class="clearfix">
	<div class="row">
		<div class="col-lg-12">
			<div class="navbar navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Surat Keluar</a>
					</div>
					<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_URL(); ?>suratkeluar/add" class="btn-info"><i class="icon-plus-sign icon-white"> </i> Tambah Data</a></li>
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
				<th>Isi Ringkas</th>
				<th>Kepada</th>
				<th>Pengolah</th>
				<th>Tanggal Surat</th>
				<th>Lampiran</th>
				<th>Catatan</th>
				<th>Dinas / Instansi</th>
				<th width="5%">Aksi</th>
			</tr>
		</thead>
		
		<tbody id="finalResult"></tbody>

	</table>
</div>
<script>
	$(document).ready(function(){
		doSearch();
	  	$("#search").keyup(function(){
			doSearch($("#search").val());
	  	});
	});

	function doSearch(searchKey){
		$.ajax({
			type: "post",
			url: "<?php echo base_URL()?>suratkeluar/cari",
			data: { search : searchKey },
			success: 
			function(response){
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
									"<td>" + val.isi_ringkas + 
									"<br><b>File : </b><i><a href=\"<?php echo base_URL()?>upload/surat_keluar/" + val.file + "\" target=\"_blank\">" + val.file + "</a>" + 
									"</td>" +
									"<td>" + val.kepada + "</td>" +
									"<td>" + val.pengolah + "</td>" +
									"<td>" + val.tanggal_surat + "</td>" +
									"<td>" + val.lampiran + "</td>" +
									"<td>" + val.catatan + "</td>" +
									"<td>" + val.dinas_instansi + "</td>" +
									"<td class=\"ctr\">" +
										"<div class=\"btn-group\">" +
											"<a href=\"<?php echo base_URL()?>suratkeluar/edit/" + val.id + "\" class=\"btn btn-success btn-sm\" title=\"Edit Data\"><i class=\"icon-edit icon-white\"> </i> Edit</a>" +
											"<a href=\"<?php echo base_URL()?>suratkeluar/delete/" + val.id + "\" class=\"btn btn-warning btn-sm\" title=\"Hapus Data\" onclick=\"return confirm('Anda Yakin..?')\"><i class=\"icon-trash icon-remove\">  </i> Delete</a>" +
											"<a href=\"<?php echo base_URL()?>suratkeluar/cetak/" + val.id + "\" class=\"btn btn-info btn-sm\" target=\"_blank\" title=\"Cetak Disposisi\"><i class=\"icon-print icon-white\"> </i> Cetak</a>" +
										"</div>" +	
									"</td>"
						    		));
						});	
						$('#finalResult').append.apply($('#finalResult'), items);
					}catch(e) {		
						alert('Exception while request..');
					}		
				} else {
					$('#finalResult').html($('<tr/>').html(
						"<td colspan='12' align='center'>Data tidak ditemukan</td>"
						)
					);		
				}		
				
			},
			error: 
			function(){						
				alert('Error while request..');
			}
		});
	}
</script>

<?php
/* End of file surat_keluar.php */
/* Location: ./application/views/admin/surat_keluar.php */