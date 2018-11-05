
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
    		<h1>BUSINESS LISTING</h1>
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
    			$picFields = array();
    			$picFields = unserialize( $allFields[0][7] );
    			for ($j=0;$j<count($picFields);$j++){
					$thisSrc = "Pictures/".$picFields[$j];
					echo( '<img src="'.$thisSrc.'" width="230" height="230"/>' );
				}
    			echo( "<span><h3 class='center'>".$allFields[0][1]."</h3></span><span>".$allFields[0][6]."</span>");
    			echo("<br>");
    			echo( "<span>".$allFields[0][3]."<br></span>");
    			//echo("<br><br>");	
    			echo( "<span>".$allFields[0][2]."<br></span>");
    			echo( "<span>".$allFields[0][4]."<br></span>");
    			echo( "<span>".$allFields[0][5]."<br></span>");
    			
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
			    echo("<br><br><br>");
			    echo("<br><br><br>");
			    echo("<br><br><br>");
    		?>
    	</center>
	</body>
</html>