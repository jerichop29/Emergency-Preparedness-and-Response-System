<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Demo: Add custom markers in Mapbox GL JS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans"
      rel="stylesheet"
    />
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <link
      href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css"
      rel="stylesheet"
    />
    <style>
      body {
        margin: 0;
        padding: 0;
      }
      #map {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;
      }
      .marker {
        background-image: url('../asset/img/background/giphy.gif');
        background-size: cover;
        width: 30px;
        height: 50px;
        
        cursor: pointer;
      }
      .mapboxgl-popup {
        max-width: 100px;
      }
      .mapboxgl-popup-content {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>

    <script>
      mapboxgl.accessToken = 'pk.eyJ1IjoiYXJ2aW5pbnQiLCJhIjoiY2twaHkxYTRtMTYxdjJ3cDNkcnpsMjU4biJ9.6Sgq8I1-2QebttGyrGaNAA';

      const geojson = {
        'type': 'FeatureCollection',
        'features': [
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1592677, 14.1934078]
            },
            'properties': {
              'title': 'Calamba Fire Station',
              'description': 'Call Us (049) 545 1695'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.15166, 14.20600]
            },
            'properties': {
              'title': 'Calamba Medical Center',
              'description': 'Call Us (049) 545 1740'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1639, 14.2187]
            },
            'properties': {
              'title': 'Barangay Bañadero',
              'description': 'Call Us +6390-455-6587'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.16797, 14.212022]
            },
            'properties': {
              'title': 'Calamba City Municipal Hall',
              'description': 'Call Us +6390-455-6587'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.160677, 14.194534]
            },
            'properties': {
              'title': 'Calamba City Police Station',
              'description': 'Call Us (049) 545 1698'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.159712, 14.194034]
            },
            'properties': {
              'title': 'Calamba City Risk Reduction Office',
              'description': 'Contact Us 8927-1335'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1954, 14.1704]
            },
            'properties': {
              'title': 'Bagong Kalsada, Calamba City',
              'description': 'Contact Us (049) 508-1810'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1567, 14.2262]
            },
            'properties': {
              'title': 'Banlic, Calamba City',
              'description': 'Contact Us  (049) 833-3137 / 502-5616'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1306, 14.1883]
            },
            'properties': {
              'title': 'Barandal, Calamba City',
              'description': 'Contact Us  phone-4 (049) 545-1102'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1572, 14.2039]
            },
            'properties': {
              'title': 'Barangay 1, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1611, 14.2130]
            },
            'properties': {
              'title': 'Barangay 2, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1611, 14.2085]
            },
            'properties': {
              'title': 'Barangay 3, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1648, 14.2146]
            },
            'properties': {
              'title': 'Barangay 4, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1662, 14.2099]
            },
            'properties': {
              'title': 'Barangay 5, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1639, 14.2126]
            },
            'properties': {
              'title': 'Barangay 6, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1694, 14.2123]
            },
            'properties': {
              'title': 'Barangay 7, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1332, 14.2015]
            },
            'properties': {
              'title': 'Batino, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1045, 14.1724]
            },
            'properties': {
              'title': 'Bubuyan, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1695, 14.1888]
            },
            'properties': {
              'title': 'Bucal, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.0938, 14.1654]
            },
            'properties': {
              'title': 'Burol, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1510, 14.1592]
            },
            'properties': {
              'title': 'Camaligan, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1079, 14.2160]
            },
            'properties': {
              'title': 'Canlubang, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1621, 14.1966]
            },
            'properties': {
              'title': 'Halang, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.0679, 14.1704]
            },
            'properties': {
              'title': 'Hornalan, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1188, 14.1640]
            },
            'properties': {
              'title': 'Kay Anlog, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1540, 14.1848]
            },
            'properties': {
              'title': 'La Mesa, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1635, 14.2028]
            },
            'properties': {
              'title': 'Lecheria, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1813, 14.2148]
            },
            'properties': {
              'title': 'Lingga, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1789, 14.2233]
            },
            'properties': {
              'title': 'Looc, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1710, 14.2128]
            },
            'properties': {
              'title': 'San Jose, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1756, 14.2164]
            },
            'properties': {
              'title': 'San Juan, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.1347, 14.1845]
            },
            'properties': {
              'title': 'Barangay 1, Calamba City',
              'description': 'Contact Us +63 49 545 6789'
            }
          }
        ]
      };

      const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/satellite-streets-v12',
        center: [121.164809,14.210551],
        zoom: 13.0
      });

      // add markers to map
      for (const feature of geojson.features) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';

        // make a marker for each feature and add it to the map
        new mapboxgl.Marker(el)
          .setLngLat(feature.geometry.coordinates)
          .setPopup(
            new mapboxgl.Popup({ offset: 25 }) // add popups
              .setHTML(
                `<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
              )
          )
          .addTo(map);
      }
    </script>
  </body>
</html>
