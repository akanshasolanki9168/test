<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Blogs</title>
<!-- <link rel="stylesheet" type="text/css" href="http://localhost/management/assets/blogview.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="http://localhost/management/style/welcome.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="http://localhost/management/assets/css/style1.css"> -->
<link rel="stylesheet" type="text/css" href="http://localhost/management/assets/css/style.css">
<link href="http://localhost/management/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="http://localhost/management/cs/sb-admin-2.min.css" rel="stylesheet">

<link href="http://localhost/management/assets/css/b.css" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body id="page-top">
  <div id="wrapper">  
    <?php $this->load->view('nav');?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
       <?php $this->load->view('navbar');?>
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
          <div class="row">
            <div class="row">
              <div class="card-body">
                <div class="card-body">
                  <div style="float: left;">
                  <select name="select" id="select">
                  <option selected value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option></option>
                  </select>
                  </div><br><br><br>  
                  <table id="usertable" class="table">
                    <thead>
                    <tr>
                      <th scope="col" class ='header1'>Image</th>

                      <th scope="col"><button class="input-sort" data-id="title" data-order="desc"><img id="showimage" class="ascending" src="http://localhost/management/assets/image/sort-up.png"><img  class="descending" src="http://localhost/management/assets/image/sort-down.png"><img onclick="hideimage();" data-id="default_image" src="http://localhost/management/assets/image/images.png" style="visibility: hidden">Title&nbsp;&nbsp;</button><br><input type="text" id="title" placeholder="Enter Title" class="input-search"   maxlength="25" size="25" ></th>

                      <th scope="col"><button class="input-sort" data-id="description" data-order="desc"><img id="showimage" class="ascending" src="http://localhost/management/assets/image/sort-up.png"><img  class="descending" src="http://localhost/management/assets/image/sort-down.png"><img onclick="hideimage();" data-id="default_image" src="http://localhost/management/assets/image/images.png" style="visibility: hidden">Description&nbsp;&nbsp;</button><br><input type="text" id="description" placeholder="Enter Description" class="input-search"  maxlength="25" size="25" ></th>

                      <th scope="col"><button class="input-sort" data-id="user_name" data-order="desc"><img id="showimage" class="ascending" src="http://localhost/management/assets/image/sort-up.png"><img  class="descending" src="http://localhost/management/assets/image/sort-down.png"><img onclick="hideimage();" data-id="default_image" src="http://localhost/management/assets/image/images.png" style="visibility: hidden">Username&nbsp;&nbsp;</button><br><input type="text" id="user_name" placeholder="Enter Username" class="input-search"  maxlength="25" size="25" ></th>
                    </tr>
                    </thead>
                  <tbody>
                    <?php foreach($blogg as $row) 
                    { 
                      ?>
                      <tr>

                        <td id ="picture"><center><span><a href="<?php echo 'http://localhost/management/uploads/images/'.$row['image'];?>"><img src="<?php echo 'http://localhost/management/uploads/images/'.$row['image'];?>" alt="no image"/></a></span>
                        </center>
                        </td>

                        <td><center><?php echo $row['title'];?></center></td>
                        <td><center><?php echo $row['description']; ?></center></td>
                        <td><center><?php echo $row['user_name']; ?></center></td>
                      </tr>
                      <?php 
                    } 
                    ?>
                  </tbody>
                  </table> 
                </div><br><br>
              </div>
            </div>
          </div>
        </div>
        <div style='margin-top: 10px;' id='pagination'></div><br>
      </div>
    </div>
    <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01" style="width:9%; height: 17%;">
    </div>
  </div>
  <script src="http://localhost/management/vendor/jquery/jquery.min.js"></script>
  <!-- <script src="http://localhost/management/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="http://localhost/management/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="http://localhost/management/js/sb-admin-2.min.js"></script>
</body>
</html>
<script type="text/javascript">
var modal = document.getElementById('myModal');
var modalImg = document.getElementById("img01");
$(document).ready(function()
{
  $('#pagination').on('click','a',function(e)
  {
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
  $('.close').click(function() 
  {
    modal.style.display = "none";
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
  required = ['image','title','description','user_name'];
  var params={};
  for(var i =0;i<required.length;i++)
  {
    var element =  required[i] ;
    params[element] = $('#' + element).val(); 
  }
  $.ajax
  ({
    url:'<?=base_url()?>User/blogfunction/'+curpageno,
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
  $('#usertable tbody').empty();
  var tbody = "";
  for(i in result)
  {
    var image = result[i].image;
    var title = result[i].title;
    var description = result[i].description;
    var user_name = result[i].user_name;
    tbody += "<tr>";
    tbody += "<td><img id='myImg' onclick='imagepopup(this);' src='http://localhost/management/uploads/images/"+image+"'/></td>";
    tbody += "<td>"+title +"</td>";
    tbody += "<td>"+description+"</td>";
    tbody += "<td>"+user_name+"</td>";
    tbody += "</tr>";
  }   
  $('#usertable tbody').html(tbody);
}
function resultnotfound()
{
  $('#usertable tbody').empty();
  $('#pagination').hide();
  var tdata = ""; 
  tdata +='<tr><td colspan="4">'+"Result Not Found." +'</td></tr>';   
  $('#usertable tbody').html(tdata);
}
function imagepopup(elem)
{
  var src = $(elem).attr('src');
  modal.style.display = "block";
  modalImg.src = src;
}
</script>
