<table class="table">
	<thead>
		<th>Username</th>
		<th>Level</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php foreach ($user->result() as $row):?>
		<tr>
			<td><?=$row->username;?></td>	
			<td><?=level($row->level);?></td>
			<td>
					<a class="edit" href="#" data-id="<?=$row->username;?>"> Edit</a>
					<a class="delete" href="#" data-id="<?=$row->username;?>"> Delete</a>
			</td>	
		</tr>
		<?php endforeach ;?>
	</tbody>
</table>
<script type="text/javascript">
		$(document).ready(function  () {
			$('.delete').click(function  () {
				if(confirm("Apakah Anda Yakin?")){					
					var username=$(this).attr('data-id');
					$.get('<?php echo base_url("nadmin/deleteUser/'+username+'");?>',function  (data) {
						$('#pesan').html("Berhasil Delete")
						$('#tableUser').load('<?php echo base_url("nadmin/table_user");?>');
					});
				}
				else{
					return false;
				}
			})
			// Edit
			$('.edit').click(function  () {
				var username=$(this).attr('data-id');
				$.get('<?php echo base_url("nadmin/getUser/'+username+'");?>',function  (data) {
					var obj=JSON.parse(data)
					$('#username').val(obj[0].username)
					$('#password').val(obj[0].password)
					$('#level').val(obj[0].level)
				})
				// attr idchange
				$('.submit').attr("id","update");
				
			})
		})
</script>
