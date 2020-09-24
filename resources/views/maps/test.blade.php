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

    // Arrays
    var skoly = {!! $skoly !!};
    var myMarkers = [];
    var myInfoWindows = [];

    // The location of first school
    var first_school = { lat: 49.139728, lng: 17.213939 }
    // The map, centered at first school
    var map = new google.maps.Map(
    document.getElementById('map'), {zoom: 9, center: first_school});

    // Inserting markers
    skoly.forEach(element => {
        var position = {lat: element.lat, lng: element.lng}
        myMarkers.push(new google.maps.Marker({
            id: element.id,
            position: position,
            map: map,
            title: element.nazev,
        }));

        
    });
    // Inserting info windows
    myMarkers.forEach(element => {
        var contentString = '<div>'
        + 'Název školy je: '
        + element.title
        + '</br>'
        + 'Škola se nachází ve městě: '
        + 'TODO :('
        + '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        myInfoWindows.push(infowindow);

        element.addListener('click', function() {
            for (var i = 0; i < myInfoWindows.length; i++ ) { 
                myInfoWindows[i].close();
            }
            infowindow.open(map, element);
        });
        
    });
}

</script>
<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA66vvPxX8nxIZLUu9ZXdb-XHnZaZwWBjc&callback=initMap">
</script>

@endsection