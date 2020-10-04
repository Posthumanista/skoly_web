@extends('layouts.app')

@section('content')
<style>
    #mapid {
        height: 500px;
    }
</style>

<h2 class="text-3xl font-bold text-center my-6">Mapa všech škol</h2>

<div id="mapid"></div>

<script>          
    var map = L.map('mapid', {
    center: [49.139728, 17.213939],
    zoom: 9
});
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoic2VsZCIsImEiOiJja2Z1emtvMWMwNG9uMzFxajR4cGV0MXM4In0.CPDoZP9iYYwksjmyHPR_Fw',
    }).addTo(map);
    @foreach($skoly as $skola)
        var marker = L.marker([
            {{$skola->lat}},
            {{$skola->lng}},
            ],       
            {
                title: "{{trim($skola->nazev)}}",
            }
        ).addTo(map);
        var popupContent = "{{trim($skola->nazev)}}"
        
        marker.bindPopup(popupContent);
    @endforeach
</script>


{{-- 
<style>
    /* Set the size of the div element that contains the map */
    #map {
    height: 400px;  /* The height is 400 pixels */
    width: 100%;  /* The width is the width of the web page */
    }
</style>
<h2>Mapa všech škol</h2>
<h4>Kliknutím na marker se zobrazí informace o škole, kliknutím mimo se marker zavře</h4>
<div id="map"></div>

<script>
// Initialize and add the map
function initMap() {

    var options = {
        zoom: 9,
        center: {
            lat: 49.139728,
            lng: 17.213939
        }
    }

    // The map
    var map = new google.maps.Map(
    document.getElementById('map'), {zoom: 9, options});

    // Inserting markers
    @foreach($skoly as $skola)
        addMarker({
            coords:{
                lat: {{ $skola->lat }},
                lng: {{ $skola->lng }}
            },
            content: '<div>'
                    + 'Název školy je: '
                    + "{{ trim($skola->nazev) }}"
                    + '</br>'
                    + 'Škola se nachází ve městě: '
                    + "{{ trim($skola->mestoNazev->nazev) }}"
                    + '</div>'
        });
    @endforeach

    // add marker function
    function addMarker(props)
    {
        var marker = new google.maps.Marker({
            position:props.coords,
            map:map
        });
        
        if(props.content){
            var infoWindow = new google.maps.InfoWindow({
                content: props.content
            });
            marker.addListener('click', function(){
                infoWindow.open(map, marker);
            });
            google.maps.event.addListener(map, "click", function(event) {
                infoWindow.close();
            });
        }
    }
}

</script>
<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script defer
src="https://maps.googleapis.com/maps/api/js?key= {{ config('services.google.key') }} &callback=initMap">
</script> --}}
@endsection
