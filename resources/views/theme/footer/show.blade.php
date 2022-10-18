@extends('template.app')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css"
        integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Theme Footer
                    @include('template.utils.btn.back', ['url' => url('footer')])
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mt-3, ml-3">{{ $footer->nama }}</h4>
                            <table class="table mt-2">
                                <thead>
                                    <tr>
                                        <td>Alamat1 : {{ $footer->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon : {{ $footer->telepon }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email : {{ $footer->email }}</td>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                        <div class="col-md-6">
                            <label for="">Koordinat Maps</label>
                            {{-- <img src="{{ url('assets/profile.jpg') }}" class="img-fluid" alt="" srcset=""> --}}
                            <div id="map" style="height: 50vh; width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js"
        integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
    <script>
        var cities = L.layerGroup();

        var mLittleton = L.marker([{{ $footer->posisi }}]).bindPopup('This is Littleton, C.').addTo(cities);
        // var mDenver = L.marker([-1.8435038, 109.9782028]).bindPopup('This is Denver, CO.').addTo(cities);

        var mbAttr =
            'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
        var mbUrl =
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

        var streets = L.tileLayer(mbUrl, {
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });

        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var map = L.map('map', {
            center: [{{ $footer->posisi }}],
            zoom: 5,
            layers: [osm, cities]
        });

        var baseLayers = {
            'OpenStreetMap': osm,
            'Streets': streets
        };

        var overlays = {
            'Cities': cities
        };

        var layerControl = L.control.layers(baseLayers, overlays).addTo(map);
        // var crownHill = L.marker([39.75, -105.09]).bindPopup('This is Crown Hill Park.');
        // var rubyHill = L.marker([39.68, -105.00]).bindPopup('This is Ruby Hill Park.');

        var parks = L.layerGroup([crownHill, rubyHill]);

        var satellite = L.tileLayer(mbUrl, {
            id: 'mapbox/satellite-v9',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });
        layerControl.addBaseLayer(satellite, 'Satellite');
        layerControl.addOverlay(parks, 'Parks');
    </script>
@endsection
