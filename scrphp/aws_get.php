<?php
include "../../lpn_cnnect.php";

$sql = "SELECT DISTINCT station, latitude, longitude FROM aws_bmkg";
//$sql = "SELECT json_object('station', station, 'latitude', latitude ,'longitude', longitude) as json_aws  FROM aws_bmkg";
$hasil = $conn->query($sql);

if ($hasil->num_rows != null){
	$arrdat = [];
	$arrdat["AWS"] = [];
	while ($row = $hasil->fetch_assoc()) {
        //echo "{".$row["station"] .", ". $row["latitude"] .", ". $row["longitude"]."} ,";
	        $h["station"] = $row["station"];
	        $h["latitude"] = $row["latitude"];
	        $h["longitude"] =  $row["longitude"];
	        array_push($arrdat["AWS"], $h);
	    }
    	echo json_encode($arrdat);
    } else {
    	$response["message"]="tidak ada data";
  		echo json_encode($response);
    } 
mysqli_close($conn);
?>