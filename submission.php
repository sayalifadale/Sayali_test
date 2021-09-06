<html>
<head>
	<title>Sayali Assignment Test</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1 class="h1_title">Add Animal Information</h1>
	<div class="container">
		<form id="animal_info" action="" method="POST" enctype="multipart/form-data">
        <div class="row">
           <div class="col-25">	
			   <label for="animal_name">Name of the Animal::</label>
		   </div>
		   <div class="col-75">
	 	       <input type="text" name="name">
	 	   </div>
	 	</div>
        <div class="row">
        	<div class="col-25">
	 	      <label for="animal_category">Animal Category::</label>
	 	    </div>
	 	    <div class="col-75">
			 	<select name="category">
			 		<option></option>
			 		<option>Herbivores</option>
			 		<option>Omnivores</option>
			 		<option>Carnvores</option>
			 	</select>
			</div>
		</div>
        <div class="row">
        	<div class="col-25">
	 	      <label for="image_upload">Upload Image::</label>
	 	    </div>
	 	    <div class="col-75">
	 	      <input type="file" name="uploadfile">
	 	    </div>
	 	</div>
        <div class="row">
        	<div class="col-25">
	 	      <label for="description">Description::</label>
	 	    </div>
	 	    <div class="col-75">
	 	      <textarea cols="50" name="description" rows="4">
	 	    </textarea>
	 	    </div>
	 	</div>
        <div class="row">
        	<div class="col-25">
	 	      <label for="life_expectancy">Life Expcetancy::</label>
	 	    </div>
	 	    <div class="col-75">
			 	<select name="expectancy">
			 		<option>[0-1 year]</option>
			 		<option>[1-5 year]</option>
			 		<option>[5-10 year]</option>
			 		<option>[10+ year]</option>
			 	</select>
			</div>
		</div>
		<div class="row">
		   <div class="col-25">
	         <label>Captcha:</label>
           </div>
           <div class="col-25" >
		      <input type="text" class="form-control" id="captcha" placeholder="Enter captcha" name="captcha" style="" >

		   </div>
		   <div class="col-25" >
		      <img src="captcha.php"/ style="margin: 10px 0px 0px 50px;">
	       </div>
		</div>
		<div class="row">
		   <div class="col-75" style="text-align: center;" >
	 	   <input type="submit" name="submit" value="submit">
	 	</div>
	 	</div>











		</form>
	</div>



<?php
session_start();
 include('connection.php');
  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['submit'])) {
  

  	$name=$_POST['name'];
	$category=$_POST['category'];
	$description=$_POST['description'];
	$expectancy=$_POST['expectancy'];
	$captcha=$_POST['captcha'];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
    $folder = "image/".$filename;
          
    		if (move_uploaded_file($tempname, $folder))  
        	{
            	$msg = "Image uploaded successfully";
       		 }
       		 else
       		 {
           		 $msg = "Failed to upload image";
      		}
   
    	if($_SESSION['CODE']==$captcha)
    	{
        	$sql = "INSERT INTO animal_info (name,photo,category,description,expectancy) VALUES ('$name','$filename','$category','$description','$expectancy')";


        	if(mysqli_query($con, $sql))
  			{
  			header("location:animal.php");
  			}

        	
  		}
  		else
  			echo "Please enter valid captcha code";
     
        

          
        // Now let's move the uploaded image into the folder: image
        

  
  
  		
}
?>
</body>
</html>
