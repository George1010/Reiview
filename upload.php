
<?php
$genre=$_POST['genre'];
$target_dir = "uploads/".$genre."/";
if(!is_dir($target_dir)){
    mkdir($target_dir, 0755);
  }
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
    else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

if ($_FILES["image"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) 

{
  echo "Sorry, your file was not uploaded.";
} 


else 
{
    
    
    
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
  {
    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    
  }
       
  else 
  {
    echo "Sorry, there was an error uploading your file.";
  }
  $con=mysqli_connect('Localhost','root','');
    if($con)
    {
        mysqli_select_db($con,'review');
        echo "inside";
        if(isset($_POST['upload']))
        {
            echo "in";
            $image=$_FILES['image']['name'];
  	        $image_text = mysqli_real_escape_string($con, $_POST['image_text']);
            echo $genre;
            echo $image_text;
            echo $image;
            $name=pathinfo($image, PATHINFO_FILENAME); 
            echo $name;
            $query="insert into review.$genre (name,image,description) values ('$name','$image','$image_text')";
            $result=mysqli_query($con,$query);
            header("location:up.php");

        }
        else
        {
            echo "db error";
        }
    }
}

    $con -> close();

?>
