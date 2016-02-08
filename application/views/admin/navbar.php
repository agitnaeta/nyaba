<ul class="nav">
	<li>
		<a href=""  class="link" data-id='<?php echo base_url("nadmin/page_user");?>'>User</a>
	</li>
</ul>
<div id="konten">
	id
</div>
<script type="text/javascript">
	$(document).ready(function  () {
		$('#konten').load('<?php echo base_url("nadmin/page_user");?>')
	})
</script>