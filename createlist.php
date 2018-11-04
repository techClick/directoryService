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
        <h1>CREATE BUSINESS LISTING</h1>
		<p>
			<a href="first.php?data=1"><u>LISTINGS</u><a/>
			<a href="first.php" class="tab"><u>LOG OUT</u><a/>
		</p>
        <br><br>
        <form action="savelist.php" method="post" enctype="multipart/form-data" >
            NAME*:<br>
            <input type="text" name="name" >
            <br><br>
            DESCRIPTION*:<br>
            <textarea type = "text" name="desc" rows="10" cols="40"></textarea>
            <br><br>
            ADDRESS:<br>
            <input type="text" name="add" >
            <br><br>
            MOBILE:<br>
            <input type="text" name="photo" >
            <br><br>
            URL:<br>
            <input type="text" name="url" >
            <br><br>
            CATEGORY*:<br>
            <input type="text" name="cat" >
            <br><span>Seperate each category with a comma e.g; ICT, Engineering, e.t.c<br></span>
    		<br><br>
    		PICTURES:<br>
    		<input type="file" name="pic[]" multiple>
    		<br>
    		Drag mouse over multiple pictures or hold Ctrl/Shift button and select multiple pictures.<br>
    		Only five(5) pictures allowed. 
    		<br>
            <br><br>
            <input type="submit" value="Submit">
            <br><br>
            <br><br>
            <br><br>
            <br><br>
        </form> 
        </center>
    </body>
</html>