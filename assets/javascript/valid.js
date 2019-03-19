
  // $.validator.setDefaults({
  //   submitHandler: function() {
  //     alert("submitted!");
  //   }
  // });

$(document).ready(function() {
    $("#rgtrform").validate
    ({
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
                user_country:
                {
                required: "Please enter a country",
                },
                user_state:
                {
                required: "Please enter a state",
                },
                user_city:
                {
                required: "Please enter a city"
                }
            }

    })
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
 
    
   
     
  
  