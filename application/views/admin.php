<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Admin-Dashboard</title>
<link href="http://localhost/management/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="http://localhost/management/cs/sb-admin-2.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="http://localhost/management/style/welcome.css">
<link rel="stylesheet" type="text/css" href="http://localhost/management/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="http://localhost/management/assets/css/admin.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body id="page-top">
  <div id="wrapper">
  <?php  $this->load->view('nav');?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
      <?php $this->load->view('navbar');?>
      <div class="container-fluid">
        <div class="row">
          <div class="row">
            <div class="card-body">
              <div class="card-body">
              <div class="select" style="float: left;">
                <select name="select" id="select">
                <option selected value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                </select>
              </div><br><br><br>
              <table class="table" id="tbl" cellspacing="1">
                <thead>
                  <tr>
                    <th  scope="col"><button class="input-sort" data-id="user_name" data-order="desc"><img id="showimage" class="ascending" src="http://localhost/management/assets/image/sort-up.png"><img  class="descending" src="http://localhost/management/assets/image/sort-down.png">User&nbsp;Name&nbsp;</button><input type="text" id="user_name" placeholder="Enter Name" class="input-search"  maxlength="10" size="10"  ></th>

                    <th scope="col"><button class="input-sort" data-id="age" data-order="desc"> <img class="ascending" src="http://localhost/management/assets/image/sort-up.png"><img class="descending"  src="http://localhost/management/assets/image/sort-down.png">User&nbsp;Age&nbsp;</button><input type="text" id="age" value="" placeholder="Enter Age" class="input-search"  maxlength="10" size="10" ></th>

                    <th scope="col"><button class="input-sort" data-id="number" data-order="desc"><img class="ascending" src="http://localhost/management/assets/image/sort-up.png"><img class="descending"  src="http://localhost/management/assets/image/sort-down.png">User&nbsp;Number&nbsp;</button><input type="text"  id="number" placeholder="Enter Number" class="input-search"  maxlength="10" size="10" ></th>

                    <th scope="col"><button class="input-sort" data-id="address1" data-order="desc"><img class="ascending" src="http://localhost/management/assets/image/sort-up.png"><img class="descending"  src="http://localhost/management/assets/image/sort-down.png">User Address1</button><input type="text"  id="address1" placeholder="Enter Address2" class="input-search"  maxlength="10" size="10" ></th>

                    <th scope="col"><button class="input-sort" data-id="address2" data-order="desc"><img class="ascending" src="http://localhost/management/assets/image/sort-up.png"><img class="descending"  src="http://localhost/management/assets/image/sort-down.png">User Address2</button><input type="text"  id="address2" placeholder="Enter Address2" class="input-search"  maxlength="10" size="10" ></th>

                    <th scope="col"><button class="input-sort" data-id="country_name" data-order="desc"><img class="ascending" src="http://localhost/management/assets/image/sort-up.png"><img  class="descending" src="http://localhost/management/assets/image/sort-down.png">User&nbsp;Country&nbsp;</button><input type="text" id="country_name" placeholder="Enter Country" class="input-search"  maxlength="10" size="10" ></th>

                    <th scope="col"><button class="input-sort" data-id="state_name" data-order="desc"><img class="ascending" src="http://localhost/management/assets/image/sort-up.png"><img  class="descending" src="http://localhost/management/assets/image/sort-down.png">User&nbsp;State&nbsp;</button><input type="text" id="state_name"  placeholder="Enter State" class="input-search"  maxlength="10" size="10" ></th>

                    <th scope="col"><button class="input-sort" data-id="city_name" data-order="desc"> <img class="ascending" src="http://localhost/management/assets/image/sort-up.png" ><img  class="descending" src="http://localhost/management/assets/image/sort-down.png">User&nbsp;City&nbsp;</button><input type="text" id="city_name"  placeholder="Enter City" class="input-search"  maxlength="10" size="10"></th>

                    <th scope="col" id="action" colspan="2" style="color: black; text-align: center;"><br>Action</th>
                  </tr>
                </thead>

              </table>
            </div>
            </div>
          </div>
          </div>
        <div style='margin-top: 10px;' id='pagination'></div><br>
        </div>
      </div>
    </div>
  <div id="myModal" class="modal1">
    <div class="modal-content1">
    <div class="model-header1">
      <span class="close">&times;</span>
      <center><h5 style="color: steelblue">Update Information</h5></center>
    </div>
    <div class="modal-body1">
      <form action='<?php echo base_url('User/update');?>' method='post' id='popupform'>
      <table border="2" id="update_table" align="center" class="table1">
        <thead>
        <tr>
          <th class="modal_th">User ID</th>
          <td class="modal_td"><input type="text" name="user_id" id=u_id class="td" readonly></td>
        </tr>

        <tr>
          <th class="modal_th">User Name</th>
          <td class="modal_td"><input  type="text" name="user_name"  id="u_name" class="td" autofocus ></td>
        </tr>

        <tr>
          <th class="modal_th">User Age</th>
          <td class="modal_td"><input  type="text" name="user_age"  id="u_age" class="td" autofocus ></td>
        </tr>

        <tr>
          <th class="modal_th">User Number</th>
          <td class="modal_td"><input  type="text" name="user_mobile"  id="u_number" class="td" autofocus ></td>
        </tr>

        <tr>
          <th class="modal_th">User Address1</th>
          <td class="modal_td"><input  type="text" name="user_adda"  id="u_address1" class="td" autofocus ></td>
        </tr>

        <tr>
          <th class="modal_th">User Address2</th>
          <td class="modal_td"><input  type="text" name="user_addb"  id="u_address2" class="td" autofocus ></td>
        </tr>

        <tr>
          <th class="modal_th">User Country</th>
            <td class="modal_td" id="select2" >
              <select class="form-control" id="user_country" name="user_country">
              <option>Select State</option>
              <option value="1">Australia</option>
              <option value="2">switzerland</option>   
              <option value="5">UK</option>   
              <option value="6">India</option>   
              <option value="7">US</option>   
              </select>
            </td>
        </tr>
        <tr>    
          <th class="modal_th">User State</th>
          <td class="modal_td" >
          <select class="form-control" id="states" name="user_state" type="text" autofocus>
          <option value="">Select State</option>
          </select>
          </td>
        </tr>
        <tr>
          <th class="modal_th">User City</th>
          <td class="modal_td" >
          <select class="form-control" id="cities" name="user_city" type="text" autofocus>  
          <option value="">Select City</option>
          </select> 
          </td>
        </tr><br><br>  
        <tr>
          <td colspan="2" style="text-align: center"><input type="submit" name="submit" class="button button2" value="Update"></td>
        </tr>
      </thead>
      </table>
      </form> 
    </div>
    </div>
  </div><br>
  <script src="http://localhost/management/vendor/jquery/jquery.min.js"></script>
  <!-- <script src="http://localhost/management/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="http://localhost/management/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="http://localhost/management/js/sb-admin-2.min.js"></script>
</body>
</html>
<script type='text/javascript'>
var modal = document.getElementById('myModal');
var btn1 = document.getElementById('myBtn');
var span = document.getElementsByClassName("close")[0];
span.onclick = function() 
{
  modal.style.display = "none";
}
window.onclick = function(event)
{
  if (event.target == modal)    
  {
    modal.style.display = "none";
  }
}
$(document).ready(function() 
{
  $.ajax
  ({
    url:"<?php echo base_url();?>User/fetch",
    method: "post",
    dataType: 'json',
    success:function (response) 
    {
      if(response.status==1000)
      {
        var trdata = '<tbody>';
        var tableData = response.data;
        for(var i=0;i<tableData.length;i++)
        { 
          trdata += 
          '<tr><td>'  + tableData[i].user_name + 
          '</td><td>' + tableData[i].age + 
          '</td><td>' + tableData[i].number+ 
          '</td><td>' + tableData[i].address1 + 
          '</td><td>' + tableData[i].address2+ 
          '</td><td>' + tableData[i].country_name + 
          '</td><td>' + tableData[i].state_name + 
          '</td><td>' + tableData[i].city_name + 
          '</td><td>' + tableData[i].usr_id + 
          '</td></tr>';            
        };
        trdata +='</tbody>';
        $('#tbl').append(trdata);
        // $("#succ_msg").html("success").show();
        // setTimeout(function()
        // {
        //     $("#succ_msg").html("").hide();
        // }, 1000);
      }
      else
      {
        alert("not found");
      }  
    }
  });
  $('#pagination').on('click','a',function(e)
  {
  //alert($(this).attr('href'));
    e.preventDefault(); 
    var pageno = $(this).attr('data-ci-pagination-page');
    operation(false,false,pageno);
  });
  operation(false,false,1);
  $('#select').on('change',function(e)
  {
    e.preventDefault(); 
    operation(false,false,false);
  });
  $('.input-search').keyup('a',function(e)
  {  
    e.preventDefault(); 
    operation(false,false,false);
  });
  $('.input-sort').click('a',function()
  {
    var id = $(this ).attr('data-id');
    var order=$(this).attr('data-order');
    var new_order = 'asc';
    if(id)
    {
      if(order == "asc")
      {
        new_order = 'desc';
        $('.ascending',this).hide();
        $('.ascending').hide();
        $('.descending',this).show();
      }
      else
      {
        new_order = 'asc';
        $('.ascending',this).show();
        $('.descending',this).hide();
        $('.descending').hide();
      }
    }
    $(this).attr('data-order',new_order);
    operation(id,new_order,false);
  });
});

// function showlogout(){
// document.getElementById('signoutbtn').style.visibility=document.getElementById('signoutbtn').style.visibility == 'visible'?'hidden' :'visible';
// }

// function showImage(){
// document.getElementById('default_image').style.visibility=document.getElementById('default_image').style.visibility == 'visible'? 'hidden' : 'visible';
// }

function operation(sortBy,sort,pageno)
{
  var id = $(this).attr('data-id');
  var sortType = 'asc';
  var totalrowno = $('#select').val();
  var curpageno='1';    
  if(sortBy!=false && sortBy!=undefined)
  {
    id = sortBy;
    sortType = sort;
  }
  if(pageno!=false )
  {
    curpageno = pageno;
  }
  required = ['user_name','age','number','address1','address2','country_name','state_name','city_name']; 
  var params={};
  for(var i =0;i<required.length;i++)
  {
    var element =  required[i] ;
    params[element] = $('#' + element).val(); 
  }
  $.ajax
  ({
    url:'<?=base_url()?>User/loadoperation/'+curpageno,
    type:'post',
    data:{'id':id,'order':sortType,'value':params,'select':totalrowno},
    dataType:'json',
    success:function(response)
    {
      if(response != null)
      {
        $('#pagination').html(response.pagination).show();
        createTable(response.result);
        $("#succ_msg").html("success").show();
      }
      else 
      {
        resultnotfound();
      } 
    }
  });
}

function createTable(result)
{
  $('#tbl tbody').empty();
  var tbody = "";
  for(i in result)
  { 
    var user_name = result[i].user_name;
    var age = result[i].age;
    var number = result[i].number;
    var address1 = result[i].address1;
    var address2 = result[i].address2;
    var country = result[i].country_name;
    var state = result[i].state_name;
    var city = result[i].city_name;
    var id = result[i].usr_id;

    tbody += "<tr>";
    tbody += "<td>"+user_name +"</td>";
    tbody += "<td>"+age+"</td>";
    tbody += "<td>"+number+"</td>";
    tbody += "<td>"+address1+"</td>";
    tbody += "<td>"+address2+"</td>";
    tbody += "<td>"+country+"</td>";
    tbody += "<td>"+state+"</td>";
    tbody += "<td>"+city+"</td>";
    tbody += "<td><button class='btn success' id='myBtn' data-id="+id+" onclick='showpopup(this);'>Edit</button></td>";
    tbody += "<td><button class='btn danger' id='myBtn1' data-id="+id+" onclick='deletedata(this);'>Delete</button></td>"
    tbody += "</tr>";
  }   
  $('#tbl tbody').html(tbody);
}
function resultnotfound()
{
  $('#tbl tbody').empty();
  $('#pagination').hide();
  var tdata = ""; 
  tdata +='<tr><td colspan="8">'+"Result Not Found." +'</td></tr>';   
  $('#tbl tbody').html(tdata);
} 

function showpopup(elem)
{
  var id = $(elem).attr('data-id');
  // alert(id);
  $.ajax
  ({
    url:"<?php echo base_url();?>User/oldData/"+id,
    method: "post",
    dataType: 'json',
    success:function (response) 
    {   
      console.log(response);
      if(response.status == 1000)
      {
        var result = response.data;
        $('#u_id').val(result.User_id);
        $('#u_name').val(result.User_name);
        $('#u_age').val(result.Age);
        $('#u_number').val(result.Number);
        $('#u_address1').val(result.Address1);
        $('#u_address2').val(result.Address2);
        $('#user_country :selected').text(result.Country_name).hide();
        $('#states :selected').text(result.State_name).hide();
        $('#cities :selected').text(result.City_name).hide();
      }
    },
    error:function(xhr)
    {
      console.log(xhr);
    }
  });    
  modal.style.display = "block";
}
function deletedata(elem) 
{
  var id = $(elem).attr('data-id');
  $.ajax
  ({
    url:"<?php echo base_url();?>User/delete/"+id,
    type:"delete",
    success:function(response)
    {
      if(response)
      {
        alert('Deleted Successfully');
        window.location = "http://localhost/management/index.php/User/admin";
      }
      else
      {
        alert('Not Deleted');
      }      
    },
    error:function(xhr)
    {
      console.log(xhr);
    }       
  });
}
</script>
<script>
$(document).ready(function()
{
  $('#user_country').change(function()
  {
    var country_id = $('#user_country').val();
    if(country_id != '')
    {
      $.ajax
      ({
        url:"<?php echo base_url(); ?>User/fetch_state",
        method:"POST",
        data:{country_id:country_id},
        success:function(data)
        {
          $('#states').html(data);
          $('#cities').html('<option value="">Select City</option>');
        }
      });
    }
    else
    {
      $('#states').html('<option value="">Select State</option>');
      $('#cities').html('<option value="">Select City</option>');
    }
  });
  $('#states').change(function()
  {
    var state_id = $('#states').val();
    if(state_id != '')
    {
      $.ajax
      ({
        url:"<?php echo base_url(); ?>User/fetch_city",
        method:"POST",
        data:{state_id:state_id},
        success:function(data)
        {
          $('#cities').html(data);
        }
      });
    } 
    else
    {
      $('#cities').html('<option value="">Select City</option>');
    }
  });
});
</script>


