<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>aws</title>
	<style>
			#loadingcek{
				background:#0000 url(image/loader.gif) no-repeat center center;
				z-index: 1000;
				position: relative;
				height: 100px;
				display: block;
				margin-left: auto;
				margin-right: auto;
				width: 50%;
			}
	</style>
	<!--
	<link rel="stylesheet" href="css/jquery-ui.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery-ui.js"></script>-->
	<?php echo "
	<script>
	$(document).ready(function(){
		var datatgl2 = new Date() ;
		datatgl2.setDate(datatgl2.getDate() - 1);
		//console.log(datatgl2);
		var ytgl1 = datatgl2.getFullYear();
		var mtgl1 = datatgl2.getMonth();
		var dtgl1 = datatgl2.getDate();		
		
		mtgl1 = mtgl1 + 1;

		if (dtgl1 < 10) {
			dtgl1 = '0' + dtgl1;
		}
		
		if (mtgl1 < 10) {
			mtgl1 = '0' + mtgl1;
		}
		
		var datatgl = ytgl1+'-'+mtgl1+'-'+dtgl1 ;
		
		$.ajax({
			type: 'post',
			url: 'scrp/scrphp/awsi.php',
			data: { datatgl : datatgl, id : '";
			echo $_GET['id']."', lat :'".$_GET['lat']."', lon :'".$_GET['lon'];
			echo "'},
			success: function(data){
			   $('#response').html(data);
			}
		})			
	})

		$( function() {
			$( '#datepicker' ).datepicker( {
				maxDate: 0, 
				dateFormat: 'dd/mm/yy',
				onSelect: function(){
						var datatgl1 = $(this).datepicker('getDate');
						var ytgl = datatgl1.getFullYear();
						var mtgl = datatgl1.getMonth();
						var dtgl = datatgl1.getDate();
						
						mtgl = mtgl + 1;

		                if (dtgl < 10) {
		                    dtgl = '0' + dtgl;
		                }
		                if (mtgl < 10) {
		                    mtgl = '0' + mtgl;
		                }

		                var datatgl = ytgl+'-'+mtgl+'-'+dtgl ;
						
						$.ajax({
							type: 'post',
							url: 'scrp/scrphp/awsi.php',
							data: { datatgl : datatgl, id : '";
					echo $_GET['id']."', lat :'".$_GET['lat']."', lon :'".$_GET['lon'];
							echo "'},
							success: function(data){
						       $('#response').html(data);
						      }
						});
					}
			});
		} );		
	</script>";
	?>
	<script>
	$(document).ready(function(){
			  $('#loadingcek').fadeOut(2000);
		});	
	</script>
</head>
<body>
<?php// echo $_GET["id"]; ?>
	<input type="text" id="datepicker" value="Pilih Tanggal"><br><br>
	<div id='loadingcek'></div>
	<div id='response'></div>
</body>
</html>