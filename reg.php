<?php 
session_start();
?>
<html>
<head>
    </head>
<body>    
<?php
if(isset($_POST['sub']))
{
    $user=$_POST['email'];
    $pass=$_POST['pass'];
    $name=$_POST['name'];
    $no=$_POST['mob'];
    
    if($user!=NULL && $pass!=NULL){
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'review');
    if($con)
    {
        $query="insert into review.log (name,mobile_no,email,password) values ('$name','$no','$user','$pass')";
        $result=mysqli_query($con,$query)or die( mysqli_error($con));
        $_SESSION['name']=$user;
        header("location:Main1.php");
    }
    else
    {?>
      <p>Invalid data</p>  
    <?php    
    }    
    
  }
else
{
    header("location:index2.php");
}
    
}
    $con -> close();

?>
</body>
</html>
