<?php
// gather js array elements
$markers = array();

// loop through your location data
foreach($locations as $i) {
  
  // set your variables to feed into the array template
  $title = $i['name'];
  $lat = $i['latitude']; // latitude
  $lng = $i['longitude']; // longtitude
  
  // add to the $markers array
  $markers[] = "
  {
    'title': '$title',
    
    'coordinates': {
        'lat': '$lat',
        'lng': '$lng'
    },
    'content': '<div>Some HTML for the info window of this marker.</div>',
    'id': 'mobi'
  }
  ";
}
 //dd($markers);
?>

<!doctype html>
<html>
<head>
  <title>Multi-point map on Google Maps Javascript API</title>
</head>
<body>
  
  <!-- map will be generated here -->
  <div id = "map"></div>
  
  <!-- build map -->
  <script>
    // load $markers as a javascript array
    var markers = [<?php echo implode(" ",$markers) ; ?>]; // [] indicates an array
    
    // 'Windows' array collects opened info windows so that we know when windows need to be closed.
    var Windows = [];
    
    // Set info window for each marker. 
    /* This is necessary to run as a function, otherwise all 
       elements of the 'markers' loop will have the same value 
       as the last element in the list. */
    function bindInfoWindow(marker, map, infowindow) {
        
        // Close other windows before a new one is opened so that the new one stays open when clicked.
        closeOtherWindows();
      
        marker.addListener('click', function() {
            infowindow.content; // 'content' is an element of infowindow
            infowindow.open(map, this);
        });
      
        // Add the window of the clicked marker to the list so it can be closed next.
        Windows[0] = infowindow;
    }
    
    // Function to close opened windows.
    function closeOtherWindows() {
        if (Windows.length > 0) {
            // call the .close() method
            Windows[0].close();
            // reset the array count to 0
            Windows.length = 0;
        }
    }
    
    // start the map
    var map;
    function initMap() {
        // point this instance of Google Maps at the #map div
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: new google.maps.LatLng(2.8,-187.3), // starting position (lat, lng)
            mapTypeId: 'terrain'
        });

        // make sure at least 1 marker exists
        if(markers.length > 0) { 
        
            // loop through the markers array and create a marker for each set of coordinates
            for (var i = 0; i < markers.length; i++) {

                // marker setup
                var data = markers[i];
                // .coordinates corresponds to the 'coordinates' element of the array
                var coord = data.coordinates;
                // generate latitude and longtitude position of the marker
                var latLng = new google.maps.LatLng(coord.lat,coord.lng);
                // define the marker
                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    title: data.title
                });

                // info window content
                var infowindow = new google.maps.InfoWindow({
                    content: data.content
                });
              
                // bind the info window to the marker
                bindInfoWindow(marker, map, infowindow);

            } // markers loop
        } // markers.length check
    } // initMap
  </script>
  
  <!-- Javascript API -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAel4iFWtIXAOlR_8lxIS3SAIVGvec-udo&callback=initMap"></script>

</body>
</html>
