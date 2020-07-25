<?php 
session_start();
?>
<?php

    $name=$_SESSION['name'];
    $table =$_GET['genre'];
    $stars = $_POST['star'];
    $comment=$_POST['comment'];
    $movie=$_GET['name'];  
    $url="rate.php";
    $url.="?genre=";
    $url.=$table;
    $url.="&movie=";
    $url.=$movie;
    $url.="#frm";
print $stars;
print $comment;
$con=mysqli_connect("localhost","root","");
if($con)
{
    echo "in";
    mysqli_select_db($con,"review");
    $query="select * from rating where name='$name' and movie='$movie'";
    $result=mysqli_query($con,$query);
    if($raw=mysqli_fetch_array($result))
    {
            echo "in";

        $query="update rating set comment='$comment' , star='$stars' where name='$name' and movie='$movie'";
        mysqli_query($con,$query);
        header("location:$url");

    }
    else
    {
            echo "in2";

        $query="insert into rating (name,movie,comment,star) values ('$name','$movie','$comment','$stars')";
        mysqli_query($con,$query); 
        header("location:$url");
    }
}








?>