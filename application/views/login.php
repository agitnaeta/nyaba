<?php echo $this->session->flashdata('pesan');?>
<form method="post" action="<?php echo base_url("login/auth");?>">
	<input name="username">
	<input name="password" type="password">
	<button type="submit"> Login</button>
</form>

INI LOGIN