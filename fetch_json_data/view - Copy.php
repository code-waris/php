<?php

include_once('include/config.php');
$arrlist=array();
$json = file_get_contents('data.json');
$obj = json_decode($json,true);
$total=count($obj["customers"]);

  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  		
  		function show(){
  			var JSONItems = [];
			$.getJSON( "data.json", function( data){
			  JSONItems = data.customers;
			  console.log(JSONItems);
			  var tags="";
			  for(var aa in JSONItems)
			  {
			  	tags+="<tr>";
			  	 tags+="<td>"+JSONItems[aa]["id"]+"</td>";
			  	 tags+="<td>"+JSONItems[aa]["firstName"]+"</td>";
			  	 tags+="<td>"+JSONItems[aa]["lastName"]+"</td>";
			  	 tags+="<td>"+JSONItems[aa]["email"]+"</td>";
			  	 tags+="<td>"+JSONItems[aa]["phone"]+"</td>";
			  	 tags+="</tr>";
			  }
			  $('#main').empty();
  			  $('#main').append(data);
			});
  		}
  		$(document).ready(function() {
			show();
         });
  		

  	
  		  	$(document).on('click','#addcat',function(){

  			var title=$('#addtitle').val();
  			var fname=$('#fname').val();
  			var lname=$('#lname').val();
  			var email=$('#email').val();
  			var phone=$('#phone').val();
  			alert(fname);
  			$.ajax({
  					url:'insert.php',
  					type:'Post',
  					data:{title:title,firstName:fname,lastName:lname,email:email,phone:phone},
  					success:function(data){
  						window.location.href = "http://localhost/practice/view.php";
  					}


  			});




  		});



  		$(document).on('change','#title',function(){
  			
  			var data=this.value;

  			$.ajax({
  					url:'filter.php',
  					type:'Post',
  					data:{data:data},
  					dataType:'html',
  					success:function(data){
  						$('#main').empty();
  						$('#main').append(data);
  					}


  			});
  		

  		});


  		
  </script>
</head>
<body>

<div class="container">
  <h2>Category</h2>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addcategory">Open Modal</button>

  	<select id="title">
  		<option>select</option>
  		<option>Technical Lead</option>
  		<option>CEO</option>
  		<option>Receptionist</option>
  		<option>Student</option>
  	</select>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>F Name</th>
        <th>L Name</th>
        <th>Email</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody id="main">
      <?php
      	for($i=0; $i<$total; $i++){?>

      		<tr>
      			<td><?php echo $obj["customers"][$i]['id'];?></td>
      			<td><?php echo $obj["customers"][$i]['firstName'];?></td>
      			<td><?php echo $obj["customers"][$i]['lastName'];?></td>
      			<td><?php echo $obj["customers"][$i]['email'];?></td>
      			<td><?php echo $obj["customers"][$i]['phone'];?></td>
      			<td><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editcategory">Edit</a></td>
      		</tr>

      	<?php }?>
    </tbody>
  </table>
</div>
<div id="editcategory" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
    <!-- <label for="email">Product</label> -->
    <select id="addtitle" name="title">
  		<option>Technical Lead</option>
  		<option>CEO</option>
  		<option>Receptionist</option>
  		<option>Student</option>
  	</select>
     <input type="text" class="form-control" placeholder="firstName" id="fname">
      <input type="text" class="form-control" placeholder="lastName" id="lname">
       <input type="text" class="form-control" placeholder="email" id="email">
        <input type="text" class="form-control" placeholder="phone" id="phone">
  </div>
  
  <input type="submit" id="addcat" class="btn btn-default" value="submit">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
  <div id="addcategory" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
    <!-- <label for="email">Product</label> -->
    <select id="addtitle" name="title">
  		<option>Technical Lead</option>
  		<option>CEO</option>
  		<option>Receptionist</option>
  		<option>Student</option>
  	</select>
     <input type="text" class="form-control" placeholder="firstName" id="fname">
      <input type="text" class="form-control" placeholder="lastName" id="lname">
       <input type="text" class="form-control" placeholder="email" id="email">
        <input type="text" class="form-control" placeholder="phone" id="phone">
  </div>
  
  <input type="submit" id="addcat" class="btn btn-default" value="submit">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</body>
</html>
