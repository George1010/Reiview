<?php 
session_start();
error_reporting(0);

if($_SESSION["name"]!="")
{
?>
<!DOCTYPE html>
<head>
    <title> Review </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Main1.css">
</head>
<body>
    
    

    
    
    <div class="head"><br>REVIEW YOUR <B>FAVOURATE</B> MOVIES HERE</div>
    
    
    
    
    
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">REVIEW</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link ml-3" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
          <a class="nav-link ml-3" >
              <div class="dropdown">
                <button class="btn  dropdown-toggle p-0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Genre
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button" onclick='window.location="#action"'>Action</button>
                <button class="dropdown-item" type="button" onclick='window.location="#horror"'>Horror</button>
                <button class="dropdown-item" type="button" onclick='window.location="#thriller"'>Thriller</button>
                <button class="dropdown-item" type="button" onclick='window.location="#romance"'>Romance</button>
                </div>  
            </div>
            <span class="sr-only">(current)</span></a>
      </li>      
      <li class="nav-item active">
        <a class="nav-link ml-3" href="#">Contact <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      </form>
      <button class="btn" type="submit">Search</button>&nbsp;
      <button class="btn mr-2" type="button" onclick=window.location="profile.php">My Profile</button>
      <button class="btn mr-2" type="button" onclick=window.location="logout.php">Logout</button>



   
  </div>
</nav>    

    
    
    
    
    
<?php
	$gj=mysqli_connect("localhost","root","");
    if($gj){
		mysqli_select_db($gj,'review');
    ?>    
    
    
    
    <h3 style="color:white;width:100%;background-color:black"><B style="padding:10px;">LATEST</B></h3> 
    <div class="genre" id="latest"><br>
    <table>
<?php
    $res=mysqli_query($gj,"select * from latest");
    $rat=mysqli_connect("localhost","root","");

    while($row=mysqli_fetch_array($res))
		{
            $url = 'rate.php?';
            $url .= 'genre=latest&movie=';
            $url .= $row['name'];
            $movie=$row['name'];
            $sum=0;
            $i=0;
            if($rat)
            {
                mysqli_select_db($rat,"review");
                $query="select * from rating where movie='$movie'";
                $result=mysqli_query($rat,$query);
                while($raw=mysqli_fetch_array($result))
                {
                    $i=$i+1;
                    $sum=$sum+$raw['star'];
                }
                $rating=$sum/$i;
                if($sum==0){
                  $rating=0;
                }
        
            }
		 ?><tr >
          <div class="box">
		 <a href="<?php echo $url;?>"> <img src= "uploads/latest/<?php echo $row['image']; ?>" height="150" width="150" style="margin:50px 30px;border-radius:20px"></img><br><?php echo $row['name'];?><h4>(<?php echo $rating?>/5)</h4></a></tr>
		 </div>
     <?php	
		}
	       ?>
  </table>
    
</div>


<h3><B style="padding:10px;">HORROR</B></h3> 

<div  class="genre" id="horror">
<table>
<?php
    $res=mysqli_query($gj,"select * from horror");
    $rat=mysqli_connect("localhost","root","");

    while($row=mysqli_fetch_array($res))
		{
            $url = 'rate.php?';
            $url .= 'genre=horror&movie=';
            $url .= $row['name'];
            $movie=$row['name'];
            $sum=0;
            $i=0;
            if($rat)
            {
                mysqli_select_db($rat,"review");
                $query="select * from rating where movie='$movie'";
                $result=mysqli_query($rat,$query);
                while($raw=mysqli_fetch_array($result))
                {
                    $i=$i+1;
                    $sum=$sum+$raw['star'];
                }
                $rating=$sum/$i;
                if($sum==0){
                  $rating=0;
                }
        
            }
		 ?><tr >
     <div class="box">
		 <a href="<?php echo $url;?>"> <img src= "uploads/horror/<?php echo $row['image']; ?>" height="150" width="150" style="margin:50px 30px;border-radius:20px"></img><br><?php echo $row['name'];?><h4>(<?php echo $rating?>/5)</h4></a></tr>
		 </div>		 <?php 	
		}
	?>
  </table>
</div>


<h3><B style="padding:10px;">ACTION</B></h3> 

<div  class="genre" id="action" name="action"><p>
<table>
<?php
    $res=mysqli_query($gj,"select * from action");
    $rat=mysqli_connect("localhost","root","");

    while($row=mysqli_fetch_array($res))
		{
            $url = 'rate.php?';
            $url .= 'genre=action&movie=';
            $url .= $row['name'];
            $movie=$row['name'];
            $sum=0;
            $i=0;
            if($rat)
            {
                mysqli_select_db($rat,"review");
                $query="select * from rating where movie='$movie'";
                $result=mysqli_query($rat,$query);
                while($raw=mysqli_fetch_array($result))
                {
                    $i=$i+1;
                    $sum=$sum+$raw['star'];
                }
                $rating=$sum/$i;
                if($sum==0){
                  $rating=0;
                }
        
            }
		 ?><tr >
     <div class="box">
		 <a href="<?php echo $url;?>"> <img src= "uploads/action/<?php echo $row['image']; ?>" height="150" width="150" style="margin:50px 30px;border-radius:20px"></img><br><?php echo $row['name'];?><h4>(<?php echo $rating?>/5)</h4></a></tr>
		 </div>		 <?php 	
		}
	?>
  </table>
</div>

<h3><B style="padding:10px;">ROMANCE</B></h3> 

<div  class="genre" id="romance">   
<table>
<?php
    $res=mysqli_query($gj,"select * from romance");
    $rat=mysqli_connect("localhost","root","");

    while($row=mysqli_fetch_array($res))
		{
            $url = 'rate.php?';
            $url .= 'genre=romance&movie=';
            $url .= $row['name'];
            $movie=$row['name'];
            $sum=0;
            $i=0;
            if($rat)
            {
                mysqli_select_db($rat,"review");
                $query="select * from rating where movie='$movie'";
                $result=mysqli_query($rat,$query);
                while($raw=mysqli_fetch_array($result))
                {
                    $i=$i+1;
                    $sum=$sum+$raw['star'];
                }
                $rating=$sum/$i;
                if($sum==0){
                  $rating=0;
                }
        
            }
		 ?><tr >
     <div class="box">
		 <a href="<?php echo $url;?>"> <img src= "uploads/romance/<?php echo $row['image']; ?>" height="150" width="150" style="margin:50px 30px;border-radius:20px"></img><br><?php echo $row['name'];?><h4>(<?php echo $rating?>/5)</h4></a></tr>
		 </div>		 <?php 	
		}
	?>
  </table>
</div>

<h3><B style="padding:10px;">THRILLER</B></h3> 

<div  class="genre" id="thriller">   
<table>
<?php
    $res=mysqli_query($gj,"select * from thriller");
    $rat=mysqli_connect("localhost","root","");

    while($row=mysqli_fetch_array($res))
		{
            $url = 'rate.php?';
            $url .= 'genre=thriller&movie=';
            $url .= $row['name'];
            $movie=$row['name'];
            $sum=0;
            $i=0;
            if($rat)
            {
                mysqli_select_db($rat,"review");
                $query="select * from rating where movie='$movie'";
                $result=mysqli_query($rat,$query);
                while($raw=mysqli_fetch_array($result))
                {
                    $i=$i+1;
                    $sum=$sum+$raw['star'];
                }
                $rating=$sum/$i;
                if($sum==0){
                  $rating=0;
                }
        
            }
		 ?><tr >
     <div class="box">
		 <a href="<?php echo $url;?>"> <img src= "uploads/thriller/<?php echo $row['image']; ?>" height="150" width="150" style="margin:50px 30px;border-radius:20px"></img><br><?php echo $row['name'];?><h4>(<?php echo $rating?>/5)</h4></a></tr>
		 </div>
     <?php 	
		}
	?>
  </table>
</div>


<?php
}
else{
    echo "Under Maintainance";
}
    $gj -> close();
?>
</body>

</html><?php
}
else{

    echo "Please log in to continue...!!!";
}
?>
