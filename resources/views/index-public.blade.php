@extends('layouts.template')

    @section('styles')
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
        }
        #map {
            width: 100%;
            height: calc(100vh - 56px);
            margin: 0;
        }
    </style>
    @endsection


    @section('content')
    <div id="map"></div>

    @endsection

    
    @section('script')
    <script>
        //Map
        var map = L.map('map').setView([-1.8174684,117.9391411], 5);

        // Basemap
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 19,
            attribution:
                'Map data ©️ <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        var basemap1 = L.tileLayer(
            "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            {
                attribution:
                    '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="DIVSIGUGM" target="_blank">DIVSIG UGM</a>',
            }
        );

        var basemap2 = L.tileLayer(
            "https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}",
            {
                attribution:
                    'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>',
            }
        );

        var basemap3 = L.tileLayer(
            "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}",
            {
                attribution:
                    'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>',
            }
        );

        var basemap4 = L.tileLayer(
            "https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png",
            {
                attribution:
                    '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
            }
        );

        basemap1.addTo(map);

        var baseMaps = {
            "OpenStreetMap": basemap1,
            "Esri World Street": basemap2,
            "Esri Imagery": basemap3,
            "Stadia Dark Mode": basemap4
        };

        L.control.layers(baseMaps).addTo(map);
        
/* GeoJSON Point */
var customIcon = L.icon({
            iconUrl: '{{ asset('storage/disasters.png') }}', // Ganti dengan path ke ikon kustom Anda
            iconSize: [16, 16], // Ukuran ikon
            /* iconAnchor: [16, 32], // Titik anchor (koordinat dalam ikon) untuk menentukan lokasi ikon di peta
            popupAnchor: [0, -32] // Titik anchor untuk menentukan lokasi popup di atas ikon */
        });
var point = L.geoJson(null, {
				onEachFeature: function (feature, layer) {
					var popupContent = "<h5 class='text-center'>" + feature.properties.name + "</h5>" +
                   "<p class='text-center'>" + feature.properties.description + "</p>" +
                   "<div class='text-center'>" + 
                   "<img src='{{asset('storage/images/')}}/" + feature.properties.image + 
                   "' class='img-thumbnail' alt='...' width='200'>"
                        ;
					layer.on({
						click: function (e) {
							point.bindPopup(popupContent);
						},
						mouseover: function (e) {
							point.bindTooltip(feature.properties.name);
						},
					});
				},
				pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: customIcon
                });
            }
			});
			$.getJSON("{{route('api.points')}}", function (data) {
				point.addData(data);
				map.addLayer(point);
			});
/* GeoJSON Polyline */
var polyline = L.geoJson(null, {
	style: function (feature) {
        return {
            color: "#c70404", // warna garis polyline
            weight: 3, // tebal garis
            opacity: 1 // transparansi garis
        };
    },
				onEachFeature: function (feature, layer) {
					var popupContent = "<h5 class='text-center'>" + feature.properties.name + "</h5>" +
                   "<p class='text-center'>" + feature.properties.description + "</p>" +
                   "<div class='text-center'>" + 
                   "<img src='{{asset('storage/images/')}}/" + feature.properties.image + 
                   "' class='img-thumbnail' alt='...' width='200'>"
                        ;
					layer.on({
						click: function (e) {
							polyline.bindPopup(popupContent);
						},
						mouseover: function (e) {
							polyline.bindTooltip(feature.properties.name);
						},
					});
				},
			});
			$.getJSON("{{route('api.polylines')}}", function (data) {
				polyline.addData(data);
				map.addLayer(polyline);
			});
/* GeoJSON Polygon */
var polygon = L.geoJson(null, {
	style: function (feature) {
        return {
            color: "#ff7800", // warna garis polygon
            fillColor: "#f7ef4a", // warna isi polygon
            weight: 2, // tebal garis
            opacity: 1, // transparansi garis
            fillOpacity: 0.5 // transparansi isi
        };
    },
				onEachFeature: function (feature, layer) {
					var popupContent = "<h5 class='text-center'>" + feature.properties.name + "</h5>" +
                   "<p class='text-center'>" + feature.properties.description + "</p>" +
                   "<div class='text-center'>" + 
                   "<img src='{{asset('storage/images/')}}/" + feature.properties.image + 
                   "' class='img-thumbnail' alt='...' width='200'>"
                        ;
					layer.on({
						click: function (e) {
							polygon.bindPopup(popupContent);
						},
						mouseover: function (e) {
							polygon.bindTooltip(feature.properties.name);
						},
					});
				},
			});
			$.getJSON("{{route('api.polygons')}}", function (data) {
				polygon.addData(data);
				map.addLayer(polygon);
			});

            //layer control
            var overlayMaps = {
                "Disasters": point,
                "Faults": polyline,
                "Megathrusts": polygon
            };

            var layerControl = L.control.layers(null, overlayMaps, {collapsed: false}).addTo(map);
    </script>
    @endsection
