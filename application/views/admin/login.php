<div class="well" style="width: 400px; margin: 20px auto; border: solid 1px #d9d9d9; padding: 30px 20px; border-radius: 8px">
	<form action="<?=base_URL()?>login" method="post">
		<legend>Login</legend>
		<?=$error?>
		<table align="center" style="margin-bottom: 0" class="table-form" width="90%">
			<tr><td width="40%">NIP</td><td><input type="text" name="nip" required style="width: 200px" autofocus class="form-control"></td></tr>
			<tr><td>Password</td><td><input type="password" name="pass" required style="width: 200px" class="form-control"></td></tr>
			<tr><td></td><td><input type="submit" class="btn btn-success" value="Login"></td></tr>
		</table>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(" #alert" ).fadeOut(6000);
	});
</script>

<?php
/* End of file login.php */
/* Location: ./application/views/login.php */