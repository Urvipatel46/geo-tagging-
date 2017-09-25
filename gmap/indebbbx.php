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
   
    <div id="map"></div>

    <script>
    //  var customLabel = {
     //   BO: {
     //     label: 'B.O.'
     //   },
      //  HO: {
      //    label: 'H.O.'
      //  },
		//SO: {
	//		label: 'S.O.'
	//	}
     // };

      var iconBase = 'http://localhost/gmap/';
        var icons = {
          BO: {
            icon: iconBase + 'blue_MarkerA.png'
          },
          HO: {
            icon: iconBase + 'brown_MarkerA.png'
          },
          SO: {
            icon: iconBase + 'darkgreen_MarkerA.png'
          }
        };

        function addMarker(Labelg) {
          var marker = new google.maps.Marker({
            label: Labelg.label,
            icon: icons[Labelg.type].icon,
            map: map
          });
        }

        var labels = [
          {
            Label: 'BO',
            type: 'BO'
          }, {
           Label: 'HO',
            type: 'HO'
          }, {
            Label: 'SO',
            type: 'SO'
          }
          ];

          for (var i = 0, Labelg; Labelg = labels[i]; i++) {
          addMarker(labelg);
        }

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(20.593684, 78.96288),
          zoom: 5
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost/gmap/getdata.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('officename');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              //var pincode = markElem.getAttribute('pincode');              
              //var Deliverystatus = markElem.getAttribute('Deliverystatus');
              //var divisionname = markElem.getAttribute('divisionname');
              //var regionname = markElem.getAttribute('regionname');
              //var circlenam = markElem.getAttribute('circlename');
              //var Taluk = markElem.getAttribute('Taluk');
              //var Districtname = markElem.getAttribute('Districtname');
              //var statename = markElem.getAttribute('statename');
              //var Telephone = markElem.getAttribute('Telephone');
              //var Related_Suboffice = markElem.getAttribute('Related_Suboffice');
              //var Related_Headoffice = markElem.getAttribute('Related_Headofficee'); 
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
              var icon = icons[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: icons[Labelg.type].icon
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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3SHPBp5P7qlg0BW7iQK2Z3vPCaR3zq9Y&callback=initMap">
    </script>
  </body>
</html>