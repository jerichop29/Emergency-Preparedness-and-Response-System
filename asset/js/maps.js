mapboxgl.accessToken = 'pk.eyJ1IjoiYXJ2aW5pbnQiLCJhIjoiY2twaHkxYTRtMTYxdjJ3cDNkcnpsMjU4biJ9.6Sgq8I1-2QebttGyrGaNAA';

      const geojson = {
        'type': 'FeatureCollection',
        'features': [
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [121.163874, 14.228503]
            },
            'properties': {
              'title': 'Mapbox',
              'description': 'Bañadero, Calamba City'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-122.414, 37.776]
            },
            'properties': {
              'title': 'Mapbox',
              'description': 'San Francisco, California'
            }
          }
        ]
      };

      const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/examples/clg45vm7400c501pfubolb0xz',
        center: [121.163874, 14.228503],
        zoom: 10.7
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