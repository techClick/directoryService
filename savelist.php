<!DOCTYPE html>
<html>
    <head>
        <style>
                    @import url(https://fonts.googleapis.com/css?family=Roboto:400,700);
            
            :root {
            	/* Base font size */
            	font-size: 10px;
            
            	/* Heading height variable*/
            	--heading-height: 30em;
            }
            
            body {
            	font-family: "Roboto", Arial, sans-serif;
            	min-height: 100vh;
            	background-color: #101010;
            }
            
            u {
            	font-size: 16px;
            }
            
            header {
            	position: fixed;
            	width: 100%;
            	height: var(--heading-height);
            }
            
            /* Create angled background with 'before' pseudo-element */
            header::before {
            	content: "";
            	display: block;
            	position: absolute;
            	left: 0;
            	bottom: 6em;
            	width: 100%;
            	height: calc(var(--heading-height) + 10em);
            	z-index: -1;
            	transform: skewY(-3.5deg);
            	background: 
            		linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)),
            		url(https://images.unsplash.com/photo-1495464101292-552d0b52fe41?auto=format&fit=crop&w=1350&q=80) no-repeat center,
            		linear-gradient(#4e4376, #2b5876);
            	background-size: cover;
            	border-bottom: .2em solid #fff;
            }
            
            h1 {
            	font-size: calc(2.8em + 2.6vw);
            	font-weight: 700;
            	letter-spacing: .01em;
            	padding: 10rem 0 0 0rem;
            	text-shadow: .022em .022em .022em #111;
            	color: #fff;
            }
            
            main {
            	padding: calc(var(--heading-height) + 1.5vw) 4em 0;
            }
            
            p {
            	font-size: calc(2em + .25vw);
            	font-weight: 400;
            	line-height: 2;
            	margin-bottom: 1.5em;
            	color: #fcfcfc;
            }
            span {
            	font-size: calc(1.5em + .25vw);
            	font-weight: 400;
            	line-height: 2;
            	margin-bottom: 1.5em;
            	color: #fcfcfc;
            }
    
            .center { 
                height: 45px;
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
    				echo("<span>ERROR! Not enought data to create listing.<br>Asteriks(*)
    				     denote mandatory fields</span>");
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
    						echo( "<span>".$errorText."</span>" );
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
    			or die ( "<span>Error</span>" );	
    			echo("<span>NEW BUSINESS ".$databaseNames." IS CREATED</span>");
    			mysqli_close($con);
    			echo( "<form action='first.php?data=1' method='post'> 
    			        <br><input type='submit' value='Continue'/></form>" );
    			
    		?>
		</center>
	</body>
</html>