<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'header.php';
?>
<style type="text/css">
	h3 {text-align: center;margin-top: 3rem;}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h3>User Management</h3>
		</div>
		<div class="col-md-4"></div>
	</div>

<div class="container" style="background: #84a8e3;width: 85%;padding: 2rem;">
	<?= form_open_multipart('', ['id' => 'add_form']); ?> 
	<div class="row">
		<div class="col-md-2">
			<label>First Name<span class="text-danger">*</span>:</label>
		</div>
		<div class="col-md-2">
			<?= form_input(['name'=>'first_name','id'=>'first_name','class'=>'form-control','placeholder'=>'First Name','required'=>'true','value'=>set_value('first_name')]); ?>
		</div>
		<div class="col-md-2">
			<label>Last Name<span class="text-danger">*</span>:</label>
		</div>
		<div class="col-md-2">
			<?= form_input(['name'=>'last_name','id'=>'last_name','class'=>'form-control','placeholder'=>'Last Name','required'=>'true','value'=>set_value('last_name')]); ?>
		</div>
		<div class="col-md-2">
			<label>Email<span class="text-danger">*</span>:</label>
		</div>
		<div class="col-md-2">
			<?= form_input(['name'=>'email','id'=>'email','class'=>'form-control','placeholder'=>'Email','required'=>'true','value'=>set_value('email')]); ?>
		</div>
  	</div>
  	<div class="row">
  		<div class="col-md-2">
				<label>PASSWORD<span class="text-danger">*</span>:</label>
			</div>
			<div class="col-md-2">
				<?= form_password(['name'=>'password','class'=>'form-control','placeholder'=>'password','required'=>'true']); ?>
			</div>
			<div class="col-md-2">
				<label>Image:</label>
			</div>
			<div class="col-md-2">
				<?= form_upload(['name'=>'image_file' , 'id'=>'image_file' ,'class'=>'form-control']); ?>
			</div>	
			<div class="col-md-4"></div>
		</div>
		<br>
  	<div class="row">
  		<p align="center">
			<?= form_submit(['name'=>'submit','value'=>'Add','class'=>'btn btn-primary','style'=>'width: 250px']); ?>
			</p>
  	</div>
	<?= form_close();?>
</div>
<br>
<div class="container" style="background: #64969c;width: 85%;margin-bottom: 4rem;padding: 2rem;">
	<div class="row" id="user_table_div" style="overflow-x: auto;overflow-y: auto;height: 25.5rem;">
    <table class="table user_table" id="user_table">
      <thead class="thead-dark" style="font-size: 18px;">
        <tr>
        	<th><?= form_input(['name'=>'search','id'=>'search','class'=>'form-control','placeholder'=>'Search...','style'=>'width:250px']); ?></th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>
          	<a class="pull-right btn btn-success btn-large" style="margin-right:40px" href="<?php echo site_url(); ?>/employee/createexcel"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
          </th>
        </tr>
      </thead>
      <tbody id="user_table_body" style="font-size: 15px;">

      </tbody>
    </table>
  	</div>
</div>
<div class="container">
	<p align="center"><a href="<?= base_url('login/logout'); ?>" class="btn btn-danger" style="width: 250px;">Logout</a></p>
</div>

<div class="modal" id="update_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<div style="padding:2rem;">
        <?= form_open('', ['id' => 'update_form']); ?> 
        <div class="row">
					<?= form_input(['name'=>'update_id','id'=>'update_id','class'=>'form-control','placeholder'=>'First Name','style'=>'display:none','value'=>set_value('update_id')]); ?>
				</div>
				<div class="row">
					<label>First Name<span class="text-danger">*</span>:</label>
					
					<?= form_input(['name'=>'first_name_update','id'=>'first_name_update','class'=>'form-control','placeholder'=>'First Name','required'=>'true','value'=>set_value('first_name_update')]); ?>
				</div>
				<div class="row">	
					<label>Last Name<span class="text-danger">*</span>:</label>
					<?= form_input(['name'=>'last_name_update','id'=>'last_name_update','class'=>'form-control','placeholder'=>'Last Name','required'=>'true','value'=>set_value('last_name_update')]); ?>
				</div>
				<div class="row">
					<label>Email<span class="text-danger">*</span>:</label>					
					<?= form_input(['name'=>'email_update','id'=>'email_update','class'=>'form-control','placeholder'=>'Email','required'=>'true','value'=>set_value('email_update')]); ?>
				</div>	
				<div class="row">
						<label>PASSWORD<span class="text-danger">*</span>:</label>
					
					<?= form_password(['name'=>'password_update','id'=>'password_update','class'=>'form-control','placeholder'=>'password','required'=>'true']); ?>
			  </div>
			  <br>
			  <div class="row">
			  	<p align="center">
						<?= form_submit(['name'=>'submit','value'=>'Update','class'=>'btn btn-primary','style'=>'width: 200px']); ?>
					</p>
			  </div>
				<?= form_close();?>
			</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
<?php  require 'footer.php';?>

<script type="text/javascript">
$("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#user_table_body tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });	
$(document).on('submit','#update_form' , function(e){
      e.preventDefault();
    let BASE_URL = "<?php echo base_url();?>";
    let data=$('#update_form').serialize();
    $.ajax({
          url:BASE_URL+'main_controller/update_user',
          method:'post',
          cache:false,
          data:data,
          success:function(data){
          	if(data == true){
          		alert('User Updated Successfully');
          		$('#update_form').trigger('reset');
          		$('#update_modal').modal('toggle');
          		get_user();
          }else{
          	alert(data);
          }
        }
    });  
});	
$(document).ready(function(){

	$("table.user_table").on("click", ".edit_btn", function (event) {
  	let id=$(this).attr('id');
  	let fn = $(this).closest('tr').find('.fn').text();
  	let ln = $(this).closest('tr').find('.ln').text();
  	let e = $(this).closest('tr').find('.e').text();
  	$('#first_name_update').val(fn);
  	$('#last_name_update').val(ln);
  	$('#email_update').val(e);
  	$('#update_modal').modal('toggle');
  	$('#update_id').val(id);
	});
	$("table.user_table").on("click", ".delete_btn", function (event) {
  	let id=$(this).attr('id');
  	let BASE_URL = "<?php echo base_url();?>";
  	$.ajax({
          url:BASE_URL+'main_controller/delete_user',
          method:'post',
          cache:false,
          data:{id:id},
          success:function(data){
          	if(data == true){
          		alert('User Deleted Successfully');
          		get_user();
          }else{
          	alert(data);
          }
        }
    });
	});

	get_user();
});
function get_user(){
	let BASE_URL = "<?php echo base_url();?>";
  $.ajax({
          url:BASE_URL+'main_controller/get_user',
          method:'post',
          cache:false,
          success:function(data){
          	$('#user_table_body').html(data);
        }
  });
}
$(document).on('submit','#add_form' , function(e){
      e.preventDefault();
    let BASE_URL = "<?php echo base_url();?>";
    // let data=$('#add_form').serialize();
    $.ajax({
          url:BASE_URL+'main_controller/add_user',
          method:'post',
          data:new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
          success:function(data){
          	if(data == true){
          		alert('User Added Successfully');
          		$('#add_form').trigger('reset');
          		get_user();
          }else{
          	alert(data);
          }
        }
    });  
});	
</script>
