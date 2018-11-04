
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
    		<br>
    		<?php
    			$admins = "InnocentO456";
    			if( $_POST["user"] == $admins ){
    				echo( "SUCCESS!!" );
    				header('Location: first.php?data=1');
    			}else{
    				echo( "WRONG!! QUIT NOW!, WEVE STORED YOUR LOCATION<br> AND WILL TRACK YOU!!" );
    				echo( "<br><button type='submit' formaction ='workMotus/adminloginpage.php'>Im Admin</button>" );
    			}
    		?>
		</center>
	</body>
</html>