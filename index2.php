<?php 
session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="index.js"></script>
<link rel="stylesheet" href="index.css">
<title>|Review|</title>
</head>

<body>
<style>

}
</style>

<div class="slide-down">
    <img src="wave%20(4).png">
</div>

    <div class="container">
        <div class="log p-5">
            <form autocomplete="off" action="reg.php" method="post">
                <h3>SIGN UP</h3><br>
                <input class="input" type="text" placeholder="Name" ><br><br>
                <input class="input"  type="text" placeholder="Email" name="email"><br><br>
                <input class="input"  type="text" placeholder="Mobile No"><br><br>
                <input class="input"  type="text" placeholder="Password" name="pass"><br><br>
                <input class="input sub" type="submit" name="sub" value="SIGN UP"><br><br>
                <a href="index.php"><h6>Log In..!!</h6></a>
                
            </form>
        </div>
    </div>
</body>
</html>