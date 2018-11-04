<!DOCTYPE html>
<html>
    <head>
        <style>
            .center { 
                height: 50px;
                position: relative;
                border: 3px solid green; 
            }
            
            .center span {
                margin: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }
            .tab { 
                   display:inline-block; 
                   margin-left: 40px; 
            }
        </style>
    </head>
	<body>
		<center>
    		<h1>ADMIN LOGIN</h1>
    		<p>
    			<a href="first.php?data=2">LISTINGS<a/> 
    			<a href="login.php" class = "tab">ADMIN<a/> 
    		</p>
    		<form action="first.php" method="post" enctype="multipart/form-data" >
    			<span class="center">Administration key:</span><br>
    		    <br>
    			<input type="text" name="user" >
    			<input type="submit" value="login" name=
    			"sub">
    		</form>
		</center>
	</body>
</html>