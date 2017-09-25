<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
	<script>
	function detectBrowser() {
  var useragent = navigator.userAgent;
  var mapdiv = document.getElementById("map");

  if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1 ) {
    mapdiv.style.width = '100%';
    mapdiv.style.height = '100%';
  } else {
    mapdiv.style.width = '600px';
    mapdiv.style.height = '800px';
  }
}
</script>
  </head>

  <body>
   <a href="../../../../">Back to Main App</a>
    <div id="map"></div>

    <script>
      var customLabel = {
        BO: {
          label: 'B.O.'
        },
        HO: {
          label: 'H.O.'
        },
		SO: {
			label: 'S.O.'
		}
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(20.593684, 78.96288),
          zoom: 5
        });
        var infoWindow = new google.maps.InfoWindow;
		
		if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (p) {
        var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
        var mapOptions = {
            center: LatLng,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        var marker = new google.maps.Marker({
            position: LatLng,
            map: map,
            title: "<div style = 'height:60px;width:200px'><b>Your location:</b><br />Latitude: " + p.coords.latitude + "<br />Longitude: " + p.coords.longitude
        });
        google.maps.event.addListener(marker, "click", function (e) {
            var infoWindow = new google.maps.InfoWindow();
            infoWindow.setContent(marker.title);
            infoWindow.open(map, marker);
        });
    });
} else {
    alert('Geo Location feature is not supported in this browser.');
}

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost/gmap/getdata.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('officename');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var pincode = markerElem.getAttribute('pincode');              
              var Deliverystatus = markerElem.getAttribute('Deliverystatus');
              var divisionname = markerElem.getAttribute('divisionname');
              var regionname = markerElem.getAttribute('regionname');
              var circlename = markerElem.getAttribute('circlename');
              var Taluk = markerElem.getAttribute('Taluk');
              var Districtname = markerElem.getAttribute('Districtname');
              var statename = markerElem.getAttribute('statename');
              var Telephone = markerElem.getAttribute('Telephone');
              var Related_Suboffice = markerElem.getAttribute('Related_Suboffice');
              var Related_Headoffice = markerElem.getAttribute('Related_Headoffice'); 
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = type
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = pincode
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = Deliverystatus
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = divisionname
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = regionname
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = circlename
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = Taluk
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = Districtname
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = statename
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = Telephone
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = Related_Suboffice
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = Related_Headoffice
              infowincontent.appendChild(text);
              

              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCj5QinMwgrE1qvhVW7a90eXdmy7OMt0E&callback=initMap">
    </script>
  </body>
</html>