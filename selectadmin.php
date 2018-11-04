
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
            <?php
    			$selected = $_GET["sel"];
    			$allFields = array();		
    				
            	$host = "localhost";
            	$username = "id4770849_workceo";
            	$password = "delabEGO234";
            	$db_name = "id4770849_work";
    			$con = mysqli_connect( "$host", "$username", "$password", "$db_name" ) or die("cannot connect1");
    		  
    			$sql = "SELECT * FROM listing WHERE ID = '".$selected."'";
    			$result = mysqli_query( $con , $sql )
    			or die ('Error getting data 1');
    			if( mysqli_num_rows($result)){
    				while($row = mysqli_fetch_row($result)){
    					$allFields[] = $row;
    				}
    			}
    		?>
    		<h1>EDIT <?php echo(strtoupper($allFields[0][1])); ?> BUSINESS LISTING !ADMIN!</h1>
    		<p>
    			<a href="first.php?data=1"><u>LISTINGS</u><a/>
    			<a href="createlist.php" class="tab"><u>CREATE</u><a/>
    			<a href="first.php" class="tab"><u>LOG OUT</u><a/>
    		</p>
    		<br><br>
    		<?php
            	$host = "localhost";
            	$username = "id4770849_workceo";
            	$password = "delabEGO234";
            	$db_name = "id4770849_work";
    			$con = mysqli_connect( "$host", "$username", "$password", "$db_name" ) or die("cannot connect1");
    		  
    			$sql = "SELECT views FROM listing WHERE ID ='".$selected."'";
    			    $result = mysqli_query( $con , $sql )
    			or die ('Error getting data 11');
    			$dbdata = array();
    			if( mysqli_num_rows($result)){
    				while($row = mysqli_fetch_row($result)){
    					$dbdata[] = $row;
    				}
    			}
    			$views = $dbdata[0][0];
    		?>
    		<form action="<?php echo( 'updatelist.php?sel='.$selected.'&image='.urlencode($allFields[0][7]) ); ?>" method="post" enctype="multipart/form-data" >
    		    <?php
        			if ( $views == 1 ){
        			    echo("THIS LISTING HAS ".$views." VIEW<br>
        			    Note: Views are made by non-Admin<br><br>");
        			}else{
        			    echo("THIS LISTING HAS ".$views."  VIEWS<br>
        			    Note: Views are made by non-Admin<br><br>");
        			}
        		?>
    			COMPANY NAME*:<br>
    			<input type="text" name="name" value="<?php echo($allFields[0][1]);?>" >
    			<br><br>
    			DESCRIPTION*:<br>  
    			<textarea type = "text" name="desc" rows="10" cols="40"><?php echo($allFields[0][2]);?></textarea>
    			<br><br>
    			ADDRESS:<br>
    			<input type="text" name="add" value="<?php echo($allFields[0][3]);?>" >
    			<br><br>
    			PHONE:<br>
    			<input type="text" name="phone" value="<?php echo($allFields[0][4]);?>" >
    			<br><br>
    			URL:<br>
    			<input type="text" name="url" value="<?php echo($allFields[0][5]);?>" >
    			<br><br>
    			CATEGORY*:<br>
    			<input type="text" name="category" value="<?php echo($allFields[0][6]);?>" >
    			<br>
    			Seperate each category with a comma e.g; ICT, Engineering, e.t.c<br>
    			<br>
    			<?php
        			$picFields = array();
        			$picFields = unserialize( $allFields[0][7] );
        			for ($j=0;$j<count($picFields);$j++){
    					$thisSrc = "Pictures/".$picFields[$j];
    					echo( '<img src="'.$thisSrc.'" width="130" height="130"/>' );
    				}
    			?>
    			<br><br>
    			LOAD MORE PICTURES:<br>
    			<input type="file" name="pic[]" multiple>
    			<br>
    			Drag mouse over multiple pictures or hold Ctrl/Shift button and select multiple pictures.<br>
    			only five(5) pictures allowed. 
    			<br>
    			<br><br>
    			<input type="submit" value="Update">
    		    <button type="submit" formaction ="<?php echo( 'deletecheck.php?sel='.$_GET["sel"].'&data='.$allFields[0][1] ) ?>" class = "tab">Delete</button><br><br>
    			<br><br>
    			<br><br>
    		</form> 
		</center>
	</body>
</html>