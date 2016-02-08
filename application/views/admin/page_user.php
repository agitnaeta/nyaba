<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>User List</h2>
				</div>
				<div class="form_user">
						<form id="form_user">
						<input name="username" id="username">
						<input name="password" id="password">
						<select name="level" id="level">
							<option value="1">Super Admin</option>
							<option value="2">Bisnis Admin</option>
							<option value="3" selected>User</option>
						</select>
						<a class="submit" href="#" id="add"> Submit</a>
					</form>
				</div>
				<div id="pesan"></div>
				<div id="tableUser" class="panel-body">
					
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#tableUser').load('<?php echo base_url("nadmin/table_user");?>');

		// $('#add').click(function  () {
		// 	$.post('<?php echo base_url("nadmin/addUser");?>',$('#form_user').serialize(),function  (data) {
		// 		if(data==1){
		// 			alert("Username Sudah Digunakan Silahkan Ganti");
		// 		}
		// 		else{
		// 			$('#tableUser').load('<?php echo base_url("nadmin/table_user");?>');
		// 		}
		// 	})
		// })

		// Update
		$('#update').click(function  () {
			$.post('<?php echo base_url("nadmin/updateUser");?>',$('#form_user').serialize(),function  (data) {
				$('#tableUser').html(data)
				// if(data==1){
				// 	alert("Username Sudah Digunakan Silahkan Ganti");
				// }
				// else{
				// 	$('#tableUser').load('<?php echo base_url("nadmin/table_user");?>');
				// }
			})
		})

	})
</script>