<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      /**
       * get_image_location
       * Returns an array of latitude and longitude from the Image file
       * @param $image file path
       * @return multitype:array|boolean
       */
       function gps2Num($coordPart){
           $parts = explode('/', $coordPart);
           if(count($parts) <= 0)
           return 0;
           if(count($parts) == 1)
           return $parts[0];
           return floatval($parts[0]) / floatval($parts[1]);
       }
      function get_image_location($image = ''){
          $exif = exif_read_data($image, 0, true);
          if($exif && isset($exif['GPS'])){
              $GPSLatitudeRef = $exif['GPS']['GPSLatitudeRef'];
              $GPSLatitude    = $exif['GPS']['GPSLatitude'];
              $GPSLongitudeRef= $exif['GPS']['GPSLongitudeRef'];
              $GPSLongitude   = $exif['GPS']['GPSLongitude'];

              $lat_degrees = count($GPSLatitude) > 0 ? gps2Num($GPSLatitude[0]) : 0;
              $lat_minutes = count($GPSLatitude) > 1 ? gps2Num($GPSLatitude[1]) : 0;
              $lat_seconds = count($GPSLatitude) > 2 ? gps2Num($GPSLatitude[2]) : 0;

              $lon_degrees = count($GPSLongitude) > 0 ? gps2Num($GPSLongitude[0]) : 0;
              $lon_minutes = count($GPSLongitude) > 1 ? gps2Num($GPSLongitude[1]) : 0;
              $lon_seconds = count($GPSLongitude) > 2 ? gps2Num($GPSLongitude[2]) : 0;

              $lat_direction = ($GPSLatitudeRef == 'W' or $GPSLatitudeRef == 'S') ? -1 : 1;
              $lon_direction = ($GPSLongitudeRef == 'W' or $GPSLongitudeRef == 'S') ? -1 : 1;

              $latitude = $lat_direction * ($lat_degrees + ($lat_minutes / 60) + ($lat_seconds / (60*60)));
              $longitude = $lon_direction * ($lon_degrees + ($lon_minutes / 60) + ($lon_seconds / (60*60)));


              return array('latitude'=>$latitude, 'longitude'=>$longitude);
          }else{
              return false;
          }
      }

      $image = "pic1.jpg";
      $arr = get_image_location($image);
     ?>
     <script type="text/javascript">
       let lat = <?php echo $arr['latitude'] ?>;
       let long = <?php echo $arr['longitude'] ?>;
       let map, infoWindow;

       function initMap() {
         const pos ={ lat: lat, lng: long };
         map = new google.maps.Map(document.getElementById("map"), {
           center: pos,
           zoom: 15,
           mapId:'9997268fc367fe92',
           disableDefaultUI: true
         });
         const marker = new google.maps.Marker({
           position: pos,
           map: map,
         });

         infoWindow = new google.maps.InfoWindow();

         const locationButton = document.createElement("button");

         locationButton.textContent = "Mi ubicacion";
         locationButton.classList.add("custom-map-control-button");
         map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
         locationButton.addEventListener("click", () => {
           // Try HTML5 geolocation.
           if (navigator.geolocation) {
             navigator.geolocation.getCurrentPosition(
               (position) => {
                 const pos = {
                   lat: position.coords.latitude,
                   lng: position.coords.longitude,
                 };

                 infoWindow.setPosition(pos);
                 infoWindow.setContent("Estas aqui.");
                 infoWindow.open(map);
                 map.setCenter(pos);
               },
               () => {
                 handleLocationError(true, infoWindow, map.getCenter());
               }
             );
           } else {
             // Browser doesn't support Geolocation
             handleLocationError(false, infoWindow, map.getCenter());
           }
         });
       }

       function handleLocationError(browserHasGeolocation, infoWindow, pos) {
         infoWindow.setPosition(pos);
         infoWindow.setContent(
           browserHasGeolocation
             ? "Error: The Geolocation service failed."
             : "Error: Your browser doesn't support geolocation."
         );
         infoWindow.open(map);
       }
     </script>
     <div id="map" style="height:400px"></div>

     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCKwW88O7jV36kp0sUbK4g8Q0Luiqc9co&callback=initMap&v=weekly" async></script>
  </body>
</html>
