var abc;
var markergrup;

$("#aws").change(function(){
	if(this.checked){
		markergrup = L.layerGroup().addTo(mymap);
	var iconaws = L.icon({
		iconUrl:'image/aws.ICO',
		iconSize:[25,25]		
	});
	
	$.ajax({
        url : 'scrp/scrphp/aws_get.php',
        success: function(response){            
			datajson = JSON.parse(response);
			for (a=0; a < datajson.AWS.length; a++){
				var latitude = datajson["AWS"][a]["latitude"];
				var longitude = datajson["AWS"][a]["longitude"];
					abc = L.marker([latitude, longitude], {icon: iconaws});
				var station = datajson["AWS"][a]["station"];
				abc.addTo(markergrup).bindPopup(station  + "<br> <center><a href='scrp/scrphp/kirim_tgl.php?id="+station+"&lat="+latitude+"&lon="+longitude+"' rel='modal:open' >Detail...</a></center>");		
			}			
        }
    })
	} else {
		markergrup.removeLayer(abc);
        mymap.removeLayer(markergrup); 
	}		
});