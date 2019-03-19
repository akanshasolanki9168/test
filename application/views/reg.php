<?php   
 $name_error = '';  
 
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["user_name"]))  
      {  
           $name_error = "<p>Please Enter Name</p>";  
      }  
      else  
      {  
           if(!preg_match("/^[a-zA-Z ]*$/", $_POST["user_name"]))  
           {  
                $name_error = "<p>Only Letters and whitespace allowed</p>";  
           }  
      }  
      
 }  
?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
           <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
           <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
           <script>
  $.validator.setDefaults({
    submitHandler: function() {
      alert("submitted!");
    }
  });

  $().ready(function() {
    $("#rgtrform").validate({
      rules:
       {
        
           user_name: 
           {
            required: true
           },
        
           user_email:
           {

            required: true,
            user_email:true
           },

           user_password: 
           {
            required: true
           },

           user_age:
           {
           required:true
           },

          user_mobile:
           {
          required: true,
          minlength: 10
           },

          user_adda:
           {
           required: true
           },

          user_addb:
           {
           required: true
           },

          cnt:
          {
          required: true
          },

          ste:
          {
          required: true
           },

          cty:
          {
          required: true
          },
        
        },
        
        messages:
       {
        
          user_name: 
            {
              required: "Please enter a username",
            },

           user_email:
           {
             required: "Please enter a email",
           },

           user_password:
           {
             required: "Please enter a password",
           },

           user_age:
          {
         
            required: "Please enter a age",
          },
           user_mobile:
          {
           required: "Please enter a mobile",
          },
          user_adda:
         {
          required: "Please enter a address1",
         },
         user_addb:
         {
          required: "Please enter a address2",
         },
        cnt:
        {
          required: "Please enter a country",
        },
        ste:
        {
          required: "Please enter a state",
        },
        cty:
        {
          required: "Please enter a city",
        }
      }
    });
  });
    </script>  

      </head> 
      <body>  
      <span style="background-color:red;">
  <div class="container">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
              <div class="login-panel panel panel-success">
                  <div class="panel-heading"><br>
                      <h3 class="panel-title">Registration</h3>
                  </div>
                  <div class="panel-body">
              <form role="form" id="rgtrform" method="post" action="<?php echo base_url('User/registera'); ?>">
              <fieldset>
                  <div class="form-group">
                         <input class="form-control" placeholder="Name" name="user_name" type="text" autofocus value="">
                         <span class="text-danger"><?php echo $name_error; ?></span>  
                  </div>  
                  <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="user_email" type="text" autofocus  >
                  </div>
                  <div class="form-group">
                         <input class="form-control" placeholder="Password" name="user_password" type="password" value=""  >
                  </div>
                  <div class="form-group">
                        <input class="form-control" placeholder="Age" name="user_age" type="text" value="" >
                  </div>
                  <div class="form-group">
                       <input class="form-control" placeholder="Mobile No" name="user_mobile" type="text" value=""   >
                  </div>
                  <div class="form-group">
                        <input class="form-control" placeholder="Address LIne 1" name="user_adda" type="text" value=""  >
                  </div>
                  <div class="form-group">
                        <input class="form-control" placeholder="Address Line 2" name="user_addb" type="text" value=""  >
                  </div>
                  <div class="form-group">
                        <input class="form-control" placeholder="Country" name="cnt" type="text" value=""  >
                   </div>   
                   <div class="form-group">  
                        <input class="form-control" placeholder="State" name="ste" type="text" value=""  >
                   </div>
                   <div class="form-group">     
                        <input class="form-control" placeholder="City" name="cty" type="text" value=""  >  
                  </div>
 
                  <input class="btn btn-lg btn-success btn-block" type="submit" value="submit" name="submit">
           </fieldset>
          </form>
          <center><b>Already registered ?</b> <br></b><a href="<?php echo base_url('User/log'); ?>">Login here</a></center>
                  </div>
              </div>
          </div>
      </div>
  </div>
 </div>
 
 
 
 
</span>
</body>
 </html>  