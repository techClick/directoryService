
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
            	padding: 6rem 0 0 0rem;
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
		    <h1>BUSINESS DIRECTORY SERVICE</h1>
    		<p>
    			<?php
    				$data = $_GET["data"];
        			$admins = "MTL456";
        			if( $_POST["user"] == $admins ){
        			    $data = 1;
        			}else if( $_POST["sub"] != NULL ){
        				echo( "WRONG!! If YOU ARE NOT ADMIN QUIT NOW!, WEVE STORED YOUR LOCATION<br> AND WILL TRACK YOU!!" );
        				echo( "<br>" );
        			}
    				echo('<a href="first.php?data='.$data.'"><u>LISTINGS</u><a/>');
    				if ($data == 1) { 
    					echo('<a href="createlist.php" class="tab"><u>CREATE</u><a/>');
    					echo('<a href="first.php" class="tab"><u>LOG OUT</u><a/>'); 	
    				}else{		
    					echo('<a href="login.php" class="tab"><u>ADMIN</u><a/>');	
    				}
    			?>
    		</p>
    		<form action="<?php echo('first.php?data='.$data);?>" method="post" enctype="multipart/form-data" >
    			<span>Search</span>
    			<input type="text" name="search" >
    			<input type="submit" value="Submit" >
    		</form> 
    		<?php
    			//$data = $_GET["data"];
    			if ($data == 1) {
    				echo('<span><h2>VIEWING AS ADMIN</h2></span>'); 		
    			}
    			$databaseID = array();
    			$databaseNames = array();
    			$databaseCat = array();
    			$databasePic = array();
    			$databaseDesc = array();
            	$host = "localhost";
            	$username = "id4770849_workceo";
            	$password = "delabEGO234";
            	$db_name = "id4770849_work";
    			$con = mysqli_connect( "$host", "$username", "$password", "$db_name" ) or die("cannot connect1");
    		  
    			$sql = "SELECT ID, name, category, pictures, description FROM listing";
    			$result = mysqli_query( $con , $sql )
    			or die ('Error getting data 11');
    			$json = array();
    			if( mysqli_num_rows($result)){
    				while($row = mysqli_fetch_row($result)){
    					$json[] = $row;
    				}
    			}
    			//$json[3] = unserialize($json[3]);
    			//var_dump($json);
    			$searchWords = $_POST["search"];
    			for($i=0;$i<count($json);$i++){
    			    if ($searchWords!=NULL){
    			        if (strpos(strtolower($json[$i][1]),strtolower($searchWords)) !== false || strpos(strtolower($json[$i][4]),strtolower($searchWords)) !== false ) {
            			    $databaseID[] = $json[$i][0];
                    		$databaseNames[] = $json[$i][1];
                    		$databaseCat[] = $json[$i][2];
                    		$databasePic[] = unserialize( $json[$i][3] );
                    		$databaseDesc[] = $json[$i][4];
                        }
    			    }else{
        			    $databaseID[] = $json[$i][0];
                		$databaseNames[] = $json[$i][1];
                		$databaseCat[] = $json[$i][2];
                		$databasePic[] = unserialize( $json[$i][3] );
    			    }
    			}
    			if (count($databaseID) == 0){
    			    if ($searchWords!=NULL){
    			        echo("<span><br>No Results<br>Try narrowing down your search<br></span>");
    			    }else{
    			        echo("<span><br>NOTHING TO SHOW<br>We are working to deliver this service, bear with us!<br></span>");
    			    }
    			    die();
    			}else if($searchWords!=NULL){
    			    echo("<span><br>Searching for listings containing \"".$searchWords."\".<br>");
    			    echo(count($databaseID)." Result(s)<br></span>");
    			}
			    $databaseID = array_reverse($databaseID);
        		$databaseNames = array_reverse($databaseNames);
        		$databaseCat = array_reverse($databaseCat);
        		$databasePic = array_reverse($databasePic);
    			for ($i=0;$i<count($databaseNames);$i++){
    				if($i==0 ){
    				    if ($data!=1){
    					    echo("<br>");
    				    }
    				}else{
    				    echo("<br>");
    				}
    				echo( "<div class='center'><h3><p>".$databaseNames[$i]."</p></h3></div><br>" );
    				for ($j=0;$j<count($databasePic[$i]);$j++){
    					$thisSrc = "Pictures/".$databasePic[$i][$j];
    					
    					//echo( "<span>showing ".$thisSrc."<br></span>");
    					echo( '<img src='.$thisSrc.' width="90" height="90"/>' );
    				}
    				echo( "<br><span>INDUSTRY: ".$databaseCat[$i]."</span><br></td>");
    				if ($data==1){	
    					echo( "<a href='selectadmin.php?
    						sel=".$databaseID[$i]."'><u>->Edit</u><a/>");
    				}else{
    					echo( "<a href='selected.php?
    						sel=".$databaseID[$i]."'><u>->View this listing</u><a/>");
    				}
    				echo("<br>");
    			}	
    			echo("<br><br><br><br><br>");
    			
    			mysqli_close($con);
    		?>
    	</center>	
	</body>
</html>