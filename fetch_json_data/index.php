<?php

include_once('include/config.php');

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
  	
  	$('document').ready(function(){
  		$('#addcat').click(function(){
  			$cat=$('#category').val();
  			$.ajax(){}
  		});
  	});

  </script>
</head>
<body>

<div class="container">
  <h2>Category</h2>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addcategory">Open Modal</button>     
  <table class="table">
    <thead>
      <tr>
        <th>S No.</th>
        <th>Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query=$conn->query("select title from category where status=1");
      while ($res=$query->fetch_array()) { @$no+=1;?>

      	<tr>
      		<td><?php echo $no;?></td>
      		<td><?php echo $res['title'];?></td>
      		<td><button type="button"  data-target="#addcategory" data-toggle="modal">Add Product</button></td>
      	</tr>
      <?php  } ?>
      
    </tbody>
  </table>
</div>
<div id="addcategory" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Product</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
    <label for="email">Product</label>
    <input type="text" class="form-control" id="category">
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
