var map;
var geocoder;

function loadMap() {
	
                var lat = 33.72188;
                var lng = 73.79329;
           
	var purple = {lat: 33.72188, lng: 73.79329};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 9,
      center: purple
    });

    var marker = new google.maps.Marker({
      position: purple,
      map: map,
         icon: {
        path: google.maps.SymbolPath.CIRCLE,
        scale: 9.5,
        fillColor: "#F00",
        fillOpacity: 1.4,
        strokeWeight: 1.4
    },
    });

    var cdata = JSON.parse(document.getElementById('data').innerHTML);
    geocoder = new google.maps.Geocoder();  
    codeAddress(cdata);

    var allData = JSON.parse(document.getElementById('allData').innerHTML);
    showAllColleges(allData)
}

function showAllColleges(allData) {
	var infoWind = new google.maps.InfoWindow;
	Array.prototype.forEach.call(allData, function(data){
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		
		strong.textContent = data.name;
		content.appendChild(strong);

		// var img = document.createElement('img');
		// img.src = 'img/Leopard.jpg';
		// img.style.width = '100px';
		// content.appendChild(img);

		var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data.lat, data.lng),
	      map: map
	    });

	    marker.addListener('mouseover', function(){
	    	infoWind.setContent(content);
	    	infoWind.open(map, marker);
	    })
	})
}

function codeAddress(cdata) {
   Array.prototype.forEach.call(cdata, function(data){
    	var address = data.name + ' ' + data.address;
	    geocoder.geocode( { 'address': address}, function(results, status) {
	      if (status == 'OK') {
	        map.setCenter(results[0].geometry.location);
	        var points = {};
	        points.id = data.id;
	        points.lat = map.getCenter().lat();
	        points.lng = map.getCenter().lng();
	        updateCollegeWithLatLng(points);
	      }
	      if (status == "OVER_QUERY_LIMIT"){
    time.sleep(1);
    
    continue;
  success = True;}
   else {
	        alert('Geocode was not successful for the following reason: ' + status);
	      }
	    });
	});
}

function updateCollegeWithLatLng(points) {
	$.ajax({
		url:"action.php",
		method:"post",
		data: points,
		success: function(res) {
			console.log(res)
		}
	})
	
}