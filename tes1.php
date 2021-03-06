<!DOCTYPE html>
<html>
<head>
	 <head>
  <title>WebGIS Penyebaran Covid-19</title>
        <!-- Favicons -->
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
            rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <!-- Main Stylesheet File -->
        <link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
  	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="icon" href="assets/icons/favicon.ico" type="image/x-icon">
    <style type="text/css">
    	body{
    		font-family: roboto
    	}
		::-webkit-scrollbar {
		  width: 5px;
		}

		::-webkit-scrollbar-track {
		  background: #eee;
		}

		::-webkit-scrollbar-thumb {
		  background: #ccc;
		}

		::-webkit-scrollbar-thumb:hover {
		  background: #bbb;
		}
		#map{
			width: 100%;
			height: 100vh
		}
		.leaflet-container{
			background: transparent;
		}
		.list-covid{
			height: 100vh;
			overflow-x: hidden;
		}
		.list-group-item:hover{
			cursor: pointer;
		}

	.info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
	.legend { text-align: left; line-height: 18px; color: #555; } .legend i { width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; }
	header{
		position: fixed;
		top: 0;
		right: 0;
		display: flex;
		color: #333;
		padding: 10px;
		align-content: center;
	}
	header img{
		width: 30px;
		margin-right: 5px
	}
	</style>
		
</head>
<body>
	<div class="row" style="width: 100%">
		<div class="col-md-3">
			<ul class="list-group list-covid">
			  
			</ul>
		</div>
		<div class="col-md-9">
			<div id="map"></div>
		</div>
	</div>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script type="text/javascript">
  var map= L.map("map").setView([-3.824181, 117.8191513],5);
  var api='https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&f=json';
  var dataCovid=[];
  var geojson=[];
  map.attributionControl.addAttribution('Created by &copy; <a href="https://www.facebook.com/aditya.suheryana.7">Aditya Suheryana</a>');
  getData();
  $(document).on("click",".list-covid .list-group-item",function(){
  	var id=$(this).data("id");
  	var set=geojson[id];
  	set.eachLayer(function(feature){
  		feature.openPopup();
  		map.fitBounds(feature.getBounds());
  	});
  });
function getColor(positif){
	color="#0d0";
	if(positif>3000){
		color="#222";
	}
	else if(positif>2000){
		color="#555";
	}
	else if(positif>1000){
		color="#f00";
	}
	else if(positif>500){
		color="#f90";
	}
	else if(positif>250){
		color="#09d";
	}
	else if(positif>100){
		color="#090";
	}
	return color;
}
// atur style
function style(f) {
	var KODE=f.properties.KODE;
	data = dataCovid[KODE];
	// console.log(data);
	return {
		weight: 1,
		opacity: 1,
		color: 'white',
		dashArray: '3',
		fillOpacity: 0.7,
		fillColor: getColor(data.Kasus_Posi)
	};
}
// update jika hover
function highlightFeature(e) {
	var layer = e.target;

	layer.setStyle({
		weight: 1,
		color: '#f00',
		dashArray: '',
		fillOpacity: 0.7
	});

	if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
		layer.bringToFront();
	}

}
// update info
	function resetHighlight(e) {
		var layer = e.target;
		layer.setStyle({
			weight: 1,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
		})
	}

  function onEachFeature(f, layer) {
		layer.on({
			mouseover: highlightFeature,
			mouseout: resetHighlight
		});
		var KODE=f.properties.KODE;
		// console.log(f.properties);
		data = dataCovid[KODE];
		var popUp='<table>'+
					'<tr>'+
						'<td colspan="4"><h6>'+data.Provinsi+'</h6></td>'+
					'</tr>'+
					'<tr>'+
						'<td class="bg-primary" width="20">&nbsp;</td>'+
						'<td>Positif</td>'+
						'<td>'+data.Kasus_Posi+'</td>'+
					'</tr>'+
					'<tr>'+
						'<td class="bg-success"></td>'+
						'<td>Sembuh</td>'+
						'<td>'+data.Kasus_Semb+'</td>'+
					'</tr>'+
					'<tr>'+
						'<td class="bg-danger"></td>'+
						'<td>Meninggal</td>'+
						'<td>'+data.Kasus_Meni+'</td>'+
					'</tr>'+
					'</table>';
		layer.bindPopup(popUp);

 }

var legend = L.control({position: 'bottomright'});

	legend.onAdd = function (map) {
		var div = L.DomUtil.create('div', 'info legend'),
			grades = [0, 20, 250, 500, 200, 500],
			labels = [],
			from, to;

		for (var i = 0; i < grades.length; i++) {
			from = grades[i];
			to = grades[i + 1];

			labels.push(
				'<i style="background:' + getColor(from + 1) + '"></i> ' +
				from + (to ? '&ndash;' + to : '+'));
		}

		div.innerHTML = labels.join('<br>');
		return div;
	};

	legend.addTo(map);
  
  function getData(){
  	$.ajax({
  		url:api,
  		dataType:'JSON',
  		success:function(data){
  			var features=data.features;
  			for (i=0;i<features.length;i++) {
  				var attributes=features[i].attributes;
  				var Kode_Provi=attributes.Kode_Provi;
  				dataCovid[Kode_Provi]=attributes;
  				// console.log(attributes);
				var list='<h5>'+attributes.Provinsi+'</h5>'+
							'<span class="text-primary">Positif : '+attributes.Kasus_Posi+'</span>- '+
							'<span class="text-success">Sembuh : '+attributes.Kasus_Semb+'</span> -'+
							'<span class="text-danger">Meninggal : '+attributes.Kasus_Meni+'</span>';
				$(".list-covid").append('<li class="list-group-item" data-id="'+Kode_Provi+'">'+list+'</li>');
  			}
  			for (i=0;i<features.length;i++) {
  				var attributes=features[i].attributes;
  				var Kode_Provi=attributes.Kode_Provi;
  				if(Kode_Provi!=0){
	  				$.getJSON("assets/geojson/"+Kode_Provi+".geojson",function(data){
	  					var KODE=data.features[0].properties.KODE;
	  					geojson[KODE]=L.geoJSON(data,{
	  						onEachFeature:onEachFeature,
							style: style, 
	  					}).addTo(map);

	  				});
	  			}
  			}
  		}
  	});
  }

</script>
</html>