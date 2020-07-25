<?php 
session_start();
?>
<html>
<head>
    </head>
<body>    
<?php
    $name="george";
    $pass1=123;
if(isset($_POST['sub']))
{
    $user=$_POST['id'];
    $pass=$_POST['pass'];
    if($user!=NULL && $pass!=NULL){
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'review');
    if($con)
    {
        $query="select * from review.log where userid='$user' and passwrd='$pass'";
        $result=mysqli_query($con,$query)or die( mysqli_error($con));
        $row=mysqli_fetch_array($result);
        if($user==$name && $pass==$pass1)
        {
            header("location:up.php");
        }
        
        else if($row['userid']==$user && $row['passwrd']==$pass)
        {
            $url="Main1.php";
            $_SESSION['name']=$user;
            header("location:$url");        }
        else
        {
            header("location:index.php");     
        }
        
    }
    
}
    else
    {
        header("location:index.php");
    }
}

?>
</body>
</html>