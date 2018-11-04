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
    		<h1>NEW LISTING !ADMIN!</h1>
    		<p>
    			<a href="first.php?data=1"><u>LISTINGS</u><a/>
    			<a href="createlist.php" class="tab"><u>CREATE</u><a/>
    			<a href="first.php" class="tab"><u>LOG OUT</u><a/>
    		</p>
    		<br>
    		<?php
    		    $sel = $_GET["sel"];
    			if ( $_POST["name"] != NULL && $_POST["desc"] != NULL && $_POST["cat"]!=NULL){
    				$databaseNames = $_POST["name"];
    				$databaseDesc = $_POST["desc"];		
    			}else{
    				echo("ERROR! Not enought data to create listing.<br>Asteriks(*)
    				     denote mandatory fields");
    			    echo( "<form action='createlist.php?' method='post'> 
    			        <br><input type='submit' value='Continue'/></form>" );
    				die();
    			}
    			$databaseAddress = $_POST["add"];
    			$databasePhone = $_POST["phone"];
    			$databaseUrl = $_POST["url"];
    			$databaseCat = $_POST["cat"];	
    			$databasePicTmp = array();
    			
    			
    			function savePicture(){
    			    
    				if ( $_FILES["pic"]["name"][0] == NULL ) {
    				    return true;
    				}
    				for ($i=0;$i<count($_FILES["pic"]["name"]);$i++){
    					
    					$target_dir = "Pictures/";
                        $files = scandir($target_dir);
                        $picturesHere = count($files)-1;
    					$pathHere = $_FILES["pic"]["name"][$i];
    					$extension = strtolower( pathinfo($pathHere, PATHINFO_EXTENSION) );
    					global $databasePicTmp;
    					$databasePicTmp[] = "picture".$picturesHere.".".$extension;
    					$target_file = $target_dir.end($databasePicTmp);
    					$uploadOk = 1;
    					$errorText = "";
    					if(isset($_POST["submit"])) {
    						$check = getimagesize($_FILES["pic"]["tmp_name"][$i]);
    						if($check !== false) {
    							$errorText = "File is an image - " . $check["mime"] . ".";
    							$uploadOk = 1;
    						} else {
    							$errorText = "File is not an image.";
    							$uploadOk = 0;
    						}
    					}
    					if ($_FILES["pic"]["size"][$i] > 50000000) {
    						$errorText = "Sorry, your file is too large.";
    						$uploadOk = 0;
    					}
    					if($extension != "jpg" && $extension != "png" && $extension != "jpeg"
    					&& $extension != "gif" ) {
    						$errorText = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    						$uploadOk = 0;
    					}
    					if ($uploadOk == 0) {
    					} else {
    						if (move_uploaded_file($_FILES["pic"]["tmp_name"][$i], $target_file)) {
    							chmod( $target_file , 0777 );
    							$errorText = "The file ". basename( $_FILES["pic"]["name"][$i]). " has been uploaded.";
    						} else {
    							$errorText = "Sorry, there was an error uploading file ".$i;
    							$uploadOk = 0;
    						}
    					}
    					if ($uploadOk == 0) {
    						echo( $errorText );
    			            echo( "<form action='createlist.php' method='post'> 
    			                <br><input type='submit' value='Continue'/></form>" );
    			            die();
    					}
    				}
    			}
    			savePicture();           	
    			$host = "localhost";
            	$username = "id4770849_workceo";
            	$password = "delabEGO234";
            	$db_name = "id4770849_work";
    			$con = mysqli_connect( "$host", "$username", "$password", "$db_name" ) or die("cannot connect");
    			
    			$databaseNames = mysqli_real_escape_string( $con, $databaseNames );
    			$databaseDesc = mysqli_real_escape_string( $con, $databaseDesc );	
    			$databaseAddress = mysqli_real_escape_string( $con, $databaseAddress );
    			$databasePhone = mysqli_real_escape_string( $con, $databasePhone );
    			$databaseUrl = mysqli_real_escape_string( $con, $databaseUrl );
    			$databaseCat = mysqli_real_escape_string( $con, $databaseCat );
    			$databasePicTmp2 = array();
    			for($i=count($databasePicTmp)-1;$i>count($databasePicTmp)-6&&$i>=0;$i--){
        			$databasePicTmp2[] = $databasePicTmp[$i];
    			}
    			$databasePic = serialize( $databasePicTmp2 );	
    			$sql = "INSERT INTO listing ( name , description , address , phone , urlink , category , pictures , views ) 
    				VALUES ( '".$databaseNames."' , '".$databaseDesc."' , '".$databaseAddress."' ,
    				'".$databasePhone."' , '".$databaseUrl."' , '".$databaseCat."' , '".$databasePic."' , 0 )";
    			$result = mysqli_query( $con , $sql )
    			or die ( "Error" );	
    			echo("NEW BUSINESS ".$databaseNames." IS CREATED");
    			
    			echo( "<form action='first.php?data=1' method='post'> 
    			        <br><input type='submit' value='Continue'/></form>" );
    			
    		?>
		</center>
	</body>
</html>