
$( "#draggable" ).draggable({
	containment: "parent"
});
$( "#draggable" ).hide();

$( "#draggable1" ).draggable({
	containment: "parent"
});
$( "#draggable1" ).hide();

$( "#draggable2" ).draggable({
	containment: "parent"
});
$( "#draggable2" ).hide();

$( "#draggable3" ).draggable({
	containment: "parent"
});
$( "#draggable3" ).hide();

var bou = [[-15, 110], [-5, 130]];
var bou1 = [[20, 110], [30, 140]];
var bou2 = [[5, 100], [15, 130]];
var bou3 = [[10,50],[-10,70]];
var bou4 = [[0,90],[-10,110]];

var r0 = L.rectangle(bou, {color: "#ff7800", weight: 1});
var r1 = L.rectangle(bou1, {color: "#ff7800", weight: 1});
var r2 = L.rectangle(bou2, {color: "#ff7800", weight: 1});
var r3 = L.rectangle(bou3, {color: "red", weight: 1});
var r4 = L.rectangle(bou4, {color: "red", weight: 1});
boundings = [[-9.50, 75.00], [25.990, 135.00]];

$("#monsoon").change(function(){
	if (this.checked){
		mymap.fitBounds(boundings);
		$("#draggable").toggle();
		$("#draggable1").toggle();
		r0.addTo(mymap).bindPopup("AUSM: 110-130E,15S-5S");
		r1.addTo(mymap).bindPopup("WNPM 2: 110E-140E,20N-30N");
		r2.addTo(mymap).bindPopup("WNPM 1: 100E-130E,5N-15N");
		$('#keter').html(" Keterangan 'Indeks Monsoon': <br><br> Menunjukkan perubahan musiman sirkulasi atmosfer dan curah hujan terkait dengan pemanasan daratan dan lautan. <br>WNPM Index = U850(1)-U850(2); AUSM Index = U850. Klik area untuk koordinat. <br>Sumber: APDRC. ").show();
		$('#keter').fadeOut(10000);
	} else {
		$("#draggable").toggle();
		$("#draggable1").toggle();
		r0.removeFrom(mymap);
		r1.removeFrom(mymap);
		r2.removeFrom(mymap);
	}
});

$("#iod").change(function(){
	if (this.checked){
		mymap.fitBounds(boundings);
		$("#draggable2").toggle();
		r3.addTo(mymap).bindPopup("IOD 1");
		r4.addTo(mymap).bindPopup("IOD 2");
		$('#keter').html(" Keterangan 'Indeks IOD': <br> Menunjukkan perubahan selisih suhu permukaan laut di Samudra Hindia yang mempengaruhi pola suhu dan hujan di Indonesia bagian barat. Nilai IOD positif menunjukkan curah hujan yang lebih sedikit dibanding IOD negatif. <br>Sumber: BOM.  ").show();
		$('#keter').fadeOut(10000);
	} else {
		$("#draggable2").toggle();
		r3.removeFrom(mymap);
		r4.removeFrom(mymap);
	}
})

$("#mjo").change(function(){
	if (this.checked){
		//mymap.fitBounds(boundings);
		$("#draggable3").toggle();
		$('#keter').html(" Keterangan 'MJO': <br><br> MJO ").show();
		$('#keter').fadeOut(10000);
	} else {
		$("#draggable3").toggle();
	}
})