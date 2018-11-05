<?php
	$keyAccess = "MTL456";
	if( $_GET["key"] == $keyAccess ){
	}else {
        $emptyJson = array("Key Error" , "nil");
        echo(json_encode($emptyJson));
		die();
	}
	if( $_GET["search"] == NULL ){
        $emptyJson = array("Error. Empty Search" , "nil");
        echo(json_encode($emptyJson));
		die();
	}
	$databaseNames = array();
	$databaseCat = array();
	$databasePic = array();
	$databaseDesc = array();
	$host = "localhost";
	$username = "id4770849_workceo";
	$password = "delabEGO234";
	$db_name = "id4770849_work";
	$con = mysqli_connect( "$host", "$username", "$password", "$db_name" ) or die("cannot connect1");
  
	$sql = "SELECT phone, name, category, urlink, description, address FROM listing";
	$result = mysqli_query( $con , $sql )
	or die ('Error getting data 11');
	$json = array();
	if( mysqli_num_rows($result)){
		while($row = mysqli_fetch_row($result)){
			$json[] = $row;
		}
	}
	
    $searchWords = $_GET["search"];
    for($i=0;$i<count($json);$i++){
        if (strpos(strtolower($json[$i][1]),strtolower($searchWords)) !== false || strpos(strtolower($json[$i][4]),strtolower($searchWords)) !== false ) {
    		$databasePhone[] = $json[$i][0];
    		$databaseNames[] = $json[$i][1];
    		$databaseCat[] = $json[$i][2];
    		$databaseUrl[] = $json[$i][3];
    		$databaseDesc[] = $json[$i][4];
    		$databaseAdd[] = $json[$i][5];
        }
    }
    $allFields = array($databaseNames,$databaseCat,$databaseDesc,$databaseAdd,$databasePhone,$databaseUrl);
    $json = json_encode($allFields);
    echo($json);
?>