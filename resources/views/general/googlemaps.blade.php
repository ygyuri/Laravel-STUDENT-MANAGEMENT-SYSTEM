@extends('layouts.admin')

@section('content')
    <!-- Styled container for Google Maps -->
    <div class="map-container">
        <!-- Container for the map -->
        <div id="map" style="width: 100%; height: 400px;"></div>

        <!-- Form for Google Maps -->
        <form class="map-form" id="map-form">
            @csrf <!-- Laravel CSRF token -->
            <!-- Input field for searching address -->
            <div class="form-group">
                <label for="search">Search Address, City, or Country:</label>
                <input type="text" id="search" name="search" class="map-input" placeholder="Enter address, city, or country">
            </div>
            <hr> <!-- Horizontal line -->

            <!-- Latitude input field -->
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" id="search-latitude" name="latitude" placeholder="Latitude" readonly>
            </div>

            <!-- Longitude input field -->
            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" id="search-longitude" name="longitude" placeholder="Longitude" readonly>
            </div>
            <!-- Submit button for finding location -->
            <input type="submit" value="Find Location">
        </form>
    </div>

    <!-- Google Maps API script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCQsKJwCT3EtFiJE0CAwwOrqROQrcA0lU&callback=initMap" async defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: {lat: -34.397, lng: 150.644}
            });

            $('#map-form').submit(function(e) {
                e.preventDefault(); // Prevent default form submission
                var address = $('#search').val(); // Get the address from the input field

                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'address': address }, function(results, status) {
                    if (status === 'OK') {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();

                        // Update latitude and longitude fields
                        $('#search-latitude').val(latitude);
                        $('#search-longitude').val(longitude);

                        // Center the map to the new coordinates
                        map.setCenter({ lat: latitude, lng: longitude });

                        // Add a new marker
                        var newMarker = new google.maps.Marker({
                            position: { lat: latitude, lng: longitude },
                            map: map,
                            title: 'New Location'
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            });
        }
    </script>
@endsection
