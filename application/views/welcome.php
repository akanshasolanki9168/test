<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <title>User-Dashboard</title>
    <link href="http://localhost/management/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="http://localhost/management/cs/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://localhost/management/style/welcome.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://localhost/management/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost/management/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://localhost/management/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="http://localhost/management/js/sb-admin-2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/management/assets/css/d.css" />
  <!-- <link rel="stylesheet" type="text/css" href="http://localhost/management/style/style.css" /> -->
  <style type="text/css"></style>
  </head>
  <body id="page-top">
    <div id="wrapper">
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('User/welcome');?>">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">User</div>
        </a>
        <hr class="sidebar-divider my-0">
      </ul>
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <?php $this->load->view('navbar');?>
          <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h4 class="h3 mb-0 text-gray-800">Dashboard</h4>
            <div class="btn1"><button id="bttn" onclick="showpopup();">ADD ARTICLE</button></div>
            </div>
            <div class="row">
              <div class="card-body">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary"><center>All Data</center></h6>
                    </div> 
                    <div class="card-body">
                    <div class="select" style="float: left;">
                      <select name="select" id="select">
                        <option selected value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                    </div><br><br><br>
                    <table class='table' cellspacing="2" id='usertable'>
                      <thead>
                      <tr>
                        
                        <th scope="col" id="image1">Image</th>
                        <th scope="col"><button class="input-sort" data-id="title" data-order="desc"><img id="showimage" class="ascending" src="http://localhost/management/assets/image/sort-up.png"><img  class="descending" src="http://localhost/management/assets/image/sort-down.png">Title&nbsp;&nbsp;</button><br><input type="text" id="title" placeholder="Enter Title" class="input-search"   maxlength="25" size="25" ></th>
                        <th scope="col"><button class="input-sort" data-id="description" data-order="desc"><img id="showimage" class="ascending" src="http://localhost/management/assets/image/sort-up.png"><img  class="descending" src="http://localhost/management/assets/image/sort-down.png">Description&nbsp;&nbsp;</button><br><input type="text" id="description" placeholder="Enter Description" class="input-search"  maxlength="25" size="25" ></th>

                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        
                        foreach($blogg as $row) 
                        { 
                        ?>
                          <tr>
                             <td id="ttl"><center><span><a href="<?php echo 'http://localhost/management/uploads/images/'.$row['image'];?>"><img src="<?php echo 'http://localhost/management/uploads/images/'.$row['image'];?>" alt="no image"/></a></span><span><a  href="<?php echo 'http://localhost/management/uploads/resized/'.$row['image'];?>"><img src="<?php echo 'http://localhost/management/uploads/resized/'.$row['image'];?>" alt="no image"/></a></span><span><a  href="<?php echo 'http://localhost/management/uploads/thumbs/'.$row['image'];?>"><img src="<?php echo 'http://localhost/management/uploads/thumbs/'.$row['image'];?>" alt="no image"/></a></span></center>
                              </td> 
                              <td id="ttl"><center><?php echo $row['title'];?></center></td>
                              <td id="ttl"><center><?php echo $row['description']; ?></center></td>
                          </tr>
                          <?php 
                        } 
                        ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
              <div style='margin-top: 10px;' id='pagination'></div><br>
            </div>  
          </div>
        </div>
      </div>
    </div>
    <div id="myModal" class="modal">
    <div class="modal-content">
    <div class="model-header">
    <span class="close">&times;</span>
    <center id="article">ADD ARTICLE</center>
    </div>
    <div class="modal-body">
      <form class="w3-container" action='<?php echo base_url('User/blogging');?>' method='post' id='popupform' enctype="multipart/form-data">
      <table border="3" id="update_table" align="center" class="table1">
        <thead>
        <tr>
          <th><center>Title</center></th>
          <td><input type="text" name="title" id="title1" placeholder="Enter title"  class="td"></td>
        </tr>
        <tr><br>
          <th><center>Description</center></th>
          <td><textarea name="description" id="description" placeholder="Enter description" class="td" ></textarea></td>
        </tr><br>
        <tr>
          <th><center>Image</center></th>
          <td><input type="file" name="image" id="image" placeholder="Upload image" class="td"></td>
        </tr><br><br>
        <tr>
          <td colspan="2" style="text-align: center"><input align="center" id="add" type="submit" class="button button2" name="submit" value="ADD"></td>
        </tr>
        </thead>
      </table>
      </form>
    </div>
    </div>
    </div><br>
  </body>
</html>
  <script type="text/javascript">
  var modal = document.getElementById('myModal');
  var bttn = document.getElementById('bttn');
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
  function showpopup()
  {
    modal.style.display = "block";
  }
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
  required = ['image','title','description'];
  var params={};
  for(var i =0;i<required.length;i++)
  {
    var element =  required[i] ;
    params[element] = $('#' + element).val(); 
  }
  $.ajax
  ({
    url:'<?=base_url()?>User/wel_pagination/'+curpageno,
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
  
    tbody += "<tr>";
    tbody += "<td><a href='http://localhost/management/uploads/images/"+image+"'><img src='http://localhost/management/uploads/images/"+image+"'/></center><span><a href='http://localhost/management/uploads/resized/"+image+"'><img src='http://localhost/management/uploads/resized/"+image+"'/></center></span><span><a href='http://localhost/management/uploads/thumbs/"+image+"'><img src='http://localhost/management/uploads/thumbs/"+image+"'/></span></td>";
    tbody += "<td>"+title +"</td>";
    tbody += "<td>"+description+"</td>";
    tbody += "</tr>";
  }   
  $('#usertable tbody').html(tbody);
}
function resultnotfound()
{
  $('#usertable tbody').empty();
  $('#pagination').hide();
  var tdata = ""; 
  tdata +='<tr><td colspan="3">'+"Result Not Found." +'</td></tr>';     
  $('#usertable tbody').html(tdata);
}
</script>
<script type="text/javascript" src="http://localhost/management/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: 'textarea',
    height: 150,
    theme:'modern',
    plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons', 
    image_advtab: true
});
</script>

