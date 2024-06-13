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
        <h1 class="modal-title fs-5" id="PointModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{route('update-point', $id)}}" method="POST" enctype="multipart/form-data">
            <!-- security laravel -->
            @csrf
            @method('PATCH')
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
                <textarea class="form-control" id="geom_point" name="geom" rows="1" readonly></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image_point" name="image" onchange="document.
                getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                <input type="hidden" class="from=control" id="image_old" name="image_old">
            </div>
            <div class="mb-3">
                <img src="" alt="Preview" id="preview-image-point"
                class="img-thumbnail" width="100">
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
    <script src="https://unpkg.com/@terraformer/wkt"></script>

    <script>
        //Map
        var map = L.map('map').setView([-6.1751, 106.8272], 13);

        // Basemap
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

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
		marker: false,
		circlemarker: false
	},
	edit: {
        featureGroup: drawnItems,
        edit: true,
        remove: false
    }
});

map.addControl(drawControl);

map.on('draw:edited', function(e) { //apabila telah membuat gambar, maka function akan aktif sehingga event akan berjalan
    var layer = e.layers;
    
    //console.log(geojson);

    
    layer.eachLayer(function(layer) {
        var geojson = layer.toGeoJSON();

        var wkt=Terraformer.geojsonToWKT(geojson.geometry);

        $('#name').val(layer.feature.properties.name);
        $('#description').val(layer.feature.properties.description);
        $('#geom_point').val(wkt);
        $('#image_old').val(layer.feature.properties.image);
        $('#preview-image-point').attr('src', "{{asset('storage/images/')}}/" + layer.feature.properties.image);
        $('#PointModal').modal('show');
    });
});

// Definisikan ikon kustom
var customIcon = L.icon({
            iconUrl: '{{ asset('storage/disasters.png') }}', // Ganti dengan path ke ikon kustom Anda
            iconSize: [16, 16], // Ukuran ikon
            iconAnchor: [16, 32], // Titik anchor (koordinat dalam ikon) untuk menentukan lokasi ikon di peta
            popupAnchor: [0, -32] // Titik anchor untuk menentukan lokasi popup di atas ikon
        });

/* GeoJSON Point */
var point = L.geoJson(null, {
				onEachFeature: function (feature, layer) {

                    drawnItems.addLayer(layer);

					var popupContent = "<h3>" + feature.properties.name + "</h3>" +
						"Deskripsi: " + feature.properties.description + "<br>" + "Foto: <br><img src='{{asset('storage/images/')}}/" + 
                        feature.properties.image + 
                        "'class='img-thumbnail' alt='' width='200'>"
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
			$.getJSON("{{route('api.point', $id)}}", function (data) {
				point.addData(data);
				map.addLayer(point);
                map.fitBounds(point.getBounds());
			});

            //layer control
            var overlayMaps = {
                "Point": point
            };

            var layerControl = L.control.layers(null, overlayMaps, {collapsed: false}).addTo(map);
    </script>
    @endsection
