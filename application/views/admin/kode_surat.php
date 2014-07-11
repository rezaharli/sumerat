<div class="clearfix">
	<div class="row">
		<div class="col-lg-12">
			<div class="navbar navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Klasifikasi Surat-Menyurat Dinas Perhubungan Komunikasi dan Informatika </a>
					</div>
					<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
						<ul class="nav navbar-nav navbar-right">
							<form class="navbar-form navbar-left" method="post" action="<?php echo base_URL()?>kodesurat/cari">
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
				<th width="10%">Kode</th>
				<th width="60%">Bobot</th>
			</tr>
		</thead>
		
		<tbody id="finalResult">
			<?php 
			if (empty($results)) {
				echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
			} else {
				foreach ($results as $result) {
					?>
					<tr>
						<td><?php echo $result->kode;?></td>
						<td><?php echo $result->uraian?></td>
					</tr>
					<?php 
				}
			}
			?>
		</tbody>
	</table>
</div>
<script>
	$(document).ready(function(){
	  $("#search").keyup(function(){
			if($("#search").val().length >= 0){
				$.ajax({
					type: "post",
					url: "<?php echo base_URL()?>kodesurat/cari",
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
								    		"<td>" + val.kode + "</td>" +
								    		"<td>" + val.uraian + "</td>"
								    		));
								});	
								$('#finalResult').append.apply($('#finalResult'), items);
							}catch(e) {		
								alert('Exception while request..');
							}		
						}else{
							$('#finalResult').html($('<tr/>').html(
								"<td colspan='2' align='center'>Data yang dicari tidak ditemukan</td>"
								));		
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