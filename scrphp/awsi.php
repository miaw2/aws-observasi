<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Data AWS PSTA LAPAN</title>
        <link href="image/sadewa.ico" rel="shortcut icon">
		<style type="text/css"></style>
        <link rel="stylesheet" href="../../images/fontawesome-free-5.0.6/on-server/css/fontawesome.min.css">
        <link rel="stylesheet" href="../../css/jquery-ui.css">
		<style>
			
		</style>
	</head>
	<body>
<script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>
<?php
include "../../lpn_cnnect.php";

$nama_tion = $_POST["id"];
$getlat = $_POST["lat"];
$getlon = $_POST["lon"];
$aws =$_POST["datatgl"];

$sql = "select station, waktu_aws, rain from aws_bmkg where station = '".$nama_tion."' and waktu_aws like '" .$aws."%'";
$sql1 =  "select rain from aws_bmkg where station = '".$nama_tion."' and waktu_aws like '" .$aws."%'";

$hasil = $conn->query($sql);
$hasil1 = $conn->query($sql1);

$arraykos = [];
$arraytgl = [];

for ($i = 0; $i < 24; $i++) { 
	$sql2 = "select sum(rain) as totjan from aws_bmkg where station = '".$nama_tion."' and waktu_aws like '".$aws." ".sprintf("%'.02d",$i)."%'";

	$hasil2 = $conn -> query($sql2);
	$hasils2 = mysqli_fetch_assoc($hasil2);

	$totjan = $hasils2["totjan"];
	if (is_null($totjan)){
		$totjan = 'null';
	} 
	array_push($arraytgl, $aws." ".sprintf("%'.02d",$i).":00:00");
	array_push($arraykos, $totjan); 
}
?>
<div id="container" style="width: 95%; height: 80%; margin: 40 auto">
		<script type="text/javascript">
				Highcharts.chart('container', {

			    title: {
			        text: 'Curah Hujan AWS' 
			    },

			    subtitle: {
			        text: 'Lokasi: <?php echo $nama_tion; ?> ( latitude : <?php echo $getlat;?> || longitude : <?php echo $getlon;?> )'
			    },
			    xAxis: {
                    title: {
                        text: 'Tanggal & Jam (UTC)'
                    },
                    categories: 
                    [<?php 
                    for ($i = 0; $i < 24; $i++) { 
                    		echo "'".$arraytgl[$i]."' ,";
                    }
                    ?>]
                },
			    yAxis: {
			        title: {
			            text: 'Nilai'
			        },
                    labels: {
                        formatter: function () {
                            return this.value;
                        }
                    }
			    },
			    legend: {
			        layout: 'vertical',
			        align: 'right',
			        verticalAlign: 'middle'
			    },

			    credits: {
                        enabled: false
                },

			    series: [{
			        name: 'AWS',
					color:'#90ED7D',
			        data: [ 
			        <?php
                        for ($i = 0; $i < 24 ; $i++) { 
                        		echo $arraykos[$i]." ,";                     	
                        }
			        ?>
			        ]	
			    }]
			});               
		</script>
	</div>
</body>
</html>