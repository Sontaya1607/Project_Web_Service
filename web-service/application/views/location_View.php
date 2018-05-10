<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map, #pano {
        float: left;
        height: 100%;
        width: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <div id="pano"></div>
    <script>
      var map;

      function initMap() {
        var position={lat:13.281919, lng:100.925740};
        var myLatlng = {lat: 13.28203795704248, lng: 100.926168297547};

        map = new google.maps.Map(document.getElementById('map'), {
          center: position,
          zoom: 20,
        });

        var marker = new google.maps.Marker({
          position:position,
          map:map,
          title: 'AUA Bang Saen',
        });

        var info = new google.maps.InfoWindow({
          content : '<div style="font-size: 20px;color: red"><b>AUA Bang Saen</b></div>'
        });

        var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('pano'), {
              position: myLatlng,
              pov: {
                heading: -100,
                pitch: 10
              }
            });
        map.setStreetView(panorama);

        google.maps.event.addListener(marker, 'click',function() {
          info.open(map,marker);
        });

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRYfAkGfEkaSuKr9utlyVcZ9xBFUeqVwY&callback=initMap"
    async defer></script>
  </body>
</html>