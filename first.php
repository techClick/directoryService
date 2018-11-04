

<!DOCTYPE html>

<!–– 
	This Listings' search API is AVAILABLE at:

	'https://www.jubeeapps.000webhostapp.com/workMotus/MTLsearchAPI/searchlistings.php?key="YourKey"&search="SearchCriterea"';
	Where "YourKey" is the six digit authorization key issued to registered users by the company hosting the business listing API(MTL), 
	use**MTL345**.
	And "SearchCriterea" is the search criterea for the business the user is looking for.

	This search API RETURNS:

	Encoded Json Array as;
	Output=}Array(5)[Array("x"),Array("x"),Array("x"),Array("x"),Array("x"),Array("x")],
	where "x" is the number of search results in similar order.

	Note:Array references are;
	Output=}Array(5)[search_result_names,search_result_categories,search_result_description,search_result_address,
	search_result_number,search_result_url].

	This search API ERRORS REPORT:

	MTL Regiseration Key Error as;
	Output=}Array(1)["Key Error" , "nil"].
	
	And empty search Criterea as;
	Output=}Array(1)["Error, Empty search" , "nil"].

-->
<html>
    <head>
        <style>
        .center { 
            height: 30px;
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
        				echo( "<br><br>" );
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
    			Search
    			<input type="text" name="search" >
    			<input type="submit" value="Submit" >
    		</form> 
    		<?php
    			//$data = $_GET["data"];
    			if ($data == 1) {
    				echo('<center><p><h3>VIEWING AS ADMIN</h1></p></center>'); 		
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
    			        echo("<br>No Results<br>Try narrowing down your search<br>");
    			    }else{
    			        echo("<br>NOTHING TO SHOW<br>We are working to deliver this service, bear with us!<br>");
    			    }
    			    die();
    			}else if($searchWords!=NULL){
    			    echo("<br>Searching for listings containing \"".$searchWords."\".<br>");
    			    echo(count($databaseID)." Result(s)<br>");
    			}
			    $databaseID = array_reverse($databaseID);
        		$databaseNames = array_reverse($databaseNames);
        		$databaseCat = array_reverse($databaseCat);
        		$databasePic = array_reverse($databasePic);
    			for ($i=0;$i<count($databaseNames);$i++){
    				if($i==0){
    					echo("<br>");
    				}else{
    				    echo("<br>");
    				}
    				echo( "<div class='center'><h3><p>".$databaseNames[$i]."</p></h3></div><br>" );
    				for ($j=0;$j<count($databasePic[$i]);$j++){
    					$thisSrc = "Pictures/".$databasePic[$i][$j];
    					echo( '<img src="'.$thisSrc.'" width="90" height="90"/>' );
    				}
    				echo( "<br>INDUSTRY: ".$databaseCat[$i]."<br></td>");
    				if ($data==1){	
    					echo( "<a href='selectadmin.php?
    						sel=".$databaseID[$i]."'><u>->Edit</u><a/>");
    				}else{
    					echo( "<a href='selected.php?
    						sel=".$databaseID[$i]."'><u>->View listing</u><a/>");
    				}
    				echo("<br>");
    			}	
    		?>
    	</center>	
	</body>
</html>