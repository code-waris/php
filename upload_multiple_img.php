<?php
$conn=new mysqli('localhost','root','','test');
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['submit'])){

	$extension=array('jpg','jpeg','gif','png','pdf');
	$file=$_FILES['file'];
	foreach ($file['name'] as $key => $value) {
		$ext=end(explode('.', $value));
		$filename=time()+rand().'.'.$ext;
		if(in_array($ext, $extension))
		{
			move_uploaded_file($file['tmp_name'][$key], "files/".$filename);
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Upload Multiple Image</h2>
  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
      <label for="pwd">Upload Multiple Image</label>
      <input type="file" class="form-control" id="file" placeholder="Enter password" name="file[]" multiple />
    </div>
   
    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
</div>

</body>
</html>
