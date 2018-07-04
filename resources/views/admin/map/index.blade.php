<div id="mapid" class="map_index" style="margin-top:20px;"></div>
<script>
	$(document).ready(function(){
		var mymap = L.map('mapid').setView([49.182, 31.399], 7);
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
			maxZoom: 18,
			id: 'valerasvatko21.2pioc32h',
			accessToken: 'pk.eyJ1IjoidmFsZXJhc3ZhdGtvMjEiLCJhIjoiY2l5a2ZtZDExMDAwejJxanI3Y3c3OWh2MCJ9.jcOi8iwO57NuByuxrByslA'
		}).addTo(mymap);
		
		$('.test').each(function(item, index){			
			var coords = [$(index).data('coords-lat'), $(index).data('coords-lng')];
			var marker = L.marker(coords).addTo(mymap);
			marker.bindPopup("Координати: широта("+coords[0]+"), довгота("+coords[1]+").");		
		})
		
		function onMapClick(e) {
			var popup = L.popup();
			popup.setLatLng(e.latlng)
			var variable=confirm("Додати маркер по цих координатах? "+e.latlng);
				
			if(variable){			
				var marker = L.marker(e.latlng).addTo(mymap);
				$('#latitude').attr("value", e.latlng.lat);
				$('#longitude').attr("value", e.latlng.lng);
				
				marker.bindPopup("Координати: широта("+e.latlng.lat+"), довгота("+e.latlng.lng+").");		
			}
		}
		mymap.on('contextmenu', onMapClick);
	})		
</script>