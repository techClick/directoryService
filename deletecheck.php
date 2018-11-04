<!DOCTYPE html>
<html>
    <head>
        <style>
        .center { 
            height: 50px;
            position: relative;
            border: 3px solid green; 
        }
        
        .center p {
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
    		<h1>!ADMIN!</h1>
    		<p>
    			<a href="first.php?data=1"><u>LISTINGS</u><a/>
    			<a href="createlist.php" class="tab"><u>CREATE</u><a/>
    			<a href="first.php" class="tab"><u>LOG OUT</u><a/>
    		</p>
            <br><br>
    		<?php
    			$selected = $_GET["sel"];
    			$companyName = $_GET["data"];
    			echo( "ARE YOU SURE YOU WANT TO DELETE ".$companyName."?" );
    			echo( "<br><form action='jubeeapps.xyz' method='post' enctype='multipart/form-data' ><br>
    			        <button type='submit' 
    			        formaction='deletelist.php?sel=".$selected."&data=".$companyName."'>Yes</button>
        			    <button type='submit' formaction='selectadmin.php?sel=".$selected."' class='tab'>No</button>" );
    		?>
		</center>
	</body>
</html>