
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
    		<h2>BUSINESS LISTING</h2>
    		<p>
    			<a href="first.php"><u>LISTINGS</u><a/>
    			<a href="login.php" class="tab"><u>ADMIN</u><a/>
    		</p>
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
    			echo( "<br>");
    			$picFields = array();
    			$picFields = unserialize( $allFields[0][7] );
    			for ($j=0;$j<count($picFields);$j++){
					$thisSrc = "Pictures/".$picFields[$j];
					echo( '<img src="'.$thisSrc.'" width="230" height="230"/>' );
				}
    			echo( "<h3 class='center'><p>".$allFields[0][1]."</p></h3>".$allFields[0][6]);
    			echo("<br><br>");
    			echo( $allFields[0][3]."<br>");
    			//echo("<br><br>");	
    			echo( $allFields[0][2]."<br>");
    			echo( $allFields[0][4]."<br>");
    			echo( $allFields[0][5]."<br>");
    			
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
    			$views = $dbdata[0][0] + 1;
    			$sql = "UPDATE listing SET views = '".$views."' WHERE ID='".$selected."'";
    			    $result = mysqli_query( $con , $sql )
    			or die ('Error getting data 11');
			    mysqli_close($con);
    		?>
    	</center>
	</body>
</html>