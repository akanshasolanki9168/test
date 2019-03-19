<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
<script src="http://localhost/management/assets/javascript/jquery-1.11.1.min.js"></script>
<script src="http://localhost/management/assets/javascript//jquery.validate.min.js"></script>
<script src="http://localhost/management/assets/javascript/additional-methods.min.js"></script>
<script type="text/javascript" src="http://localhost/management/assets/javascript/valid.js"></script>
</head>
<body>
<span style="background-color:red;">
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4"><br><br><br><br><br><br>
			<div class="login-panel panel panel-success">
				<div class="panel-heading"><br>
					<center><h3 class="panel-title">Update Information</h3></center>
				</div>
<div class="alert alert-success" style="display: none;" id="succ_msg">
</div>
<div class="panel-body">

<form action="<?php echo base_url("User/registera");?>" method="post" id="frm">
	<fieldset>
		<div class="form-group">
		<input class="form-control" placeholder="Name" name="user_name" type="text" autofocus value="">
		<span class="text-danger"></span>  
		<?php echo form_error('user_name', '<div class="text-danger">', '</div>'); ?>
		</div>  
		<div class="form-group">
		<input class="form-control" placeholder="Age" name="user_age" type="text" value="" >
		<?php echo form_error('user_age', '<div class="text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
		<input class="form-control" placeholder="Mobile No" name="user_mobile" type="text" value=""   >
		<?php echo form_error('user_mobile', '<div class="text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
		<input class="form-control" placeholder="Address Line 1" name="user_adda" type="text" value=""  >
		<?php echo form_error('user_adda', '<div class="text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
		<input class="form-control" placeholder="Address Line 2" name="user_addb" type="text" value=""  >
		<?php echo form_error('user_addb', '<div class="text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
		<select class="form-control" placeholder="Country" id="user_country" name="user_country" type="text" value=""  >
		<option>Select Country</option>
		<?php
			foreach($countries as $row)
			{
				echo '<option value="'.$row->country_id.'"> '.$row->country_name.'</option>';               
			}
		?>
		</select>
		<?php echo form_error('user_country', '<div class="text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
		<select class="form-control" placeholder="State"  id="states" name="user_state" type="text" value=""  >
		<option>Select State</option>
		</select>
		<?php echo form_error('user_state', '<div class="text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
		<select class="form-control" placeholder="City" id="cities" name="user_city" type="text" value=""  >  
		<option>Select City</option>
		</select>
		<?php echo form_error('user_city', '<div class="text-danger">', '</div>'); ?>
		</div>
		<input class="btn btn-lg btn-success btn-block" type="submit" value="submit" name="submit">
	</fieldset>
</form>

              </div>
          </div>
      </div>
  </div>
 </div>
</span>
</body>
</html>
<script type="text/javascript">
$().ready(function() 
{
	base_url = '<?php echo base_url()?>'; 
	$('#user_country').change(function()
	{
		var country_id=$('#user_country').val();
		if(country_id != '')
		{
			$.ajax
			({
				url:base_url+"User/fetch_state",
				method:"POST",
				data:{country_id:country_id},
				success:function(response)
				{ 
					var test = JSON.parse(response);
					if(test.result == "result"){
					$.each(test.data,function(index,data)
					{
						$('#states').append('<option value="'+data.state_id+'">'+data.state_name+'</option>');
						$("#succ_msg").html("success").show();
						setTimeout(function()
					{
						$("#succ_msg").html("").hide();
					}, 5000);
					});
					}
					else
					{
					alert("Oops, script is a no go");
					}
				},
				error:function(xhr)
				{
				console.log(xhr);
				} 
			})
		}
	})
});
</script>

<script type="text/javascript">
$().ready(function() 
{
	$('#states').change(function()
	{
		var state_id=$('#states').val();
		if(state_id != '')
		{
			$.ajax
			({
			url:"<?php echo base_url();?>User/fetch_city",
			method:"POST",
			data:{state_id:state_id},
			success:function(response)
			{ 
				var test = JSON.parse(response);
				if(test.result == "result")
				{
				$.each(test.data,function(index,data)
					{
						$('#cities').append('<option value="'+data.city_id+'">'+data.city_name+'</option>');
						$("#succ_msg").html("success").show();
						setTimeout(function()
						{
							$("#succ_msg").html("").hide();
						}, 5000);
					});
				}  
			}
			})
		}
	})
});


</script>

