@extends('layouts.template')

    @section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
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

    <!-- Modal CREATE POINT-->
    <div class="modal fade" id="PointModal" tabindex="-1" aria-labelledby=PointModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="PointModalLabel">Create</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{route('store-point')}}" method="POST" enctype="multipart/form-data">
            <!-- security laravel -->
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Give point a name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="geom" class="form-label">Geometry</label>
                <textarea class="form-control" id="geom_point" name="geom" rows="3" readonly></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image_point" name="image" onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <div class="mb-3">
                <img src="" alt="Preview" id="preview-image-point"
                class="img-thumbnail" width="400">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
            </div>
        </div>
    </div>
    <!-- Modal CREATE POLYLINE-->
    <div class="modal fade" id="PolylineModal" tabindex="-1" aria-labelledby=PolylineModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="PolylineModalLabel">Create</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{route('store-polyline')}}" method="POST" enctype="multipart/form-data">
            <!-- security laravel -->
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Give point a name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="geom" class="form-label">Geometry</label>
                <textarea class="form-control" id="geom_polyline" name="geom" rows="3" readonly></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image_polyline" name="image" onchange="document.getElementById('preview-image-polyline').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <div class="mb-3">
                <img src="" alt="Preview" id="preview-image-polyline"
                class="img-thumbnail" width="400">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
            </div>
        </div>
    </div>
    <!-- Modal CREATE POLYGON-->
    <div class="modal fade" id="PolygonModal" tabindex="-1" aria-labelledby=PolygonModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="PolygonModalLabel">Create</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{route('store-polygon')}}" method="POST" enctype="multipart/form-data">
            <!-- security laravel -->
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Give point a name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="geom" class="form-label">Geometry</label>
                <textarea class="form-control" id="geom_polygon" name="geom" rows="3" readonly></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image_polygon" name="image" onchange="document.getElementById('preview-image-polygon').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <div class="mb-3">
                <img src="" alt="Preview" id="preview-image-polygon"
                class="img-thumbnail" width="400">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
            </div>
        </div>
    </div>

    @endsection

    
    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
    <script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>
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

        /* Digitize Function */
var drawnItems = new L.FeatureGroup();
map.addLayer(drawnItems);

var drawControl = new L.Control.Draw({
	draw: {
		position: 'topleft',
		polyline: false,
		polygon: false,
		rectangle: false,
		circle: false,
		marker: true,
		circlemarker: false
	},
	edit: false
});

map.addControl(drawControl);

map.on('draw:created', function(e) { //apabila telah membuat gambar, maka function akan aktif sehingga event akan berjalan
	var type = e.layerType, //membuat variable type dari event layertype 
		layer = e.layer; // membuat variable layer dari event layer

	console.log(type);

	var drawnJSONObject = layer.toGeoJSON(); //membuat json object
	var objectGeometry = Terraformer.WKT.convert(drawnJSONObject.geometry); //mengkonversi json object menjadi WKT

	console.log(drawnJSONObject);
	console.log(objectGeometry);

	if (type === 'polyline') {
        //set value geometry untuk masukan geom
        $("#geom_polyline").val(objectGeometry);

        //menampilkan modal
        $('#PolylineModal').modal('show'); // digunakan untuk mengakses polylines modal menggunakan # sebagai pemanggil id
	} else if (type === 'polygon' || type === 'rectangle') {
		//console.log("Create " + type);
        //set value geometry untuk masukan geom
        $("#geom_polygon").val(objectGeometry);

        //menampilkan modal
        $('#PolygonModal').modal('show'); // digunakan untuk mengakses polygon modal menggunakan # sebagai pemanggil id
	} else if (type === 'marker') {
		//console.log("Create " + type);

        //set value geometry untuk masukan geom
        $("#geom_point").val(objectGeometry);

        //menampilkan modal
        $('#PointModal').modal('show'); // digunakan untuk mengakses point modal menggunakan # sebagai pemanggil id
	} else {
		console.log('__undefined__');
	}

	drawnItems.addLayer(layer);
});
/* GeoJSON Point */
// Definisikan ikon kustom
var customIcon = L.icon({
            iconUrl: '{{ asset('storage/disasters.png') }}', // Ganti dengan path ke ikon kustom Anda
            iconSize: [16, 16], // Ukuran ikon
            /* iconAnchor: [16, 32], // Titik anchor (koordinat dalam ikon) untuk menentukan lokasi ikon di peta
            popupAnchor: [0, -32] // Titik anchor untuk menentukan lokasi popup di atas ikon */
        });

        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "<h5 class='text-center'>" + feature.properties.name + "</h5>" +
                   "<p class='text-center'>" + feature.properties.description + "</p>" +
                   "<div class='text-center'>" + 
                   "<img src='{{asset('storage/images/')}}/" + feature.properties.image + 
                   "' class='img-thumbnail' alt='...' width='200'>" + 
                   "</div>" +
                   "<div class='d-flex flex-row justify-content-center mt-3'>" +
                   "<a href='{{url('edit-point')}}/" + feature.properties.id + 
                   "' class='btn btn-sm btn-warning me-2'><i class='fa-solid fa-edit'></i></a>" +
                   "<form action='{{url('delete-point')}}/" + feature.properties.id + 
                   "' method='POST'>" + 
                   '{{csrf_field()}}' + '{{method_field('DELETE')}}' + 
                   "<button type='submit' class='btn btn-danger' onclick='return confirm(`Yakin Anda ingin menghapus data ini?`)'><i class='fa-solid fa-trash-can'></i></button>" +
                   "</form>" +
                   "</div>";


                layer.on({
                    click: function(e) {
                        point.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
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
        $.getJSON("{{ route('api.points') }}", function(data) {
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
                   "' class='img-thumbnail' alt='...' width='200'>" + 
                   "</div>" ;

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
                   "' class='img-thumbnail' alt='...' width='200'>" + 
                   "</div>" ;

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
