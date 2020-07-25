
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

<div class="slide-down">
    <img src="wave%20(4).png">
</div>

    <div class="container">
        <div class="log p-5">
                            <h3>LOG IN</h3><br>
            <form autocomplete="off" action="log.php" method="POST">
                <input class="input" name="id" type="text" placeholder="user Id"><br><br>
                <input class="input" name="pass" id="pass" checked="false" type="password" placeholder="password">
                   <input type="checkbox" class="check" onclick="myFunction()"><br><br>
                <input class="input sub" type="submit" name="sub" value="LOG IN"><br><br>
                <a href="index2.php"><h6>Sign Up..!!</h6></a><br><br>
            </form>
            
        </div>
    </div>
</body>
</html>
