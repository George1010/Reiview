<?php 
session_start();
error_reporting(0);

if($_SESSION["name"]!="")
{
?>
<html>
<head>
    <title>| Review |</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="Main1.css">
    <link rel="stylesheet" href="rate.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


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
        <a class="nav-link ml-5" href="Main1.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
          <a class="nav-link ml-3" >
              <div class="dropdown">
                <button class="btn  dropdown-toggle p-0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Genre
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button" onclick='window.location="Main1.php#action"'>Action</button>
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
      <button class="btn mr-2" type="button" onclick=window.location="logout.php">Logout</button>
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> 
 
<?php
    $table=$_GET['genre'];
    $movie=$_GET['movie'];        
    $rat=mysqli_connect("localhost","root","");
    $con=mysqli_connect("localhost","root","");
    if($con)
    {
        mysqli_select_db($con,"review");
        $query="select * from $table where image='$movie'";
        
        $result=mysqli_query($con,$query);
        if (!$result) {
            die('Invalid query: ' . mysqli_error($con));
        }
        else
        {
            $url="comm.php?name=";
            $url.=$movie;
            $url.="&genre=";
            $url.=$table;
            $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $movie);?>

        <?php

        while($row=mysqli_fetch_array($result))
            {
        ?>
        <div class="info" align="center">
        <table>    
            <tr>
                <td>
                    <img src= "uploads/<?php echo $table;?>/<?php echo $row['image']; ?>" height="600" width="400" >  
                    <br><br><h3><?php echo $withoutExt ?></h3>

                </td>
                <td>
                    <div class="movie_info">
                    <h3>Plot</h3>
                    <p><?php echo $row['description'] ?></p>
                    </div>
                </td>
            </tr><br><br><br><Br>
        </table><br><br>
        <?php
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

            }
        ?>
        <form action="<?php echo $url?>" method="post">
            <div class="stars">


                <input class="star star-5" id="star-5" value="5" type="radio" name="star"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" value="4" type="radio" name="star"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" value="3" type="radio" name="star"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" value="2" type="radio" name="star"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" value="1" type="radio" name="star"/>
                <label class="star star-1" for="star-1"></label>
            </div>
                       <h1>  <?php echo $rating;?>/5</h1><br>


            <div class="form" align="center">

                <div class="form-group" id="frm">
                    <textarea class="form-control" name ="comment" rows="5" id="comment" placeholder="Comment"></textarea>
            
                </div><br>
                <button type="submit" class="btn l-5">post</button>
            </div>
        </form>
        <div class="form-group">
            <?php 
            if($rat)
            { 
                $query="select * from rating where movie='$movie'";
                $result=mysqli_query($rat,$query);
                ?>
                <div class="com1"><?php
                while($raw=mysqli_fetch_array($result))
                {
                
                    ?>
                    <div class="com">
                    User :&nbsp;<?php echo $raw['name'];?><br>
                    Rating :&nbsp;<?php echo $raw['star'];?>/5<br>
                    "<?php echo $raw['comment'];?>"
                </div>
                <br><?php
                }?></div><?php
            
            }
           ?>
                
        </div> 
            <br>
            <br>
    </div>
    <?php

            }
        }
    }
    ?>
    
</body>
</html>
<?php
}
else{

    echo "Please log in to continue...!!!";
}
?>