<!DOCTYPE html>
<?php 
session_start();
error_reporting(0);

if($_SESSION["name"]!="")
{
?>

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
  <?php
    $con=mysqli_connect("localhost","root","");
    $table="log";
    $n=$_SESSION["name"];
    if($con)
    {
        mysqli_select_db($con,"review");
        $query="select * from review.log where email='$n'";
        
        $result=mysqli_query($con,$query);
        if (!$result) {
            die('Invalid query: ' . mysqli_error($con));
        }
        else
        {
          $row=mysqli_fetch_array($result);

            $name=$row['name'];
            $mail=$row['email'];
            $no=$row['mobile_no'];
 
        }
    }
    else{
        echo "error";
    }
    ?>
    <div class="head"><br>REVIEW YOUR <B>FAVOURATE</B> MOVIES HERE</div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">REVIEW</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link ml-3" href="Main1.php">Home<span class="sr-only">(current)</span></a>
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
          <button class="btn" type="submit">Search</button>&nbsp;
          <button class="btn mr-2" type="button" onclick=window.location="profile.php">My Profile</button>
          <button class="btn mr-2" type="button" onclick=window.location="logout.php">Logout</button>
        </form>
      </div>
    </nav>
    <div class="profile">    
    <br><br>
    <h3 style="text-align:center;">PROFILE DETAILS</h3><br>
    <table class="table table-hover">
      <tbody>

            <tr>
            <th scope="row">NAME :</th>
            <td><?php echo $name?></td>
            <td><a href="#">Edit</a></td>
            </tr>
            <tr>
            <th scope="row">E-MAil :</th>
            <td><?php echo $mail?></td>
            <td><a href="#">Edit</a></td>
            </tr>
            <tr>
            <th scope="row">MObile NO:</th>
            <td><?php echo $no?></td>
            <td><a href="#">Edit</a></td>
            </tr>

      </tbody>
    </table>

    <?php
            	$gj=mysqli_connect("localhost","root","");
              if($gj){
              mysqli_select_db($gj,'review');
              $res=mysqli_query($gj,"select * from review.rating where name='$mail'");
              
              ?>
              <h3 style="text-align:center;">CONTRIBUTION</h3><br>
              <table class="table table-hover">
              <tbody>
              <tr>
                <th scope="row">MOVIE</th>
                <th>COMMENT</td>
                <th>RATING</td>
                <td></td>
            </tr>
              <?php
              while($row=mysqli_fetch_array($res))
              {
              ?>
                <tr>
                <th scope="row"><?php echo $row['movie'];?></th>
                <td><?php echo $row['comment'];?></td>
                <td><?php echo $row['star'];?>/5</td>
                <td><a href="#">Edit</a></td>
                </tr>
                <?php
              }?>
           </tbody>

          </table>
         
</div>
<?php
}}
else
{

    echo "Please log in to continue...!!!";
}
?>
</body>
</html>
