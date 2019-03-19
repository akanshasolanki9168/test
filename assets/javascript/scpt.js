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
		          	
		           var trHTML = '';
                   var dtl = response.data;
   	               for(var i=0; i < dtl.length; i++)
                     { 
                            //console.log(dtl);  
                            trHTML += 
	                        '<tr><td>'  + dtl[i].usr_name + 
	                        '</td><td>' + dtl[i].age + 
	                        '</td><td>' + dtl[i].number+ 
	                        '</td><td>' + dtl[i].add1 + 
	                        '</td><td>' + dtl[i].add2+ 
	                        '</td><td>' + dtl[i].country + 
	                        '</td><td>' + dtl[i].state + 
	                        '</td><td>' + dtl[i].city + 
	                        '</td></tr>';            
                     };
                             $('#tbl').append(trHTML);
                             $("#succ_msg").html("success").show();
                              setTimeout(function()
                               {
                                $("#succ_msg").html("").hide();
                               }, 3000);
                            }
                    else
           		    {
           			   alert("not found");
           		    }  
           		}
         	});


     $('#pagination').on('click','a',function(e){
        e.preventDefault(); 
        //var pageno = $(this).attr('data-ci-pagination-page');
        loadPagination(pageno);
      });

      loadPagination(0);

      
      function loadPagination(pagno){
        $.ajax({
          url: '<?=base_url()?>User/loadRecord/'+pagno,
          type: 'get',
          dataType: 'json',
          success: function(response){
            console.log(response);
            $('#pagination').html(response.pagination);
            createTable(response.result,response.row);
          }
        });
      }

      // Create table list
      function createTable(result,usr_name){
        usr_name = Number(usr_name);
        $('#tbl tbody').empty();
        for(index in result)
        {
          var usr_name = result[index].usr_name;
          var age = result[index].age;
          var number = result[index].number;
          var add1 = result[index].add1;
          var add2 = result[index].add2;
          var country = result[index].country;
          var state = result[index].state;
          var city = result[index].city;
          var link = result[index].link;
          usr_name+=1;
          var tr = "<tr>";
          tr += "<td>"+usr_name  +"</td>";
          tr += "<td>"+age +"</td>";
          tr += "<td>"+number  +"</td>";
          tr += "<td>"+add1  +"</td>";
          tr += "<td>"+add2  +"</td>";
          tr += "<td>"+country  +"</td>";
          tr += "<td>"+state  +"</td>";
          tr += "<td>"+city+"</td>";
          tr += "<td><a href='"+ link +"' target='_blank' ></a></td>";
          tr += "</tr>";
          $('#tbl tbody').append(tr);
          
        }
      }
      
    });