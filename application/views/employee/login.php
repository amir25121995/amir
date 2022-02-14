<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'header.php';
?>
<div class="container" style="background: skyblue;width: 75%;height: 10rem;margin-top: 10rem;padding: 4rem;">
	<?= form_open('login/validate'); ?>
	<div class="row">
		<div class="col-md-2">
			<label>ID<span class="text-danger">*</span>:</label>
		</div>
		<div class="col-md-3">
			<?= form_input(['name'=>'id','class'=>'form-control','placeholder'=>'id','required'=>'true','value'=>set_value('id')]); ?>
		</div>
		<div class="col-md-2">
			<label>PASSWORD<span class="text-danger">*</span>:</label>
		</div>
		<div class="col-md-3">
			<?= form_password(['name'=>'password','class'=>'form-control','placeholder'=>'password','required'=>'true']); ?>
		</div>
		<div class="col-md-2">
			<?= form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-info']); ?>
		</div>
  	</div>
	<?= form_close();?>
</div>

<?php  require 'footer.php';?>