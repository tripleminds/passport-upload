<?php
// hello Yemisi, This is a demo page for uploading a passport


$errorMessage = "";  // set error message to null by default
$success = false;	// set sucess message to false by default



if($_SERVER['REQUEST_METHOD'] == "POST")
{
	// check if the file type is jpeg and not more than 20KB(200000), You can change the value as desired.
	if($_FILES['file']['type'] != 'image/jpeg' || $_FILES['file']['size'] > 20000) 
	{
		 
		//if any of the above condition is true; set an error message
		$errorMessage =  "Invalid image type/size.";

	}



	else{

			// directory where file is to be stored; make sure it exists on your server
			$directory = "uploads/";
			// temporary location of uploaded file
			$tempfile = $_FILES['file']['tmp_name'];

			// the name of the uploaded file; Note you can customize as desired.
			/*
				Example asuuming you want the custom name to be matriculation number 
				$name = $matric . 'jpg'
				This will convert the original name to our desired name for easy identification and retrieval.


			*/
			$name =  $_FILES['file']['name'];

			// mpve the uploaded file to our directory
			if(move_uploaded_file($tempfile, $directory . $name))
			{

				$success = true;
				// if this is successful, then set success to true
			}


			

	}
}


?>



<!DOCTYPE HTML>
<html>
<head>
<title>Passport Upload | Demo</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<body style = "width:50%;margin-left:auto;margin-right:auto;margin-top:10%;border-style:solid">


				<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST" enctype = "multipart/form-data">

				<!-- Message to be displayed when the immage upload is successfull-->
				<?php if($success == true): ?>
					<div class = "alert alert-success">  <strong> File Uploaded Successfully!</strong> </div>
				<?php endif ?>

					
					<div class="form-group"> 
									<label for="exampleInputFile"><strong>Passport Photograph Demo</strong></label> 
									<input class = "form-control" type="file" name = "file"  required>
									<p class="help-block" style = "color:green">Passport should be JPEG only and maximum size allowed is 20KB</p> 

									<!-- Message to be displayed when the image is invalid  and violates what is required--->
									<p class="help-block" style = "color:red"> <?php if( !empty($errorMessage)){echo $errorMessage;} ?> </p> 
						</div> 

						<div class="form-group"> 
							<button type = "submit" class = "btn btn-primary"> Submit </button>
						<div class="form-group"> 
						</form>
</body>
</html>