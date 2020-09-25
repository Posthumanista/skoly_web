@extends('layouts.app')

@section('content')
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
        if(props.content)
        {
            var infoWindow = new google.maps.InfoWindow({
            content: props.content
        });
            marker.addListener('click', function(){
            infoWindow.open(map, marker);
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
</script>

@endsection